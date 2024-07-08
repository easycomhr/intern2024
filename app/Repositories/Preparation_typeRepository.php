<?php

namespace App\Repositories;

use App\Models\Preparation_type;

/**
 * Class BaseRepository.
 */
class Preparation_typeRepository extends BaseRepository
{

    protected function model()
    {
        return Preparation_type::class;
    }

    public function search($request){

        $key_search         = $request->key_search ?? null;

        $query = Preparation_type::query()->select(
            "preparation_types.*"
        )
            ->when(!empty($key_search), function ($query) use ($key_search) {
                $query->where('preparation_types.name', 'like', "%$key_search%")
                ;
            })

        ;

        return $query->paginate(config('constants.paginate') ?? 10);

    }

    public function findById($id){
        return $this->model->find($id);
    }


}
