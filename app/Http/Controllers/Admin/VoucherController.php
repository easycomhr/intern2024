<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use App\Services\VoucherService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VoucherController extends Controller
{

    protected VoucherService $voucherService;

    public function __construct(VoucherService $voucherService)
    {
        $this->voucherService = $voucherService;
    }

    public function index(Request $request){
        $vouchers = $this->voucherService->search($request);
        return view('admin.voucher.index', compact('vouchers'));
    }

    public function store(Request $request){

        $response = $this->voucherService->store($request);

        if($response){
            return response()->json([
                'success'   => true,
                'message'   => "Save successful.",
                'data'      => $response,
            ]);
        }

        return response()->json([
            'success'   => false,
            'message'   => "Save failed。",
        ]);

    }

    public function detail(Request $request){

        $response = $this->voucherService->findById($request->id);
        if($response){
            return response()->json([
                'success'   => true,
                'data'      => $response,
            ]);
        }

        return response()->json([
            'success'   => false,
            'message'   => "Save failed。",
        ]);

    }

    public function destroy(Request $request){

        $response = $this->voucherService->destroy($request);

        if($response){
            return response()->json([
                'success'   => true,
                'message'   => "Successfully deleted。",
                'data'      => $response,
            ]);
        }

        return response()->json([
            'success'   => false,
            'message'   => "Delete failed。",
        ]);

    }
}
