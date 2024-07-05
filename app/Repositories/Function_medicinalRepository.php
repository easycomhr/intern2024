<?php

namespace App\Repositories;

use App\Models\Function_medicinal;

/**
 * Class BaseRepository.
 */
class Function_medicinalRepository extends BaseRepository
{

    protected function model()
    {
        return Function_medicinal::class;
    }

    public function search($request){

        $key_search         = $request->key_search ?? null;

        $query = Function_medicinal::query()->select(
            "function_medicinals.*"
        )
            ->when(!empty($key_search), function ($query) use ($key_search) {
                $query->where('function_medicinals.name', 'like', "%$key_search%")
                ;
            })

        ;

        return $query->paginate(config('constants.paginate') ?? 10);

    }

    public function findById($id){
        return $this->model->find($id);
    }


}
