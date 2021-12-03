// function openSignUp(){
//     document.querySelector('#signUp').click();
// }
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const formLogContainer = document.getElementById('form-log-container');

signUpButton.addEventListener('click', () => {
	formLogContainer.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	formLogContainer.classList.remove("right-panel-active");
});