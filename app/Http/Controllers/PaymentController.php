<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function getPurchasesPayments($id)
    {
        $payments = Payment::where('purchase_id', $id)
            ->where('purchase_id', '<>', null)->get();
        $html = view('cpanel.purchases.payments', compact('payments' ))->render();
        return $html;

    }


    public function addPurchasesPayment($id){
        $sale = Purchase::find($id);

        if($sale->net < 0){
            $sale->net = $sale->net*-1;
            $sale->paid = $sale->paid*-1;
        }

        $remain = $sale->net - $sale->paid;

        $html = view('cpanel.purchases.add_payment',compact('remain','id'))->render();
        return $html;
    }

    public function storePurchasesPayment(Request $request, $id){

        $sale = Purchase::find($id);
        $amount = $request->amount;
        $net = $sale->net;

        if($sale->net < 0){
            $amount = $amount*-1;
            $net = $net*-1;
        }

        $shift = Shift::where('user_id' , '=' , Auth::user() -> id)
            -> where('state' , '=' , 0 )->get();
        $shift_number = count($shift ) > 0 ? $shift[0] -> id : 0 ;
        $payment = Payment::create([
            'date' => $request->date,
            'sale_id' => null,
            'purchase_id' => $id,
            'company_id' => $sale->customer_id,
            'amount' => $amount,
            'paid_by' => $request->paid_by,
            'remain' => $net - $request->amount,
            'user_id' => Auth::user() ? Auth::id() : 0,
            'shift_number' => $shift_number
        ]);


        $paid = $sale->paid + $amount;
        $sale->update([
            'paid' => $paid
        ]);

        $clientController = new ClientMoneyController();
        $clientController->syncMoney($sale->customer_id,0, $request->amount * -1);

        $vendorMovementController = new VendorMovementController();
        $vendorMovementController->addPurchasePaymentMovement($payment->id);

        return redirect()->route('purchases');
    }
    public function deletePurchasesPayment($id){
        $payment = Payment::find($id);
        $sale = Purchase::find($payment->purchase_id);

        Payment::destroy($id);

        $paid = $sale->paid - $payment->amount;

        $sale->update([
            'paid' => $paid
        ]);

        $clientController = new ClientMoneyController();
        $clientController->syncMoney($sale->customer_id,0,$payment->amount );

        $vendorMovementController = new VendorMovementController();
        $vendorMovementController->removePurchasePaymentMovement($id);

        return redirect()->route('purchases');
    }

    public function deleteAllPurchasePayments($id){

        $sale = Purchase::find($id);
        $payments = Payment::query()->where('purchase_id',$id);

        foreach ($payments as $payment){
            Payment::destroy($payment->id);

            $paid = $sale->paid - $payment->amount;

            $sale->update([
                'paid' => $paid
            ]);

            $clientController = new ClientMoneyController();
            $clientController->syncMoney($sale->customer_id,0,$payment->amount * -1);

            $vendorMovementController = new VendorMovementController();
            $vendorMovementController->removePurchasePaymentMovement($payment->id);
        }


    }
}
