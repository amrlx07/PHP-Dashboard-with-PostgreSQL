function togglePasswordVisibility() {
    var passwordField = document.getElementById("password");
    var icon = document.getElementById("show-password");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.src = "eye-off-icon.png"; // Ganti ikon mata terbuka
    } else {
        passwordField.type = "password";
        icon.src = "eye-icon.png"; // Ganti ikon mata tertutup
    }
}