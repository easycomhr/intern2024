<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryService
{

    protected CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function search($request){
        return $this->categoryRepository->search($request);
    }

    public function findAll()
    {
        return $this->categoryRepository->all();
    }

    public function updateById($id, $params){
        return $this->categoryRepository->update($id, $params);
    }

    public function findById($id){
        return $this->categoryRepository->findById($id);
    }

    public function store($request){

        $params = $request->all();

        DB::beginTransaction();
        try {
            if(empty($request->id)){
                $response = $this->categoryRepository->create($params);
            }else{

                $response = $this->categoryRepository->update($request->id, $params);
            }
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("CategoryService@store %s", $e->getMessage()));

            return false;
        }

    }

    public function destroy($request){

        DB::beginTransaction();
        try {
            $this->categoryRepository->delete($request->id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("CategoryService@destroy %s", $e->getMessage()));

            return false;
        }

    }

}
