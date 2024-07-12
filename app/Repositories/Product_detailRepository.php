<?php

namespace App\Repositories;

use App\Models\Product_detail;

/**
 * Class BaseRepository.
 */
class Product_detailRepository extends BaseRepository
{

    protected function model()
    {
        return Product_detail::class;
    }

    public function search($request){

        $key_search         = $request->key_search ?? null;

        $query = Product_detail::query()->select(
            "product_details.*"
        )
            ->when(!empty($key_search), function ($query) use ($key_search) {
                $query->where('product_details.code', 'like', "%$key_search%")
                    ->orWhere('product_details.product_id', 'like', "%$key_search%")
                ;
            })

        ;

        return $query->paginate(config('constants.paginate') ?? 10);

    }

    public function findById($id){
        return $this->model->find($id);
    }


}
