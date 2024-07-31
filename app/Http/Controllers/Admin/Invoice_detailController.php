<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\product;
use App\Models\Product_detail;
use App\Services\Invoice_detailService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Customer;
use App\Models\Voucher;

class Invoice_detailController extends Controller
{

    protected Invoice_detailService $invoice_detailService;

    public function __construct(Invoice_detailService $invoice_detailService)
    {
        $this->invoice_detailService = $invoice_detailService;
    }

    public function index(Request $request){
        $invoice_details = $this->invoice_detailService->search($request);
        $product_details = Product_detail::all();
        $invoices = Invoice::all();
        return view('admin.invoice_detail.index', compact('invoice_details', 'product_details','invoices'));
    }

    public function store(Request $request){

        $response = $this->invoice_detailService->store($request);

        if($response){
            return response()->json([
                'success'   => true,
                'message'   => "The save was successful.",
                'data'      => $response,
            ]);
        }

        return response()->json([
            'success'   => false,
            'message'   => "Saving failed.",
        ]);

    }

    public function detail(Request $request){

        $response = $this->invoice_detailService->findById($request->id);
        if($response){
            return response()->json([
                'success'   => true,
                'data'      => $response,
            ]);
        }

        return response()->json([
            'success'   => false,
            'message'   => "Saving failed.",
        ]);

    }

    public function destroy(Request $request){

        $response = $this->invoice_detailService->destroy($request);

        if($response){
            return response()->json([
                'success'   => true,
                'message'   => "Successfully deleted.",
                'data'      => $response,
            ]);
        }

        return response()->json([
            'success'   => false,
            'message'   => "Deletion failed.",
        ]);

    }


}
