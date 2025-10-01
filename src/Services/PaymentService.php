<?php

namespace Jmrashed\Ecommerce\Services;

use Jmrashed\Ecommerce\Models\Order;
use Jmrashed\Ecommerce\Models\Payment;
use Exception;

class PaymentService
{
    /**
     * Process a payment for an order.
     *
     * @param  \Jmrashed\Ecommerce\Models\Order  $order
     * @param  string  $paymentMethod
     * @param  array  $paymentDetails
     * @return \Jmrashed\Ecommerce\Models\Payment
     * @throws \Exception
     */
    public function processPayment(Order $order, string $paymentMethod, array $paymentDetails)
    {
        // In a real application, this would integrate with actual payment gateways (Stripe, PayPal, etc.)
        // For now, we'll simulate a successful payment.

        switch ($paymentMethod) {
            case 'stripe':
                // Simulate Stripe payment processing
                $transactionId = 'STRIPE_' . uniqid();
                $status = 'completed';
                break;
            case 'paypal':
                // Simulate PayPal payment processing
                $transactionId = 'PAYPAL_' . uniqid();
                $status = 'completed';
                break;
            default:
                throw new Exception('Unsupported payment method: ' . $paymentMethod);
        }

        $payment = $order->payment()->create([
            'transaction_id' => $transactionId,
            'amount' => $order->total_amount,
            'currency' => 'USD', // Assuming USD for now
            'method' => $paymentMethod,
            'status' => $status,
            'details' => json_encode($paymentDetails),
        ]);

        $order->update(['payment_status' => $status]);

        return $payment;
    }
}