const firebaseConfig = {
    apiKey: "AIzaSyD5qzVAXXItM5CqN90mA7D86Jl33KbZ4Zo",
    authDomain: "findmentor-otp-verification.firebaseapp.com",
    projectId: "findmentor-otp-verification",
    storageBucket: "findmentor-otp-verification.appspot.com",
    messagingSenderId: "118592873500",
    appId: "1:118592873500:web:7dd4c5638317db3fc7ebd9",
    measurementId: "G-XY8R5QM1FP"
};
firebase.initializeApp(firebaseConfig);


window.onload = function () {
    render();
};

function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
}
var number = '';

function sendOTP() {
    number = $("#number").val();
    firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
        console.log(coderesult);
        $(".send_otp_btn").hide();
        $(".verify_otp_btn").show();
    }).catch(function (error) {
        console.log(error.message)
    });
}

function verify() {
    var code = $("#verification").val();
    coderesult.confirm(code).then(function (result) {
        var user = result.user;
        $('#verified_no').val(number);
        $('#otp_verification_form').submit();
        console.log(user);
    }).catch(function (error) {

    });
}