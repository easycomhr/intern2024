<?php

namespace App\Repositories;

use App\Models\Domain;

/**
 * Class BaseRepository.
 */
class DomainRepository extends BaseRepository
{

    protected function model()
    {
        return Domain::class;
    }

    public function search($request){

        $domain         = $request->domain ?? null;
        $project_name   = $request->project_name ?? null;

        $query = $this->model->select(
                "domains.*"
            )
            ->when(!empty($project_name), function ($query) use ($project_name) {
                $query->where('domains.project_name', 'like', "%$project_name%");
            })
            ->when(!empty($domain), function ($query) use ($domain) {
                $query->where('domains.domain', 'like', "%$domain%");
            })
        ;

        return $query->paginate(config('constants.paginate') ?? 10);

    }

    public function findById($id){
        return $this->model->find($id);
    }


}
