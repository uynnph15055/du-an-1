function showError(className, message, color) {
    var getClassName = document.querySelector(className);

    getClassName.style.display = "block";
    getClassName.innerHTML = message;
    getClassName.style.color = color;

}

function checkName(){
    var checkNameReg = document.querySelector("#check-name-reg");
    console.log(checkNameReg.value);
    if(checkNameReg.value.trim() == ""){
        showError(".check-name-reg", "Vui lòng nhập nhập thông tin!", "red");
    }
    else if(checkNameReg.value.length < 2){
        showError(".check-name-reg", "Vui lòng nhập tối thiểu 2 chữ cái!", "red");
    }
    else{
        showError(".check-name-reg", "", "");
    }
}

var filterEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 

function checkEmail(){
    var checkEmail = document.querySelector("#email-sign-up");

    if(checkEmail.value.trim() == ""){
        showError(".check-email", "Vui lòng nhập nhập email!", "red");
    }
    else if(!filterEmail.test(checkEmail.value)){
        showError(".check-email", "Trường này phải là email!", "red");
    }
    else{
        showError(".check-email", "", "");
    }
}

function checkPass(){
    var checkPassReg = document.querySelector("#check-pass-reg");

    if(checkPassReg.value.trim() == ""){
        showError(".check-pass-reg", "Vui lòng nhập nhập mật khẩu!", "red");
    }
    // else if(checkPassReg.value.match(filterPassStrong)){
    //     showError(".check-pass", "Mật khẩu mạnh!", "red");
    // }
    // else if(filterPassMedium.test(checkPassReg.value)){
    //     showError(".check-pass", "Mật khẩu trung bình!", "orange");
    // }
    // else if(filterPassWeak.test(checkPassReg.value)){
    //     showError(".check-pass", "Mật khẩu yếu! Chứa ít nhất 1 số, 1 chữ thường và 1 chữ in hoa", "red");
    // }
    else{
        showError(".check-pass-reg", "", "");
    }
}
var checkEmailSignIn = document.querySelector("#email-sign-in");

function checkEmailLogin(){
    if(checkEmailSignIn.value.trim() == ""){
        showError(".check-email-logIn", "Vui lòng nhập nhập email!", "red");
    }
    else if(!filterEmail.test(checkEmailSignIn.value)){
        showError(".check-email-logIn", "Trường này phải là email!", "red");
    }
    else{
        showError(".check-email-logIn", "", "");
    }
}

function checkPassLogin(){
    var checkPassLogin = document.querySelector("#check-pass-logIn");

    if(checkPassLogin.value.trim() == ""){
        showError(".check-pass-logIn", "Vui lòng nhập nhập mật khẩu!", "red");
    }
    // else if(checkPassLogin.value.match(filterPassStrong)){
    //     showError(".check-pass", "Mật khẩu mạnh!", "red");
    // }
    // else if(filterPassMedium.test(checkPassLogin.value)){
    //     showError(".check-pass", "Mật khẩu trung bình!", "orange");
    // }
    // else if(filterPassWeak.test(checkPassLogin.value)){
    //     showError(".check-pass", "Mật khẩu yếu! Chứa ít nhất 1 số, 1 chữ thường và 1 chữ in hoa", "red");
    // }
    else{
        showError(".check-pass-logIn", "", "");
    }
}

function checkEmailForgot(){
    var checkEmailForgot = document.querySelector("#check-mail-forgot");

    if(checkEmailForgot.value.trim() == ""){
        showError(".check-mail-forgot", "Vui lòng nhập nhập email!", "red");
    }
    else if(!filterEmail.test(checkEmailForgot.value)){
        showError(".check-mail-forgot", "Trường này phải là email!", "red");
    }
    else{
        showError(".check-mail-forgot", "", "");
    }
}
