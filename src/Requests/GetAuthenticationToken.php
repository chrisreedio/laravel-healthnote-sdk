<?php

namespace ChrisReedIO\HealthNoteSDK\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\SoloRequest;
use Saloon\Traits\Body\HasJsonBody;
use function config;

class GetAuthenticationToken extends SoloRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    /**
     * @inheritDoc
     */
    public function resolveEndpoint(): string
    {
        $baseUrl = config('healthnote-sdk.base_url');
        if ($baseUrl === null) {
            throw new \Exception('HealthNoteSDK base_url not set');
        }

        return $baseUrl . '/auth/apikey';
    }

    protected function defaultBody(): array
    {
        return [
            'key' => config('healthnote-sdk.api_key'),
        ];
    }

    // TODO: Add Caching

}
