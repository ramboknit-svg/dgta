<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>

    <link rel="stylesheet"
        href="{{ asset('public/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet"
        href="{{ asset('public/dist/css/adminlte.min.css') }}">

    <script src="{{ asset('public/js/crypt.js') }}"></script>
</head>

<body class="hold-transition login-page">

<div class="login-box">

    <div class="card">
        <div class="card-body login-card-body">

            <h4 class="mb-3">Reset Password</h4>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('update.password') }}"
                  method="POST"
                  id="resetPasswordForm">

                @csrf

                <div class="form-group mb-3">
                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control"
                           placeholder="New Password"
                           required>
                </div>

                <div class="form-group mb-3">
                    <input type="password"
                           name="password_confirmation"
                           id="password_confirmation"
                           class="form-control"
                           placeholder="Confirm Password"
                           required>
                </div>

                <button type="submit"
                        class="btn btn-success btn-block">
                    Update Password
                </button>

            </form>

        </div>
    </div>

</div>

<script nonce="{{ app('cspNonce') }}">

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

    document.getElementById("resetPasswordForm")
    .addEventListener("submit", function () {

        let password =
            document.getElementById("password");

        let confirmPassword =
            document.getElementById("password_confirmation");

        // encrypt password
        let encPassword =
            encryptPassword(password.value);

        // encrypt confirm password
        let encConfirm =
            encryptPassword(confirmPassword.value);

        // replace values
        password.value = encPassword.cipher;

        confirmPassword.value = encConfirm.cipher;

        // password IV
        let iv1 = document.createElement("input");

        iv1.type = "hidden";
        iv1.name = "password_iv";
        iv1.value = encPassword.iv;

        this.appendChild(iv1);

        // confirm IV
        let iv2 = document.createElement("input");

        iv2.type = "hidden";
        iv2.name = "confirm_password_iv";
        iv2.value = encConfirm.iv;

        this.appendChild(iv2);

    });

});

</script>

</body>
</html>