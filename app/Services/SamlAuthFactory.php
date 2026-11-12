<?php

namespace App\Services;

use OneLogin_Saml2_Auth;

class SamlAuthFactory
{
    public function make(): OneLogin_Saml2_Auth
    {
		
        $loader = app_path('Libraries/SAML/_toolkit_loader.php');

        if (!file_exists($loader)) {
            throw new \RuntimeException('SAML toolkit not found. Required path: app/Libraries/SAML/_toolkit_loader.php');
        }

        require_once $loader;

        return new OneLogin_Saml2_Auth(app(SamlSettingsService::class)->settings());
    }
}
