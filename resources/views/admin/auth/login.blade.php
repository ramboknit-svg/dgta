<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Indian Army</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="{{asset('public/js/crypt.js')}}"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dist/css/adminlte.min.css') }}">
    <link rel="icon" href="{{ asset('public/website/images/indian-aermy-1.png') }}" sizes="32x32" />
</head>
<body class="hold-transition login-page" >

@php
    use Illuminate\Support\Facades\Cache;

    $lockKey = 'login_disabled_' . request()->ip();
    $lockTime = Cache::get($lockKey, 0);
    $disabled = now()->timestamp < $lockTime;
@endphp

<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to Admin</p>
            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
              @if(session('message'))
                                <div class="alert alert-success" >{{ session('message') }}</div>
                            @endif
            <form action="{{ route('Admin.Login') }}" method="POST" id="loginForm" autocomplete="off">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" autocomplete="off" name="email" id="email" placeholder="Email" maxlength="30" required 
                        {{ $disabled ? 'disabled' : '' }}/>
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" autocomplete="off" name="password" id="new_password" placeholder="Password" maxlength="30" required
                        {{ $disabled ? 'disabled' : '' }}/>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span toggle="#password-field" class="fa fa-fw fa-eye fa-eye-slash field_icon new_password"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" {{ $disabled ? 'disabled' : '' }}>
                            Sign In
                        </button>
                    </div>
                    <div class="mt-3">
    <a href="{{ route('forgot.password') }}" class="btn btn-primary forgot">
        Forgot Password?
</a>
</div>
                </div>
            </form>

           

            @if($disabled)
                <p class="text-danger mt-2">Too many login attempts. Please try again after 30 minutes.</p>
            @endif
        </div>
    </div>
</div>

@include('admin.partials.footer_js')
<script  nonce="{{ app('cspNonce') }}">
document.addEventListener("DOMContentLoaded", function () {

    const SECRET_KEY = "my_secret_key_123456";

    function encryptPassword(password) {
        const key = CryptoJS.SHA256(SECRET_KEY);
        const iv = CryptoJS.lib.WordArray.random(16);

        const encrypted = CryptoJS.AES.encrypt(password, key, {
            iv: iv,
            mode: CryptoJS.mode.CBC,
            padding: CryptoJS.pad.Pkcs7
        });

        return {
            cipher: encrypted.ciphertext.toString(CryptoJS.enc.Base64),
            iv: iv.toString(CryptoJS.enc.Base64)
        };
    }

    document.getElementById("loginForm").addEventListener("submit", function () {

        let passwordInput = document.getElementById("new_password");

        let enc = encryptPassword(passwordInput.value);

        // replace password with encrypted value
        passwordInput.value = enc.cipher;

        // send IV hidden
        let iv = document.createElement("input");
        iv.type = "hidden";
        iv.name = "iv";
        iv.value = enc.iv;
        this.appendChild(iv);
    });

});
</script>
<style  nonce="{{ app('cspNonce') }}">
    span.fa.field-icon { position: absolute; top: 10px; right: 2px; }
    p.login-box-msg { text-align: left; padding-left: 0; }
    .logo { background: #fff; padding: 20px; padding-bottom: 0; }
    .card { box-shadow: none; }
    button.btn.btn-primary.btn-block { background: #002C5F; border-color: #002C5F; }
    a.btn.btn-success.btn-block { background: #1b7f42; border-color: #1b7f42; font-weight: 600; }
   .mt-3, .my-3{
   
        margin-left: 60px;
    margin-top: 0rem !important;
   }
   .forgot{
       background: #002C5F !important;
    border-color: #002C5F !important;
   }
   

</style>
</body>
</html>