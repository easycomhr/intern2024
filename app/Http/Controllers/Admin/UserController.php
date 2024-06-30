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

        $response = $this->userService->findById($request->id);
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

        $response = $this->userService->destroy($request);

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
