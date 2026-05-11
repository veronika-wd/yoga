<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subscription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SubscriptionController extends Controller
{
    public function index(): View
    {
        $subscriptions = Subscription::all();
        return view('subscriptions.subscriptions', [
            'subscriptions' => $subscriptions
        ]);
    }

    public function show(Subscription $subscription): View
    {
        return view('subscriptions.show', [
            'subscription' => $subscription
        ]);
    }

    public function appointment(Subscription $subscription): RedirectResponse
    {
        $subscription->applications()->create(['user_id' => Auth::id()]);

        return redirect()->back();
    }
}
