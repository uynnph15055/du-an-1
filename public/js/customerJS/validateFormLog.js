// filter email
var filterEmail =
  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

var formSignUp = document.querySelector("#form-sign-up");
var formSignIn = document.querySelector("#form-sign-in");
var formForgotPass = document.querySelector("#form-forgot-pass");
var formCheckCode = document.querySelector("#form-check-code");

function showError(className, message, color) {
  var getClassName = document.querySelector(className);

  getClassName.style.display = "block";
  getClassName.innerHTML = message;
  getClassName.style.color = color;
}

// check Tên đăng ký
function checkName() {
  var checkNameReg = document.querySelector("#check-name-reg");

  if (checkNameReg.value.trim() == "") {
    showError(".check-name-reg", "Vui lòng nhập nhập thông tin!", "red");
    return false;
  } else if (checkNameReg.value.length < 2) {
    showError(".check-name-reg", "Vui lòng nhập tối thiểu 2 chữ cái!", "red");
    return false;
  } else {
    showError(".check-name-reg", "", "");
    return true;
  }
}

// check định dạng email đăng ký
function checkEmail() {
  var checkEmail = document.querySelector("#email-sign-up");

  if (checkEmail.value.trim() == "") {
    showError(".check-email", "Vui lòng nhập nhập email!", "red");
    return false;
  } else if (!filterEmail.test(checkEmail.value)) {
    showError(".check-email", "Trường này phải là email!", "red");
    return false;
  } else {
    showError(".check-email", "", "");
    return true;
  }
}

// check pwd đăng ký
function checkPass() {
  var checkPassReg = document.querySelector("#check-pass-reg");

  if (checkPassReg.value.trim() == "") {
    showError(".check-pass-reg", "Vui lòng nhập nhập mật khẩu!", "red");
    return false;
  } else if (checkPassReg.value.trim().length <= 4) {
    showError(".check-pass-reg", "Mật khẩu yếu", "red");
    return false;
  } else if (checkPassReg.value.trim().length <= 8) {
    showError(".check-pass-reg", "Mật khẩu trung bình", "orange");
    return true;
  } else if (checkPassReg.value.trim().length > 8) {
    showError(".check-pass-reg", "Mật khẩu mạnh", "green");
    return true;
  } else {
    showError(".check-pass-reg", "", "");
    return true;
  }
}

// check email login
var checkEmailLogIn = document.querySelector("#email-sign-in");
function checkEmailLogin() {
  if (checkEmailLogIn.value.trim() == "") {
    showError(".check-email-logIn", "Vui lòng nhập nhập email!", "red");
    return false;
  } else if (!filterEmail.test(checkEmailLogIn.value)) {
    showError(".check-email-logIn", "Trường này phải là email!", "red");
    return false;
  } else {
    showError(".check-email-logIn", "", "");
    return true;
  }
}

// check pass login
function checkPassLogin() {
  var checkPassLogin = document.querySelector("#check-pass-logIn");

  if (checkPassLogin.value.trim() == "") {
    showError(".check-pass-logIn", "Vui lòng nhập nhập mật khẩu!", "red");
    return false;
  } else {
    showError(".check-pass-logIn", "", "");
    return true;
  }
}

function checkCode() {
  var checkCodeInput = document.querySelector("#check-code");

  if (checkCodeInput.value.trim() == "") {
    showError(".check-code", "Vui lòng nhập nhập mã xác nhận!", "red");
    return false;
  } else {
    showError(".check-code", "", "");
    return true;
  }
}

//check email phần quên mật khẩu
function checkEmailForgotPass() {
  var checkEmailForgot = document.querySelector("#check-mail-forgot");
  if (checkEmailForgot.value.trim() == "") {
    showError(".check-mail-forgot", "Vui lòng nhập nhập email!", "red");
    return false;
  } else if (!filterEmail.test(checkEmailForgot.value)) {
    showError(".check-mail-forgot", "Trường này phải là email!", "red");
    return false;
  } else {
    showError(".check-mail-forgot", "", "");
    return true;
  }
}

if (formCheckCode != null) {
  formCheckCode.addEventListener("submit", function (event) {
    checkCode();
    if (!checkCode()) {
      event.preventDefault();
    }
  });
}
if (formSignUp != null) {
  formSignUp.addEventListener("submit", function (event) {
    checkName();
    checkEmail();
    checkPass();

    if (!checkName() && !checkEmail() && !checkPass()) {
      event.preventDefault();
    }
  });
}

if (formSignIn != null) {
  formSignIn.addEventListener("submit", function (event) {
    checkEmailLogin();
    checkPassLogin();

    if (!checkEmailLogin() && !checkPassLogin()) {
      event.preventDefault();
    }
  });
}

if (formForgotPass != null) {
  formForgotPass.addEventListener("submit", function (event) {
    checkEmailForgotPass();
    if (!checkEmailForgotPass()) {
      event.preventDefault();
    }
  });
}
