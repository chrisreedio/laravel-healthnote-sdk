<?php

namespace ChrisReedIO\HealthNoteSDK\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAppointmentLink extends Request
{
    protected Method $method = Method::GET;

    /**
     * {@inheritDoc}
     */
    public function resolveEndpoint(): string
    {
        return '/link/status';
    }

    public function __construct(
        protected string $patient_id,
        protected string $appointment_id,
        protected bool $searchAccountNamespace = true
    ) {
    }

    public function defaultQuery(): array
    {
        return [
            'patientId' => $this->patient_id,
            'appointmentId' => $this->appointment_id,
            'searchAccountNamespace' => $this->searchAccountNamespace ? 'true' : 'false',
        ];
    }
}
