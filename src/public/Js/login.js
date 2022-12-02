const form = document.getElementById("loginForm");

function handleForm(event) {
    event.preventDefault();

    const emailInput = document.querySelector('#email');
    const passwordInput = document.querySelector('#password');

    if (!emailInput.value || !passwordInput.value) {
        showFormAlert('All fields are required!');

        return false;
    }

    login(emailInput.value, passwordInput.value);
}

form.addEventListener('submit', handleForm);

function login(userEmail, UserPassword) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/doLogin", true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify({
        email: userEmail,
        password: UserPassword
    }));

    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            const jsonResponse = JSON.parse(xhr.responseText)

            if (xhr.status === 200) {
                window.location.href = '/admin';
            } else if (xhr.status === 400) {
                showFormAlert(jsonResponse.message);
            }
        }
    }
}