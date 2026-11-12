<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>

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

            <h4 class="mb-3">Forgot Password</h4>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('forgot.password.check') }}"
      method="POST"
      id="forgotForm">

    @csrf

    <div class="form-group mb-3">
        <input type="text"
               name="email"
               class="form-control"
               placeholder="Enter Username"
               autocomplete="off"
               required>
    </div>

    <div class="form-group mb-3">
        <select name="security_question"
                class="form-control"
                required>

            <option value="">
                Select Security Question
            </option>

            <option value="What is your birth city?">
                What is your birth city?
            </option>

        </select>
    </div>

    <div class="form-group mb-3">
        <input type="text"
               id="security_answer"
               name="security_answer"
               class="form-control"
               placeholder="Enter Answer"
               required>
    </div>

    <button type="submit"
            class="btn btn-primary btn-block">
        Verify
    </button>

</form>

        </div>
    </div>

</div>
<script nonce="{{ app('cspNonce') }}">

document.addEventListener("DOMContentLoaded", function () {

    const SECRET_KEY = "my_secret_key_123456";

    function encryptAnswer(answer) {

        const key = CryptoJS.SHA256(SECRET_KEY);

        const iv = CryptoJS.lib.WordArray.random(16);

        const encrypted = CryptoJS.AES.encrypt(answer, key, {
            iv: iv,
            mode: CryptoJS.mode.CBC,
            padding: CryptoJS.pad.Pkcs7
        });

        return {
            cipher: encrypted.ciphertext.toString(CryptoJS.enc.Base64),
            iv: iv.toString(CryptoJS.enc.Base64)
        };
    }

    document.getElementById("forgotForm")
    .addEventListener("submit", function () {

        let answerInput =
            document.getElementById("security_answer");

        let enc =
            encryptAnswer(answerInput.value);

        // replace answer
        answerInput.value = enc.cipher;

        // hidden IV
        let ivInput =
            document.createElement("input");

        ivInput.type = "hidden";
        ivInput.name = "iv";
        ivInput.value = enc.iv;

        this.appendChild(ivInput);
    });

});

</script>
</body>
</html>
