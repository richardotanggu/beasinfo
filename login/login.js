document.addEventListener("DOMContentLoaded", function () {
    var loginForm = document.getElementById("loginForm");

    loginForm.addEventListener("submit", function (event) {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var errorMessage = document.getElementById("error-message");

        // Validasi input
        if (username.trim() === "" || password.trim() === "") {
            errorMessage.textContent = "Username dan password harus diisi.";
            event.preventDefault(); // Mencegah pengiriman formulir jika ada kesalahan
        } else {
            errorMessage.textContent = ""; // Menghapus pesan kesalahan jika input valid
        }
    });
});