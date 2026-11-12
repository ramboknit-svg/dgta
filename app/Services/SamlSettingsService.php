<?php

namespace App\Services;

class SamlSettingsService
{
    public function settings(): array
    {
		 
        $baseUrl = rtrim(config('saml.sp_base_url'), '/');
        
        return [
            'sp' => [
                'entityId' => config('saml.sp_entity_id'),
                'assertionConsumerService' => [
                    'url' => $baseUrl . '/saml/acs',
                ],
                'singleLogoutService' => [
                    'url' => $baseUrl . '/saml/sls',
                ],
                'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
                'x509cert' => $this->readValue(config('saml.sp_x509cert_path')),
                'privateKey' => $this->readValue(config('saml.sp_private_key_path')),
            ],
            'idp' => [
                'entityId' => config('saml.idp_entity_id'),
                'singleSignOnService' => [
                    'url' => config('saml.idp_sso_url'),
                ],
                'singleLogoutService' => [
                    'url' => config('saml.idp_slo_url'),
                ],
                'x509cert' => $this->readValue(config('saml.idp_x509cert_path')),
            ],
        ];
    }

    private function readValue($pathOrValue): string
    {
        if (!$pathOrValue) {
            return '';
        }

        if (is_string($pathOrValue) && file_exists($pathOrValue)) {
            return trim(file_get_contents($pathOrValue));
        }

        return trim((string) $pathOrValue);
    }
}
