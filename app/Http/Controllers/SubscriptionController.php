<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('admin.subscriptions');
    }

    public function adminSubscription()
    {
        $subscriptions = Subscription::all();
        return view('admin.subscriptions', [
            'subscriptions' => $subscriptions
        ]);
    }

    public function store(SubscriptionRequest $request)
    {
        Subscription::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'count' => $request->count,
        ]);

        return redirect()->route('admin.subscriptions');
    }

    public function edit(Subscription $subscription)
    {
        return view('admin.edit-subscription', [
            'subscription' => $subscription
        ]);
    }

    public function update(SubscriptionRequest $request, Subscription $subscription)
    {
        $subscription->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'count' => $request->count,
        ]);

        return redirect()->route('admin.subscriptions');
    }

    public function destroy(Subscription $subscription)
    {
       $subscription->delete();
       return redirect()->route('admin.subscriptions');
    }
}
