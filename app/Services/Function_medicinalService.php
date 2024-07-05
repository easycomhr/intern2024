<?php

namespace App\Services;

use App\Repositories\Function_medicinalRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Function_medicinalService
{

    protected Function_medicinalRepository $function_medicinalRepository;

    public function __construct(Function_medicinalRepository $function_medicinalRepository)
    {
        $this->function_medicinalRepository = $function_medicinalRepository;
    }

    public function search($request){
        return $this->function_medicinalRepository->search($request);
    }

    public function findAll()
    {
        return $this->function_medicinalRepository->all();
    }

    public function updateById($id, $params){
        return $this->function_medicinalRepository->update($id, $params);
    }

    public function findById($id){
        return $this->function_medicinalRepository->findById($id);
    }

    public function store($request){

        $params = $request->all();


        DB::beginTransaction();
        try {
            if(empty($request->id)){
                $response = $this->function_medicinalRepository->create($params);
            }else{

                $response = $this->function_medicinalRepository->update($request->id, $params);
            }
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("Function_medicinalService@store %s", $e->getMessage()));

            return false;
        }

    }

    public function destroy($request){

        DB::beginTransaction();
        try {
            $this->function_medicinalRepository->delete($request->id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("Function_medicinalService@destroy %s", $e->getMessage()));

            return false;
        }

    }

}
