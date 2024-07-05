<?php

namespace App\Services;

use App\Repositories\VoucherRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VoucherService
{

    protected VoucherRepository $voucherRepository;

    public function __construct(VoucherRepository $voucherRepository)
    {
        $this->voucherRepository = $voucherRepository;
    }

    public function search($request){
        return $this->voucherRepository->search($request);
    }

    public function findAll()
    {
        return $this->voucherRepository->all();
    }

    public function updateById($id, $params){
        return $this->voucherRepository->update($id, $params);
    }

    public function findById($id){
        return $this->voucherRepository->findById($id);
    }

    public function store($request){

        $params = $request->all();

        DB::beginTransaction();
        try {
            if(empty($request->id)){
                $response = $this->voucherRepository->create($params);
            }else{

                $response = $this->voucherRepository->update($request->id, $params);
            }
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("VoucherService@store %s", $e->getMessage()));

            return false;
        }

    }

    public function destroy($request){

        DB::beginTransaction();
        try {
            $this->voucherRepository->delete($request->id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("VoucherService@destroy %s", $e->getMessage()));

            return false;
        }

    }

}
