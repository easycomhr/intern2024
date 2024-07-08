<?php

namespace App\Services;

use App\Repositories\Preparation_typeRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Preparation_typeService
{

    protected Preparation_typeRepository $preparation_typeRepository;

    public function __construct(Preparation_typeRepository $preparation_typeRepository)
    {
        $this->preparation_typeRepository = $preparation_typeRepository;
    }

    public function search($request){
        return $this->preparation_typeRepository->search($request);
    }

    public function findAll()
    {
        return $this->preparation_typeRepository->all();
    }

    public function updateById($id, $params){
        return $this->preparation_typeRepository->update($id, $params);
    }

    public function findById($id){
        return $this->preparation_typeRepository->findById($id);
    }

    public function store($request){

        $params = $request->all();


        DB::beginTransaction();
        try {
            if(empty($request->id)){
                $response = $this->preparation_typeRepository->create($params);
            }else{

                $response = $this->preparation_typeRepository->update($request->id, $params);
            }
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("Preparation_typeService@store %s", $e->getMessage()));

            return false;
        }

    }

    public function destroy($request){

        DB::beginTransaction();
        try {
            $this->preparation_typeRepository->delete($request->id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("Preparation_typeService@destroy %s", $e->getMessage()));

            return false;
        }

    }

}
