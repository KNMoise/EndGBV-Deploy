document.addEventListener("DOMContentLoaded", () => {
    const donationPopup = document.getElementById("donationPopup");
    const openModal = document.getElementById("openModal");
    const closeModal = document.getElementById("closeModal");
    const donationForm = document.getElementById("donationForm");
    const donorInfo = document.getElementById("donorInfo");
    const paymentInfo = document.getElementById("paymentInfo");
    const confirmation = document.getElementById("confirmation");

    const nextBtn = document.getElementById("nextBtn");
    const backToDonation = document.getElementById("backToDonation");
    const toPayment = document.getElementById("toPayment");
    const backToDonorInfo = document.getElementById("backToDonorInfo");
    const submitDonation = document.getElementById("submitDonation");

    const amountBtns = document.querySelectorAll(".amount-btn");
    const customAmount = document.getElementById("customAmount");
    const paymentMethodInputs = document.querySelectorAll('input[name="paymentMethod"]');

    let donationData = {};

    // Open modal
    openModal.addEventListener("click", () => {
        donationPopup.style.display = "flex";
    });

    // Close modal
    closeModal.addEventListener("click", () => {
        donationPopup.style.display = "none";
    });

    // Select donation amount
    amountBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            customAmount.value = btn.dataset.amount;
        });
    });

    // Next to donor information
    nextBtn.addEventListener("click", () => {
        const amount = customAmount.value;
        if (amount === "" || isNaN(amount) || amount <= 0) {
            alert("Please enter a valid donation amount.");
            return;
        }
        donationData.amount = parseFloat(amount);
        donationData.isMonthly = document.getElementById("monthlyDonation").checked;

        // Proceed to donor info
        donationForm.style.display = "none";
        donorInfo.style.display = "block";

        // Update image and description
        updateModalContent(
            "images/donation-step-2.jpg",
            "Please provide your donor information."
        );
    });

    // Back to donation form
    backToDonation.addEventListener("click", () => {
        donorInfo.style.display = "none";
        donationForm.style.display = "block";

        updateModalContent(
            "images/donation-step-1.jpg",
            "Your donation helps feed children in need."
        );
    });

    // Next to payment information (validation included)
    toPayment.addEventListener("click", () => {
        donationData.firstName = document.getElementById("firstName").value;
        donationData.lastName = document.getElementById("lastName").value;
        donationData.email = document.getElementById("email").value;
        donationData.isAnonymous = document.getElementById("anonymousDonation").checked;

        if (!donationData.firstName || !donationData.lastName || !validateEmail(donationData.email)) {
            alert("Please complete all fields with valid information.");
            return;
        }

        donorInfo.style.display = "none";
        paymentInfo.style.display = "block";

        updateModalContent(
            "images/donation-step-3.jpg",
            "Provide your payment details to complete the donation."
        );
    });

    // Back to donor information
    backToDonorInfo.addEventListener("click", () => {
        paymentInfo.style.display = "none";
        donorInfo.style.display = "block";
    });

    // Switch payment method between card and PayPal
    paymentMethodInputs.forEach((input) => {
        input.addEventListener("change", () => {
            const cardPayment = document.getElementById("cardPayment");
            const paypalPayment = document.getElementById("paypalPayment");

            if (input.value === "paypal") {
                cardPayment.style.display = "none";
                paypalPayment.style.display = "block";
            } else {
                cardPayment.style.display = "block";
                paypalPayment.style.display = "none";
            }
        });
    });

    // Submit donation
    submitDonation.addEventListener("click", () => {
        const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;

        if (paymentMethod === "card") {
            // Validate card details
            donationData.cardNumber = document.getElementById("cardNumber").value;
            donationData.expiration = document.getElementById("expiration").value;
            donationData.cvc = document.getElementById("cvc").value;
            donationData.coverFees = document.getElementById("coverFees").checked;

            if (!validateCardDetails(donationData.cardNumber, donationData.expiration, donationData.cvc)) {
                alert("Please enter valid card details.");
                return;
            }

            // Send donation data to server
            fetch("process_donation.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(donationData),
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    paymentInfo.style.display = "none";
                    confirmation.style.display = "block";
                    updateModalContent(
                        "images/donation-step-4.jpg",
                        "Thank you for your generous donation!"
                    );

                    document.getElementById("confirmationDetails").innerHTML = `
                        Amount: RF ${donationData.amount}<br>
                        Donation Type: ${donationData.isMonthly ? "Monthly" : "One-time"}<br>
                        ${!donationData.isAnonymous ? `Donor: ${donationData.firstName} ${donationData.lastName}<br>` : ""}
                        Your generosity will help feed ${Math.floor(donationData.amount / 200)} children.
                    `;
                } else {
                    alert("There was an error processing your donation. Please try again.");
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                alert("There was an error processing your donation. Please try again.");
            });

        } else if (paymentMethod === "paypal") {
            // Redirect to PayPal (simulate for now)
            alert("Redirecting to PayPal...");
            window.location.href = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=YOUR_BUTTON_ID";
        }
    });

    // Utility functions
    function updateModalContent(imageSrc, description) {
        document.getElementById("modalImage").src = imageSrc;
        document.getElementById("modalDescription").textContent = description;
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }

    function validateCardDetails(cardNumber, expiration, cvc) {
        const cardNumberRegex = /^[0-9]{16}$/;
        const expirationRegex = /^(0[1-9]|1[0-2])\/?([0-9]{2})$/;
        const cvcRegex = /^[0-9]{3,4}$/;

        return (
            cardNumberRegex.test(cardNumber) &&
            expirationRegex.test(expiration) &&
            cvcRegex.test(cvc)
        );
    }

    const currencySymbolMap = {
        RWF: "RF",
        USD: "$",
        EUR: "€",
        GBP: "£",
        // Add more currencies as needed
    };

    let userCurrency = "RWF"; // Default currency
    let exchangeRates = {};
    const fixerApiKey = "333cd3e694c36cbc70db4417d8f2011b"; // Replace with your Fixer API key

    // Step 1: Detect user location and currency
    fetch("https://ipapi.co/json/")
        .then((response) => response.json())
        .then((data) => {
            const countryCode = data.country_code;
            userCurrency = getCurrencyByCountryCode(countryCode);

            // Step 2: Fetch exchange rates from Fixer
            fetchExchangeRates(userCurrency);
        })
        .catch(() => {
            console.log("Could not detect location. Defaulting to RWF.");
            fetchExchangeRates(userCurrency); // Fetch exchange rates for the default currency
        });

    // Function to map country code to currency code
    function getCurrencyByCountryCode(countryCode) {
        const currencyMap = {
            RW: "RWF",
            US: "USD",
            EU: "EUR",
            GB: "GBP",
            // Add more country and currency mappings as needed
        };
        return currencyMap[countryCode] || "RWF"; // Default to RWF if country is not in the map
    }

    // Step 2: Fetch exchange rates from Fixer API
    function fetchExchangeRates(currency) {
        const url = `http://data.fixer.io/api/latest?access_key=${fixerApiKey}&base=RWF`;
        fetch(url)
            .then((response) => response.json())
            .then((data) => {
                exchangeRates = data.rates;
                updateDonationAmounts(currency);
            })
            .catch((error) => {
                console.error("Error fetching exchange rates:", error);
            });
    }

    // Step 3: Update donation amounts based on the user's currency
    function updateDonationAmounts(currency) {
        const symbol = currencySymbolMap[currency] || currency; // Get currency symbol or code if unknown
        const amountBtns = document.querySelectorAll(".amount-btn");

        amountBtns.forEach((btn) => {
            const amountInRwf = parseInt(btn.dataset.amount);
            const convertedAmount = convertCurrency(amountInRwf, "RWF", currency);
            btn.textContent = `${symbol} ${formatAmount(convertedAmount)}`;
            btn.dataset.amount = convertedAmount; // Update the data-amount attribute with the converted value
        });

        // Update custom amount placeholder
        const customAmountInput = document.getElementById("customAmount");
        customAmountInput.placeholder = `Enter a custom amount (${symbol})`;
    }

    // Function to convert currency using exchange rates
    function convertCurrency(amount, fromCurrency, toCurrency) {
        if (fromCurrency === toCurrency) return amount;
        const rate = exchangeRates[toCurrency];
        return amount * rate;
    }

    // Helper function to format large numbers (e.g., 10000 -> 10,000)
    function formatAmount(amount) {
        return amount.toLocaleString(undefined, {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        });
    }
});
