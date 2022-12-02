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
<script type="text/javascript" src="Js/login.js"></script>
@endsection