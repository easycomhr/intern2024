<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Preparation_typeService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Preparation_typeController extends Controller
{

    protected Preparation_typeService $preparation_typeService;

    public function __construct(Preparation_typeService $preparation_typeService)
    {
        $this->preparation_typeService = $preparation_typeService;
    }

    public function index(Request $request){
        $preparation_types = $this->preparation_typeService->search($request);
        return view('admin.preparation_type.index', compact('preparation_types'));
    }

    public function store(Request $request){

        $response = $this->preparation_typeService->store($request);

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

        $response = $this->preparation_typeService->findById($request->id);
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

        $response = $this->preparation_typeService->destroy($request);

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
