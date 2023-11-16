import { login } from "./crud-handler.js";

document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.getElementById("loginForm");
  loginForm.addEventListener("submit", handleLoginFormSubmit);

  function handleLoginFormSubmit(event) {
    event.preventDefault();
    const formData = new FormData(loginForm);
    login(formData, handleLoginResponse);
  }

  function handleLoginResponse(response) {
    if (response === "Login success") {
      window.location.href = "index.php";
    } else {
      toastr.error("Login gagal. Silakan coba lagi.", "Error");
    }
  }
});
