<?php

namespace App\Repositories;

use App\Models\Supplier;

/**
 * Class BaseRepository.
 */
class SupplierRepository extends BaseRepository
{

    protected function model()
    {
        return Supplier::class;
    }

    public function search($request){

        $key_search         = $request->key_search ?? null;

        $query = Supplier::query()->select(
            "suppliers.*"
        )
            ->when(!empty($key_search), function ($query) use ($key_search) {
                $query->where('suppliers.name', 'like', "%$key_search%")
                    ->orWhere('suppliers.email', 'like', "%$key_search%")
                    ->orWhere('suppliers.phone', 'like', "%$key_search%")

                ;
            })

        ;

        return $query->paginate(config('constants.paginate') ?? 10);

    }

    public function findById($id){
        return $this->model->find($id);
    }


}
