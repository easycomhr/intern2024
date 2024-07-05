<?php

namespace App\Services;

use App\Repositories\SupplierRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupplierService
{

    protected SupplierRepository $supplierRepository;

    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function search($request){
        return $this->supplierRepository->search($request);
    }

    public function findAll()
    {
        return $this->supplierRepository->all();
    }

    public function updateById($id, $params){
        return $this->supplierRepository->update($id, $params);
    }

    public function findById($id){
        return $this->supplierRepository->findById($id);
    }

    public function store($request){

        $params = $request->all();

        DB::beginTransaction();
        try {
            if(empty($request->id)){
                $response = $this->supplierRepository->create($params);
            }else{

                $response = $this->supplierRepository->update($request->id, $params);
            }
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("SupplierService@store %s", $e->getMessage()));

            return false;
        }

    }

    public function destroy($request){

        DB::beginTransaction();
        try {
            $this->supplierRepository->delete($request->id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("SupplierService@destroy %s", $e->getMessage()));

            return false;
        }

    }

}
