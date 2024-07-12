<?php

namespace App\Services;

use App\Repositories\Product_detailRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Product_detailService
{

    protected Product_detailRepository $product_detailRepository;

    public function __construct(Product_detailRepository $product_detailRepository)
    {
        $this->product_detailRepository = $product_detailRepository;
    }

    public function search($request){
        return $this->product_detailRepository->search($request);
    }

    public function findAll()
    {
        return $this->product_detailRepository->all();
    }

    public function updateById($id, $params){
        return $this->product_detailRepository->update($id, $params);
    }

    public function findById($id){
        return $this->product_detailRepository->findById($id);
    }

    public function store($request){

        $params = $request->all();

        DB::beginTransaction();
        try {
            if(empty($request->id)){
                $response = $this->product_detailRepository->create($params);
            }else{

                $response = $this->product_detailRepository->update($request->id, $params);
            }
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("Product_detailService@store %s", $e->getMessage()));

            return false;
        }

    }

    public function destroy($request){

        DB::beginTransaction();
        try {
            $this->product_detailRepository->delete($request->id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("Product_detailService@destroy %s", $e->getMessage()));

            return false;
        }

    }

}
