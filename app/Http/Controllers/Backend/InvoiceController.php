<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->query = Auth::user()->type;
            if($this->query == 'backend'){
                return $next($request);
            }else{
                return redirect()->route('inicio');
            }  
        });
    }

    public function index()
    {
        $invoices = Invoice::all();

        return view('backend.invoices.index', compact('invoices'));
    }

    public function invoicesRun()
    {
        $orders_users = Order::select('user_id')->where('status', 'Pendiente')->groupBy('user_id')->get();

        foreach($orders_users as $key => $value){
            $query = Invoice::count();

            if($query == 0){
                $code = 1;
            }else{
                $code = $query + 1;
            }

            $invoice = new Invoice();
            $invoice->code = $code;
            $invoice->user_id = $value->user_id;
            $invoice->save();

            $orders = Order::where('user_id', $value->user_id)->where('status', 'Pendiente')->get();
            foreach($orders as $key2 => $value2){
                $invoiceDetail = new InvoiceDetail();
                $invoiceDetail->invoice_id = $invoice->id;
                $invoiceDetail->order_id = $value2->id;
                $invoiceDetail->save();

                $value2->status = 'Procesada';
                $value2->save();
            }
        }

        return redirect()->route('invoices.run.success');
    }

    public function invoicesRunSuccess()
    {
        return view('backend.invoices.success');
    }

    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);

        return view('backend.invoices.show', compact('invoice'));
    }
}
