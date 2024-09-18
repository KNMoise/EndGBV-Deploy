
$(document).ready(function () {
    var currentStep = 1;

    function showStep(step) {
      $(".form-step").removeClass("active previous");
      $(".step" + step).addClass("active");
      if (step === 1) {
        $("#prevBtn").hide();
      } else {
        $("#prevBtn").show();
      }
      if (step === 3) {
        $("#nextBtn").hide();
        $("#submitBtn").show();
      } else {
        $("#nextBtn").show();
        $("#submitBtn").hide();
      }
    }

    $("#nextBtn").click(function () {
      if (currentStep < 3) {
        $(".step" + currentStep).addClass("previous");
        currentStep++;
        showStep(currentStep);
      }
    });

    $("#prevBtn").click(function () {
      if (currentStep > 1) {
        $(".step" + currentStep).addClass("previous");
        currentStep--;
        showStep(currentStep);
      }
    });

    $("#faqForm").submit(function (e) {
      e.preventDefault();
      // Handle form submission here
      alert("FAQ submitted successfully!");
    });

    showStep(currentStep);
  });
  