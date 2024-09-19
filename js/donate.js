document.addEventListener('DOMContentLoaded', () => {
  const donationForm = document.getElementById('donationForm');
  const donorInfo = document.getElementById('donorInfo');
  const paymentInfo = document.getElementById('paymentInfo');
  const confirmation = document.getElementById('confirmation');

  const nextBtn = document.getElementById('nextBtn');
  const backToDonation = document.getElementById('backToDonation');
  const toPayment = document.getElementById('toPayment');
  const backToDonorInfo = document.getElementById('backToDonorInfo');
  const submitDonation = document.getElementById('submitDonation');

  const amountBtns = document.querySelectorAll('.amount-btn');
  const customAmount = document.getElementById('customAmount');

  let donationData = {};

  amountBtns.forEach(btn => {
      btn.addEventListener('click', () => {
          customAmount.value = btn.dataset.amount;
      });
  });

  nextBtn.addEventListener('click', () => {
      donationData.amount = customAmount.value;
      donationData.isMonthly = document.getElementById('monthlyDonation').checked;
      donationForm.style.display = 'none';
      donorInfo.style.display = 'block';
  });

  backToDonation.addEventListener('click', () => {
      donorInfo.style.display = 'none';
      donationForm.style.display = 'block';
  });

  toPayment.addEventListener('click', () => {
      donationData.firstName = document.getElementById('firstName').value;
      donationData.lastName = document.getElementById('lastName').value;
      donationData.email = document.getElementById('email').value;
      donationData.isAnonymous = document.getElementById('anonymousDonation').checked;
      donorInfo.style.display = 'none';
      paymentInfo.style.display = 'block';
  });

  backToDonorInfo.addEventListener('click', () => {
      paymentInfo.style.display = 'none';
      donorInfo.style.display = 'block';
  });

  submitDonation.addEventListener('click', () => {
      donationData.cardNumber = document.getElementById('cardNumber').value;
      donationData.expiration = document.getElementById('expiration').value;
      donationData.cvc = document.getElementById('cvc').value;
      donationData.coverFees = document.getElementById('coverFees').checked;

      // Send donation data to server
      fetch('process_donation.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
          },
          body: JSON.stringify(donationData),
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              paymentInfo.style.display = 'none';
              confirmation.style.display = 'block';
              document.getElementById('confirmationDetails').textContent = 
                  `Amount: RF ${donationData.amount}
                  Donation Type: ${donationData.isMonthly ? 'Monthly' : 'One-time'}
                  ${!donationData.isAnonymous ? `Donor: ${donationData.firstName} ${donationData.lastName}` : ''}
                  Your generosity will help feed ${Math.floor(donationData.amount / 200)} children.`;
          } else {
              alert('There was an error processing your donation. Please try again.');
          }
      })
      .catch((error) => {
          console.error('Error:', error);
          alert('There was an error processing your donation. Please try again.');
      });
  });
});