function validateSignIn() {
    const email = document.getElementById('emailLogin').value;
    const password = document.getElementById('passwordLogin').value;

    if (email === "" || password === "" || username === "") {
        alert("Incorrect username or password");
        return false;
    }
    return true;
}

function validateSignUp() {
    const email = document.getElementById('emailRegister').value;
    const username = document.getElementById('userNameRegister').value
    const password = document.getElementById('passwordRegister').value;
    const passwordConfirm = document.getElementById('passwordRegisterConfirm').value;

    if (username === "" || email === "" || password === "") {
        alert("Incorrect username or password");
        return false;
    }
    if (password !== passwordConfirm) {
        alert("Make sure the passwords match!");
        return false;
    }
    if (password.length < 8) {
        alert("Your password needs to be at least 8 characters in length");
        return false;
    }
    return true;
}