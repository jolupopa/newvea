<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentPlatform;
use App\Order;

class PaymentController extends BaseAdminController
{
   

    public function show( $id ) {
        $paymentPlatforms = PaymentPlatform::all();
        $order = Order::findOrFail($id);
        
        return view('admin.payment.show', [
            'order'=> $order,
            'payments'=> $paymentPlatforms
        ]);
    }
}
