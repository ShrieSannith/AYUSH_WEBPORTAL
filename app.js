const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

const login_password = document.getElementById('login-password');
const signup_password = document.getElementById('password');
const eyeIcon = document.getElementById('show-password');


eyeIcon.addEventListener('click', () => {
    if (login_password.type === 'password') {
        login_password.type = 'text';
  } else {
        login_password.type = 'password';
    }
   
});


