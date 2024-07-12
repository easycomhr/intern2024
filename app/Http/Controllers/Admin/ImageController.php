<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\product;

class ImageController extends Controller
{

    protected ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index(Request $request){
        $images = $this->imageService->search($request);
        $products = product::all();
        return view('admin.image.index', compact('images', 'products'));
    }

    public function store(Request $request){
        if($request-> has('file_upload')){
            $file=$request->file_upload;
            $ext=$request->file_upload->extension();
            $file_name=time().'-'.'product.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image'=>$file_name]);
        $response = $this->imageService->store($request);

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

        $response = $this->imageService->findById($request->id);
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

        $response = $this->imageService->destroy($request);

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
