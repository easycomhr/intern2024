<?php

namespace App\Services;

use App\Repositories\Invoice_detailRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Invoice_detailService
{

    protected Invoice_detailRepository $invoice_detailRepository;

    public function __construct(Invoice_detailRepository $invoice_detailRepository)
    {
        $this->invoice_detailRepository = $invoice_detailRepository;
    }

    public function search($request){
        return $this->invoice_detailRepository->search($request);
    }

    public function findAll()
    {
        return $this->invoice_detailRepository->all();
    }

    public function updateById($id, $params){
        return $this->invoice_detailRepository->update($id, $params);
    }

    public function findById($id){
        return $this->invoice_detailRepository->findById($id);
    }

    public function store($request){

        $params = $request->all();

        DB::beginTransaction();
        try {
            if(empty($request->id)){
                $response = $this->invoice_detailRepository->create($params);
            }else{

                $response = $this->invoice_detailRepository->update($request->id, $params);
            }
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("Invoice_detailService@store %s", $e->getMessage()));

            return false;
        }

    }

    public function destroy($request){

        DB::beginTransaction();
        try {
            $this->invoice_detailRepository->delete($request->id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("Invoice_detailService@destroy %s", $e->getMessage()));

            return false;
        }

    }

}
