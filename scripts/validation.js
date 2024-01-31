function validateSignIn() {
    let attemptCount = 0;
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (email === "" || password === "" || username === "") {
        alert("Incorrect username or password");
        attemptCount++;
        return false;
    }

    if (attemptCount >= 3) {
        alert("You've been locked out due to too many attempts");
        return false;
    }
    return true;
}

function validateSignUp() {
    let attemptCount = 0;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const passwordConfirm = document.getElementById('password_conf').value;

    if (username === "" || email === "" || password === "") {
        alert("Incorrect username or password");
        attemptCount++;
        return false;
    }
    if (password !== passwordConfirm) {
        alert("Make sure the passwords match!");
        attemptCount++;
        return false;
    }
    if (attemptCount === 3) {
        alert("You've been locked out due to too many attempts");
        return false;
    }
    if (password.length < 8) {
        alert("Your password needs to be at least 8 characters in length");
        return false;
    }
    return true;
}