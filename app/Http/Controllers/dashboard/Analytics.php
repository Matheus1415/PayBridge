<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class Analytics extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $data = [];

    $subscription = $user->subscriptions()->active()->first();

    if ($subscription) {
      $stripeSub = $subscription->asStripeSubscription();
      $timestamp = $stripeSub->current_period_end;

      $data['subscription_end'] = date('d/m/Y H:i:s', $timestamp);
      $data['subscription_name'] = $subscription->name;
      $data['stripe_status'] = $subscription->stripe_status;
    } else {
      $data['subscription_end'] = 'Nenhuma assinatura ativa';
      $data['subscription_name'] = 'N/A';
      $data['stripe_status'] = 'none';
    }

    $invoices = $user->invoices()->count();

    return view('content.dashboard.dashboards-analytics', [
      'user' => $user,
      'data' => $data,
      'invoices' => $invoices,
    ]);
  }

  public function plans()
  {
    $user = Auth::user();
    $prices = [
      "monthly" => Crypt::encryptString(env('STRIPE_PRODUCT_ID') . "|" . env('STRIPE_MONTHLY_PRICE_ID')),
      "yearly" => Crypt::encryptString(env('STRIPE_PRODUCT_ID') . "|" . env('STRIPE_YEARLY_PRICE_ID')),
      "longest" => Crypt::encryptString(env('STRIPE_PRODUCT_ID') . "|" . env('STRIPE_LOGEST_PRICE_ID')),
    ];
    return view(
      'content.dashboard.plans',
      [
        'user' => $user,
        'prices' => $prices,
      ]
    );
  }

  public function planSelect($id)
  {
    $plan = Crypt::decryptString($id);
    if (!$plan) {
      return redirect()->route('dashboard-plans');
    }

    $plan = explode('|', $plan);
    $product_id = $plan[0];
    $price_id = $plan[1];
    return auth()->user()->newSubscription('default', $price_id)->checkout([
      'success_url' => route('subscription.success'),
      'cancel_url' => route('dashboard-plans'),
    ]);

  }

  public function subscriptionSucess()
  {
    $user = auth()->user();
    return view('content.pages.page-subscription-sucess', [
      'user' => $user
    ]);
  }
}
