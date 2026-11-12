<?php

if (!defined('SAML_CUSTOM_CIPHER')) {
    define('SAML_CUSTOM_CIPHER', 'AES-256-ECB');
}

if (!defined('SAML_CUSTOM_INIT_VECTOR_LENGTH')) {
    define('SAML_CUSTOM_INIT_VECTOR_LENGTH', 0);
}

if (!function_exists('saml_encrypt')) {
    function saml_encrypt($plainText, $secretKey)
    {
        try {
            $initVector = openssl_random_pseudo_bytes(8);

            $raw = openssl_encrypt(
                $plainText,
                SAML_CUSTOM_CIPHER,
                $secretKey,
                OPENSSL_RAW_DATA
            );

            if ($raw === false) {
                return false;
            }

            return base64_encode($initVector . $raw);
        } catch (\Throwable $e) {
            return null;
        }
    }
}

if (!function_exists('saml_decrypt')) {
    function saml_decrypt($cipherText, $secretKey)
    {
        try {
            $encoded = base64_decode($cipherText);

            if ($encoded === false) {
                return false;
            }

            $initVector = substr($encoded, 0, SAML_CUSTOM_INIT_VECTOR_LENGTH);
            $data = substr($encoded, SAML_CUSTOM_INIT_VECTOR_LENGTH);

            return openssl_decrypt(
                $data,
                SAML_CUSTOM_CIPHER,
                $secretKey,
                OPENSSL_RAW_DATA,
                $initVector
            );
        } catch (\Throwable $e) {
            return null;
        }
    }
}
