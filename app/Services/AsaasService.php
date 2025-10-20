<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AsaasService
{
    protected string $apiKey;
    protected string $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('ASAAS_API_KEY');
        $this->baseUrl = 'https://sandbox.asaas.com/api/v3';
    }

    protected function headers(): array
    {
        return [
            'Content-Type' => 'application/json',
            'access_token' => $this->apiKey,
        ];
    }

    /*
     * Criar cliente
     * https://docs.asaas.com/reference/criar-novo-cliente 
     */
    public static function createCustomer(array $data): array
    {
        $self = new self();

        $response = Http::withHeaders($self->headers())
            ->post("{$self->baseUrl}/customers", $data);

        return $response->json();
    }

    /*
     * Criar cobrança (boleto, pix, cartão) 
     * http://docs.asaas.com/reference/criar-nova-cobranca
     */
    public static function createPayment(array $data): array
    {
        $self = new self();

        $response = Http::withHeaders($self->headers())
            ->post("{$self->baseUrl}/payments", $data);

        return $response->json();
    }

    public static function getPayment(string $paymentId): array
    {
        $self = new self();

        $response = Http::withHeaders($self->headers())
            ->get("{$self->baseUrl}/payments/{$paymentId}");

        return $response->json();
    }

    public static function getPixQrCode(string $paymentId): array
    {
        $self = new self();

        $response = Http::withHeaders($self->headers())
            ->get("{$self->baseUrl}/payments/{$paymentId}/pixQrCode");

        return $response->json();
    }

    /** Buscar um cliente pelo ID */
    public static function getCustomer(string $customerId): array
    {
        $self = new self();

        $response = Http::withHeaders($self->headers())
            ->get("{$self->baseUrl}/customers/{$customerId}");

        return $response->json();
    }

    /** Listar clientes */
    public static function listCustomers(): array
    {
        $self = new self();

        $response = Http::withHeaders($self->headers())
            ->get("{$self->baseUrl}/customers");

        return $response->json();
    }

    /** Listar pagamentos */
    public static function listPayments(): array
    {
        $self = new self();

        $response = Http::withHeaders($self->headers())
            ->get("{$self->baseUrl}/payments");

        return $response->json();
    }
}
