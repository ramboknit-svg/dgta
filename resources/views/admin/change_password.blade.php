@extends('admin.index')
 <script src="{{asset('public/js/crypt.js')}}"></script>
@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-2"></div>

            <div class="col-8">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Change Password</h3>
                    </div>

                    @include('admin.partials.messages')

                    <form class="form-horizontal" action="{{ url('admin/change-password') }}" method="post" id="changePasswordForm" autocomplete="off">
                        @csrf

                        <div class="card-body">

                            <div class="form-group row align-items-center">
                                <label for="old_password" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10 password-box">
                                    <input type="password"
                                           class="form-control"
                                           id="old_password"
                                           placeholder="Old Password"
                                           name="old_password"
                                           autocomplete="off"
                                           required>

                                    <span class="fa fa-fw fa-eye fa-eye-slash field_icon old-password"></span>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="password" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10 password-box">
                                    <input type="password"
                                           class="form-control"
                                           id="password"
                                           placeholder="Password"
                                           name="password"
                                           autocomplete="off"
                                           required>

                                    <span class="fa fa-fw fa-eye fa-eye-slash field_icon toggle-password"></span>
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10 password-box">
                                    <input type="password"
                                           class="form-control"
                                           id="confirm_password"
                                           name="confirm_password"
                                           placeholder="Confirm Password"
                                           autocomplete="off"
                                           required>

                                    <span class="fa fa-fw fa-eye fa-eye-slash field_icon confirm_password"></span>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Change Password</button>
                            <a href="{{ url('admin/dashboard') }}" class="btn btn-default custom-btn">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-2"></div>
        </div>

    </section>
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

    function appendHiddenInput(form, name, value) {
        let existing = form.querySelector('input[name="' + name + '"]');
        if (existing) {
            existing.remove();
        }

        let input = document.createElement("input");
        input.type = "hidden";
        input.name = name;
        input.value = value;
        form.appendChild(input);
    }

    document.getElementById("changePasswordForm").addEventListener("submit", function () {

        let oldPasswordInput = document.getElementById("old_password");
        let passwordInput = document.getElementById("password");
        let confirmPasswordInput = document.getElementById("confirm_password");

        let oldEnc = encryptPassword(oldPasswordInput.value);
        let newEnc = encryptPassword(passwordInput.value);
        let confirmEnc = encryptPassword(confirmPasswordInput.value);

        oldPasswordInput.value = oldEnc.cipher;
        passwordInput.value = newEnc.cipher;
        confirmPasswordInput.value = confirmEnc.cipher;

        appendHiddenInput(this, "old_password_iv", oldEnc.iv);
        appendHiddenInput(this, "password_iv", newEnc.iv);
        appendHiddenInput(this, "confirm_password_iv", confirmEnc.iv);
    });

});
</script>

<style nonce="{{ app('cspNonce') }}">
.password-box {
    position: relative;
}

.password-box .fa {
    position: absolute;
    top: 29%;
    right: 22px;
    cursor: pointer;
}
</style>

@endsection