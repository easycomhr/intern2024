<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\Function_medicinalService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Function_medicinalController extends Controller
{

    protected Function_medicinalService $function_medicinalService;

    public function __construct(Function_medicinalService $function_medicinalService)
    {
        $this->function_medicinalService = $function_medicinalService;
    }

    public function index(Request $request){
        $function_medicinals = $this->function_medicinalService->search($request);
        return view('admin.function_medicinal.index', compact('function_medicinals'));
    }

    public function store(Request $request){

        $response = $this->function_medicinalService->store($request);


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

        $response = $this->function_medicinalService->findById($request->id);
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

        $response = $this->function_medicinalService->destroy($request);

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
