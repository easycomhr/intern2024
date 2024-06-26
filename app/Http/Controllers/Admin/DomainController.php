<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DomainService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DomainController extends Controller
{

    protected DomainService $domainService;

    public function __construct(DomainService $domainService)
    {
        $this->domainService = $domainService;
    }

    public function index(Request $request){
        $domains = $this->domainService->search($request);
        return view('admin.domain.index', compact('domains'));
    }

    public function store(Request $request){

        $response = $this->domainService->store($request);

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

        $response = $this->domainService->findById($request->id);
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

        $response = $this->domainService->destroy($request);

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
