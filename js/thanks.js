document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");
    const thanksMessage = document.getElementById("thanksMessage");

    form.addEventListener("submit", function (e) {
        e.preventDefault(); 
        const formData = new FormData(form);
        fetch(form.action, {
            method: "POST",
            body: formData,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (data.status === "success") {
                showThanksMessage("Message sent successfully!", "success");
                form.reset(); 
            } else {
                showThanksMessage(data.message || "Something went wrong. Please try again.", "error");
            }
        })
        .catch(error => {
            showThanksMessage("An error occurred. Please try again. Error: " + error.message, "error");
        });
    });

    function showThanksMessage(message, type) {
        thanksMessage.textContent = message;
        thanksMessage.className = type === "success" ? "success" : "error";
        thanksMessage.style.display = "block";

        setTimeout(() => {
            thanksMessage.style.display = "none";
        }, 5000); 
    }
});
