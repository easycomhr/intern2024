<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserController extends Controller
{

    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request){
        $users = $this->userService->search($request);
        return view('admin.user.index', compact('users'));
    }

    public function store(Request $request){

        $response = $this->userService->store($request);

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

        $response = $this->userService->findById($request->id);
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

        $response = $this->userService->destroy($request);

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
