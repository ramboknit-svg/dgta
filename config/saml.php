<?php

return [
    /*
    |--------------------------------------------------------------------------
    | SAML Service Provider / Identity Provider Settings
    |--------------------------------------------------------------------------
    | These values are converted from the old PHP SAML implementation.
    | Update SAML_SP_BASE_URL in .env according to your Laravel site URL.
    */

   'sp_base_url' => env('SAML_SP_BASE_URL', env('APP_URL', 'https://134.17.240.2')),
    'sp_entity_id' => env('SAML_SP_ENTITY_ID', 'HqArtracWebEntityId'),

    // Keep certificates/keys outside public folder.
    'sp_x509cert_path' => env('SAML_SP_CERT_PATH', app_path('Libraries/SAML/SAML_Key/iametm.pem')),
    'sp_private_key_path' => env('SAML_SP_PRIVATE_KEY_PATH', app_path('Libraries/SAML/SAML_Key/iametm.army.mil.key')),
    'idp_x509cert_path' => env('SAML_IDP_CERT_PATH', app_path('Libraries/SAML/SAML_Key/class3.cer')),

    'idp_entity_id' => env('SAML_IDP_ENTITY_ID', 'SelfServiceEntityId01'),
    'idp_sso_url' => env('SAML_IDP_SSO_URL', 'https://iam4.army.mil/IAM/User'),
    'idp_slo_url' => env('SAML_IDP_SLO_URL', 'https://iam4.army.mil/IAM/logout'),
    'idp_single_app_logout_url' => env('SAML_IDP_SINGLE_APP_LOGOUT_URL', 'https://iam4.army.mil/IAM/singleAppLogout'),

    // After successful IAM/SAML login user will go here.
    'login_redirect' => env('SAML_LOGIN_REDIRECT', '/admin/dashboard'),
    'logout_redirect' => env('SAML_LOGOUT_REDIRECT', '/saml/logout-success'),

    // If true, Laravel user will be created automatically from SAML attributes.
    'auto_create_user' => env('SAML_AUTO_CREATE_USER', true),

    // Attribute names from IAM. Adjust if your IAM sends different keys.
    'attr_email' => env('SAML_ATTR_EMAIL', 'email'),
    'attr_name' => env('SAML_ATTR_NAME', 'name'),
    'attr_username' => env('SAML_ATTR_USERNAME', 'user_name'),
];
