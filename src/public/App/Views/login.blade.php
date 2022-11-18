@extends('layout')

@section('content')
<div class="container text-center">
    <div class="card bg-light mt-5">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Log In</h4>
            <p class="text-center">Log in to use your account</p>

            <form id="loginForm">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input id="email" name="" class="form-control" placeholder="Email address" type="email">
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input id="password" class="form-control" placeholder="Password" type="password">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Log In </button>
                </div>
            </form>
        </article>
    </div>
</div>
@endsection

@section('javascript')
<script>
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
</script>
@endsection