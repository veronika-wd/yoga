<?php

namespace App\Services;

use YooKassa\Client;
use YooKassa\Model\Payment\PaymentInterface;
use YooKassa\Request\Payments\CreatePaymentResponse;

class YooKassaService
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client();

        $this->client->setAuth(
            config('yookassa.shop_id'),
            config('yookassa.secret_key'),
        );
    }

    public function createPayment(array $data): ?CreatePaymentResponse
    {
        try {
            return $this->client->createPayment([
                'amount' => [
                    'value' => number_format($data['amount'], 2, '.', ''),
                    'currency' => 'RUB',
                ],
                'confirmation' => [
                    'type' => 'redirect',
                    'return_url' => config('yookassa.return_url'),
                ],
                'capture' => true,
                'description' => $data['description'],
                'metadata' => [
                    'order_id' => $data['order_id'],
                ],
            ], uniqid('', true));
        } catch (\Throwable $e) {
            \Log::error('YooKassa payment creation failed', [
                'error' => $e->getMessage(),
                'data' => $data,
            ]);

            return null;
        }
    }

    public function getPaymentInfo(string $paymentId): ?PaymentInterface
    {
        try {
            return $this->client->getPaymentInfo($paymentId);
        } catch (\Throwable $e) {
            \Log::error('Failed to fetch payment info', [
                'payment_id' => $paymentId,
                'error' => $e->getMessage(),
            ]);

            return null;
        }
    }
}
