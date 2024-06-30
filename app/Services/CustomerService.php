<?php

namespace App\Services;

use App\Repositories\CustomerRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerService
{

    protected CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function search($request){
        return $this->customerRepository->search($request);
    }

    public function findAll()
    {
        return $this->customerRepository->all();
    }

    public function updateById($id, $params){
        return $this->customerRepository->update($id, $params);
    }

    public function findById($id){
        return $this->customerRepository->findById($id);
    }

    public function store($request){

        $params = $request->all();

        DB::beginTransaction();
        try {
            if(empty($request->id)){
                $response = $this->customerRepository->create($params);
            }else{

                $response = $this->customerRepository->update($request->id, $params);
            }
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("CustomerService@store %s", $e->getMessage()));

            return false;
        }

    }

    public function destroy($request){

        DB::beginTransaction();
        try {
            $this->customerRepository->delete($request->id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("CustomerService@destroy %s", $e->getMessage()));

            return false;
        }

    }

}
