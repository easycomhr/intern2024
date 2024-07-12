<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductService
{

    protected ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function search($request){
        return $this->productRepository->search($request);
    }

    public function findAll()
    {
        return $this->productRepository->all();
    }

    public function updateById($id, $params){
        return $this->productRepository->update($id, $params);
    }

    public function findById($id){
        return $this->productRepository->findById($id);
    }

    public function store($request){

        $params = $request->all();

        DB::beginTransaction();
        try {
            if(empty($request->id)){
                $response = $this->productRepository->create($params);
            }else{

                $response = $this->productRepository->update($request->id, $params);
            }
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("ProductService@store %s", $e->getMessage()));

            return false;
        }

    }

    public function destroy($request){

        DB::beginTransaction();
        try {
            $this->productRepository->delete($request->id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("ProductService@destroy %s", $e->getMessage()));

            return false;
        }

    }

}
