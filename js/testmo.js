document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("multiStepForm");
    const formSteps = Array.from(document.querySelectorAll(".form-step"));
    const nextBtns = document.querySelectorAll(".next-step");
    const prevBtns = document.querySelectorAll(".prev-step");
    let currentStep = 0;

    function showStep(step) {
      formSteps.forEach((formStep, index) => {
        formStep.classList.toggle("active", index === step);
      });
    }

    nextBtns.forEach((btn) => {
      btn.addEventListener("click", () => {
        if (validateForm(currentStep)) {
          currentStep++;
          showStep(currentStep);
        }
      });
    });

    prevBtns.forEach((btn) => {
      btn.addEventListener("click", () => {
        currentStep--;
        showStep(currentStep);
      });
    });

    form.addEventListener("submit", (e) => {
      if (!validateForm(currentStep)) {
        e.preventDefault();
      }
    });

    function validateForm(step) {
      const inputs = formSteps[step].querySelectorAll("input, textarea, select");
      for (let input of inputs) {
        if (!input.checkValidity()) {
          input.reportValidity();
          return false;
        }
      }
      return true;
    }

    showStep(currentStep);
  });


  document.addEventListener('DOMContentLoaded', () => {
      const modals = document.querySelectorAll('.modal');
      const openLinks = document.querySelectorAll('.read-more');
      const closeButtons = document.querySelectorAll('.modal .close');

      openLinks.forEach(link => {
          link.addEventListener('click', (e) => {
              e.preventDefault();
              const targetId = link.getAttribute('href');
              const modal = document.querySelector(targetId);
              if (modal) {
                  modal.style.display = 'block';
              }
          });
      });

      closeButtons.forEach(button => {
          button.addEventListener('click', () => {
              button.closest('.modal').style.display = 'none';
          });
      });

      // Close modal when clicking outside of it
      window.addEventListener('click', (e) => {
          if (e.target.classList.contains('modal')) {
              e.target.style.display = 'none';
          }
      });
  });
