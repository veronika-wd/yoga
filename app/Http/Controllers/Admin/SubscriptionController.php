<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SubscriptionController extends Controller
{
    public function index(): View
    {
        $subscriptions = Subscription::all();

        return view('admin.subscriptions.index', ['subscriptions' => $subscriptions]);
    }

    public function store(SubscriptionRequest $request): RedirectResponse
    {
        Subscription::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'count' => $request->count,
        ]);

        return back();
    }

    public function edit(Subscription $subscription): View
    {
        return view('admin.subscriptions.edit', ['subscription' => $subscription]);
    }

    public function update(Subscription $subscription, SubscriptionRequest $request): RedirectResponse
    {
        $subscription->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'count' => $request->count,
        ]);

        return redirect()->route('admin.subscriptions.index');
    }

    public function destroy(Subscription $subscription): RedirectResponse
    {
        $subscription->delete();

        return back();
    }
}
