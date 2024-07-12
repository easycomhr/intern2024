<?php

namespace App\Repositories;

use App\Models\Image;

/**
 * Class BaseRepository.
 */
class ImageRepository extends BaseRepository
{

    protected function model()
    {
        return Image::class;
    }

    public function search($request){

        $key_search         = $request->key_search ?? null;

        $query = Image::query()->select(
            "images.*"
        )
            ->when(!empty($key_search), function ($query) use ($key_search) {
                $query->where('images.name', 'like', "%$key_search%")
                    ->orWhere('images.product_id', 'like', "%$key_search%")
                ;
            })

        ;

        return $query->paginate(config('constants.paginate') ?? 10);

    }

    public function findById($id){
        return $this->model->find($id);
    }


}
