<?php

namespace ChrisReedIO\HealthNoteSDK;

use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class HealthNoteConnector extends Connector
{
    use AcceptsJson;

    /**
     * {@inheritDoc}
     */
    public function resolveBaseUrl(): string
    {
        $baseUrl = config('healthnote-sdk.base_url');
        if ($baseUrl === null) {
            throw new \Exception('HealthNoteSDK base_url not set');
        }

        return $baseUrl . '/api';
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->token);
    }
}
