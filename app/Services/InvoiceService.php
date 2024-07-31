<?php

namespace App\Services;

use App\Repositories\InvoiceRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceService
{

    protected InvoiceRepository $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function search($request){
        return $this->invoiceRepository->search($request);
    }

    public function findAll()
    {
        return $this->invoiceRepository->all();
    }

    public function updateById($id, $params){
        return $this->invoiceRepository->update($id, $params);
    }

    public function findById($id){
        return $this->invoiceRepository->findById($id);
    }

    public function store($request){

        $params = $request->all();

        DB::beginTransaction();
        try {
            if(empty($request->id)){
                $response = $this->invoiceRepository->create($params);
            }else{

                $response = $this->invoiceRepository->update($request->id, $params);
            }
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("InvoiceService@store %s", $e->getMessage()));

            return false;
        }

    }

    public function destroy($request){

        DB::beginTransaction();
        try {
            $this->invoiceRepository->delete($request->id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("InvoiceService@destroy %s", $e->getMessage()));

            return false;
        }

    }

}
