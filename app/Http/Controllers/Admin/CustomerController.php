<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{

    protected CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(Request $request){
        $customers = $this->customerService->search($request);
        return view('admin.customer.index', compact('customers'));
    }

    public function store(Request $request){

        $response = $this->customerService->store($request);

        if($response){
            return response()->json([
                'success'   => true,
                'message'   => "保存が成功しました。",
                'data'      => $response,
            ]);
        }

        return response()->json([
            'success'   => false,
            'message'   => "保存に失敗しました。",
        ]);

    }

    public function detail(Request $request){

        $response = $this->customerService->findById($request->id);
        if($response){
            return response()->json([
                'success'   => true,
                'data'      => $response,
            ]);
        }

        return response()->json([
            'success'   => false,
            'message'   => "保存に失敗しました。",
        ]);

    }

    public function destroy(Request $request){

        $response = $this->customerService->destroy($request);

        if($response){
            return response()->json([
                'success'   => true,
                'message'   => "正常に削除されました。",
                'data'      => $response,
            ]);
        }

        return response()->json([
            'success'   => false,
            'message'   => "削除に失敗しました。",
        ]);

    }


}
