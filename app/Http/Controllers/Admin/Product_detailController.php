<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Product_detailService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\product;

class Product_detailController extends Controller
{

    protected Product_detailService $product_detailService;

    public function __construct(Product_detailService $product_detailService)
    {
        $this->product_detailService = $product_detailService;
    }

    public function index(Request $request){
        $product_details = $this->product_detailService->search($request);
        $Products = product::all();
        return view('admin.product_detail.index', compact('product_details', 'Products'));
    }

    public function store(Request $request){

        $response = $this->product_detailService->store($request);

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

        $response = $this->product_detailService->findById($request->id);
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

        $response = $this->product_detailService->destroy($request);

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
