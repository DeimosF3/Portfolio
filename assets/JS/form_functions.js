window.onload = () => {
  const button1 = document.getElementById("loginButton");
  button1.addEventListener("click", () => showForm("loginForm"));
  const button2 = document.getElementById("registerButton");
  button2.addEventListener("click", () => showForm("registerForm"));
  const cancelButton1 = document.getElementById("cancelButton1");
  cancelButton1.addEventListener("click", cancelForm);
  const cancelButton2 = document.getElementById("cancelButton2");
  cancelButton2.addEventListener("click", cancelForm);

  function showForm(formId) {
    document.getElementById("buttons").classList.add("hidden");
    document.getElementById("cancelButton1").classList.remove("hidden");
    document.getElementById("cancelButton2").classList.remove("hidden");
    document.getElementById("loginForm").classList.add("hidden");
    document.getElementById("registerForm").classList.add("hidden");

    document.getElementById(formId).classList.remove("hidden");
  }

  function cancelForm() {
    document.getElementById("buttons").classList.remove("hidden");
    document.getElementById("cancelButton1").classList.add("hidden");
    document.getElementById("cancelButton2").classList.add("hidden");
    document.getElementById("loginForm").classList.add("hidden");
    document.getElementById("registerForm").classList.add("hidden");
  }
};
