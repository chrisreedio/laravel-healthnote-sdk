<?php

namespace ChrisReedIO\HealthNoteSDK\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAppointmentMessages extends Request
{
    protected Method $method = Method::GET;

    /**
     * {@inheritDoc}
     */
    public function resolveEndpoint(): string
    {
        return '/link/messages';
    }

    public function __construct(
        protected string $patient_id,
        protected string $appointment_id
    ) {
    }

    public function defaultQuery(): array
    {
        return [
            'patientId' => $this->patient_id,
            'appointmentId' => $this->appointment_id,
        ];
    }
}
