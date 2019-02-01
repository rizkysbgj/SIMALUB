<!-- @extends('manajerTeknis.layout.partials._head') -->
@extends('_loginLayout')

<div class="m-login__signin">
    <div class="m-login__head">
        <h3 class="m-login__title">
            Welcome to TeamMate
        </h3>
    </div>
    <form class="m-login__form m-form" action="">
        <div class="form-group m-form__group">
            <input id="tbxUserID" class="form-control m-input" type="text" placeholder="User ID" name="UserID" autocomplete="off" required>
        </div>
        <div class="form-group m-form__group">
            <input id="tbxPassword" class="form-control m-input m-login__form-input--last" type="password" name="Password" placeholder="Password" required>
        </div>
        <div class="m-login__form-action">
            <button id="btnSubmit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                Sign In
            </button>
        </div>
    </form>
</div>