document.querySelectorAll(".formLoad").forEach(function (form) {
    form.addEventListener("submit", function (event) {
        if (!this.checkValidity()) {
            event.preventDefault();
            return false;
        }
        var submitButton = this.querySelector('button[type="submit"]');
        if (submitButton) {
            submitButton.disabled = true;
            submitButton.innerHTML = 'Please Wait...';
        }
        $("#processing").removeClass("hidden");
        $("body").addClass("no-scroll");
        return true;
    });
});
