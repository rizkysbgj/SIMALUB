@extends('_loginLayout')

@section('login_content')
<!-- <div class="m-login__signin">
    <div class="m-login__head">
        <h3 class="m-login__title">
            Welcome to SIMALUB
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
            <button id="btnSubmit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary" style="background-color:#3f50d8; border-color:#3f50d8">
                Sign In
            </button>
        </div>
    </form>
</div> -->

<div class="m-login__signin">
    <!-- <div class="m-login__head">
        <h3 class="m-login__title">
            Welcome to SIMALUB
        </h3>
    </div> -->
    <form class="m-login__form m-form" action="" style="margin-bottom: 20px;">
        <div class="form-group m-form__group">
            <input class="form-control m-input" id="tbxUserID" type="text" placeholder="User ID" name="UserID" autocomplete="off" required>
        </div>
        <div class="form-group m-form__group">
            <input class="form-control m-input m-login__form-input--last" id="tbxPassword" type="password" placeholder="Password" name="password" required>
        
        </div>
        <div class="row m-login__form-sub">
            <div class="col m--align-left m-login__form-left">
                <label class="m-checkbox  m-checkbox--light">
                    <input type="checkbox" name="remember">
                    Remember me
                    <span></span>
                </label>
            </div>
            <div class="col m--align-right m-login__form-right">
                <a href="javascript:;" id="m_login_forget_password" class="m-link">
                    Forget Password ?
                </a>
            </div>
        </div>
        <div class="m-login__form-action" style="margin-top: 0px;">
            <button id="btnSubmit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
                Sign In
            </button>
        </div>
    </form>
</div>
<div class="m-login__signup">
    <div class="m-login__head">
        <h3 class="m-login__title">
            Sign Up
        </h3>
        <div class="m-login__desc">
            Enter your details to create your account:
        </div>
    </div>
    <form class="m-login__form m-form" action="">
        <div class="form-group m-form__group">
            <input class="form-control m-input" type="text" placeholder="Fullname" name="fullname">
        </div>
        <div class="form-group m-form__group">
            <input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off">
        </div>
        <div class="form-group m-form__group">
            <input class="form-control m-input" type="password" placeholder="Password" name="password">
        </div>
        <div class="form-group m-form__group">
            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="rpassword">
        </div>
        <div class="row form-group m-form__group m-login__form-sub">
            <div class="col m--align-left">
                <label class="m-checkbox m-checkbox--light">
                    <input type="checkbox" name="agree">
                    I Agree the
                    <a href="#" class="m-link m-link--focus">
                        terms and conditions
                    </a>
                    .
                    <span></span>
                </label>
                <span class="m-form__help"></span>
            </div>
        </div>
        <div class="m-login__form-action">
            <button id="m_login_signup_submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                Sign Up
            </button>
            &nbsp;&nbsp;
            <button id="m_login_signup_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">
                Cancel
            </button>
        </div>
    </form>
</div>
<div class="m-login__forget-password">
    <div class="m-login__head">
        <h3 class="m-login__title">
            Forgotten Password ?
        </h3>
        <div class="m-login__desc">
            Enter your email to reset your password:
        </div>
    </div>
    <form class="m-login__form m-form" action="">
        <div class="form-group m-form__group">
            <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
        </div>
        <div class="m-login__form-action">
            <button id="m_login_forget_password_submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                Request
            </button>
            &nbsp;&nbsp;
            <button id="m_login_forget_password_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">
                Cancel
            </button>
        </div>
    </form>
</div>
<div class="m-login__account">
    <span class="m-login__account-msg">
        Don't have an account yet ?
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">
        Sign Up
    </a>
</div>
@endsection