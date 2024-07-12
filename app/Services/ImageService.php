<?php

namespace App\Services;

use App\Repositories\ImageRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageService
{

    protected ImageRepository $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function search($request){
        return $this->imageRepository->search($request);
    }

    public function findAll()
    {
        return $this->imageRepository->all();
    }

    public function updateById($id, $params){
        return $this->imageRepository->update($id, $params);
    }

    public function findById($id){
        return $this->imageRepository->findById($id);
    }

    public function store($request){

        $params = $request->all();

        DB::beginTransaction();
        try {
            if(empty($request->id)){
                $response = $this->imageRepository->create($params);
            }else{

                $response = $this->imageRepository->update($request->id, $params);
            }
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("ImageService@store %s", $e->getMessage()));

            return false;
        }

    }

    public function destroy($request){

        DB::beginTransaction();
        try {
            $this->imageRepository->delete($request->id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("ImageService@destroy %s", $e->getMessage()));

            return false;
        }

    }

}
