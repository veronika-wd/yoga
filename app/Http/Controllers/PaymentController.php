<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use App\Services\YooKassaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __construct(
        private YooKassaService $yooKassaService,
    )
    {
    }

    public function pay(Course $course): RedirectResponse
    {
        $payment = $this->yooKassaService->createPayment([
            'amount' => $course->price,
            'description' => "Оплата курса \"$course->name\"",
            'order_id' => $course->id,
        ]);

        $confirmationUrl = $payment->getConfirmation()->getConfirmationUrl();

        $course->orders()->create([
            'user_id' => Auth::id(),
            'payment_id' => $payment->getId(),
            'status' => $payment->getStatus(),
            'confirmation_url' => $confirmationUrl,
        ]);

        return redirect()->away($confirmationUrl);
    }

    public function webhook(Request $request): JsonResponse
    {
        $data = $request->all();

        if ($data['event'] !== 'payment.succeeded') {
            return response()->json(['message' => 'Не оплачен']);
        }

        $paymentId = $data['id'];
        $order = Order::firstWhere('payment_id', $paymentId);

        if (!$order) {
            return response()->json(['message' => 'Нет такого заказа']);
        }

        $paymentInfo = $this->yooKassaService->getPaymentInfo($paymentId);

        $order->update(['status' => $paymentInfo->getStatus()]);
        $order->course->applications()->create(['user_id' => $order->user_id]);

        return response()->json(['message' => 'Ура!']);
    }
}
