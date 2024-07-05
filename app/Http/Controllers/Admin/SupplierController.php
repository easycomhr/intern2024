<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SupplierService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SupplierController extends Controller
{

    protected SupplierService $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index(Request $request){
        $suppliers = $this->supplierService->search($request);
        return view('admin.supplier.index', compact('suppliers'));
    }

    public function store(Request $request){

        $response = $this->supplierService->store($request);

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

        $response = $this->supplierService->findById($request->id);
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

        $response = $this->supplierService->destroy($request);

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
