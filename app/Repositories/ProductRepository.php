<?php

namespace App\Repositories;

use App\Models\Product;

/**
 * Class BaseRepository.
 */
class ProductRepository extends BaseRepository
{

    protected function model()
    {
        return Product::class;
    }

    public function search($request){

        $key_search         = $request->key_search ?? null;

        $query = Product::query()->select(
            "products.*"
        )
            ->when(!empty($key_search), function ($query) use ($key_search) {
                $query->where('products.name', 'like', "%$key_search%")
                    ->orWhere('products.category_id', 'like', "%$key_search%")
                    ->orWhere('products.supplier_id', 'like', "%$key_search%")
                    ->orWhere('products.pre_type_id', 'like', "%$key_search%")

                ;
            })

        ;

        return $query->paginate(config('constants.paginate') ?? 10);

    }

    public function findById($id){
        return $this->model->find($id);
    }


}
