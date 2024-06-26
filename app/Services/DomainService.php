<?php

namespace App\Services;

use App\Repositories\DomainRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DomainService
{

    protected DomainRepository $domainRepository;

    public function __construct(DomainRepository $domainRepository)
    {
        $this->domainRepository = $domainRepository;
    }

    public function search($request){
        return $this->domainRepository->search($request);
    }

    public function findAll()
    {
        return $this->domainRepository->all();
    }

    public function updateById($id, $params){
        return $this->domainRepository->update($id, $params);
    }

    public function findById($id){
        return $this->domainRepository->findById($id);
    }

    public function store($request){

        $params = $request->all();

        if(!empty($request->expired_datetime)){
            $expired_datetime = Carbon::createFromFormat('Y/m/d H:i:s', $request->expired_datetime)->format('Y-m-d H:i:s');
            $params['expired_datetime'] = $expired_datetime;
        }

        DB::beginTransaction();
        try {
            if(empty($request->id)){
                $response = $this->domainRepository->create($params);
            }else{

                $response = $this->domainRepository->update($request->id, $params);
            }
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("DomainService@store %s", $e->getMessage()));

            return false;
        }

    }

    public function destroy($request){

        DB::beginTransaction();
        try {
            $this->domainRepository->delete($request->id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error(sprintf("DomainService@destroy %s", $e->getMessage()));

            return false;
        }

    }

}
