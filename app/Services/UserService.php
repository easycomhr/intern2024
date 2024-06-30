<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserService
{

    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function search($request){
        return $this->userRepository->search($request);
    }

    public function findAll()
    {
        return $this->userRepository->all();
    }

    public function updateById($id, $params){
        return $this->userRepository->update($id, $params);
    }

    public function findById($id){
        return $this->userRepository->findById($id);
    }

    public function store($request){

        $params = $request->all();

        DB::beginTransaction();
        try {
            if(empty($request->id)){
                $response = $this->userRepository->create($params);
            }else{

                $response = $this->userRepository->update($request->id, $params);
            }
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("UserService@store %s", $e->getMessage()));

            return false;
        }

    }

    public function destroy($request){

        DB::beginTransaction();
        try {
            $this->userRepository->delete($request->id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("UserService@destroy %s", $e->getMessage()));

            return false;
        }

    }

}
