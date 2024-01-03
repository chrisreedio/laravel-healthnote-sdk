<?php

namespace ChrisReedIO\HealthNoteSDK;

use ChrisReedIO\HealthNoteSDK\Requests\GetAuthenticationToken;
use Illuminate\Support\Facades\Cache;
use Saloon\Exceptions\OAuthConfigValidationException;
use Saloon\Http\Auth\HeaderAuthenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Auth\AuthenticatesRequests;
use Saloon\Traits\Plugins\AcceptsJson;

use function now;

class HealthNoteConnector extends Connector
{
    use AcceptsJson;
    use AuthenticatesRequests;

    /**
     * {@inheritDoc}
     */
    public function resolveBaseUrl(): string
    {
        $baseUrl = config('healthnote-sdk.base_url');
        if ($baseUrl === null) {
            throw new \Exception('HealthNoteSDK base_url not set');
        }

        return $baseUrl.'/api';
    }

    public function __construct()
    {

    }

    protected function defaultAuth(): HeaderAuthenticator
    {
        // Attempt to set up authentication
        try {
            $savedToken = Cache::get('healthnote.token');

            if (!$savedToken) {
                // Fetch a new token
                $session = (new GetAuthenticationToken())->send()->json('session');
                $token = $session['token'];
                $ttl = now()->diff($session['expiresAt']);
                Cache::put('healthnote.token', $token, $ttl);
                $savedToken = $token;
            }

            // dd("Saved Token: $savedToken");
            return new HeaderAuthenticator($savedToken, 'session_token');
            // $this->authenticate($authenticator);
        } catch (ReflectionException|OAuthConfigValidationException|Throwable $e) {
            throw new \Exception('Athena SDK failed to authenticate: '.$e->getMessage());
        }

    }
}
