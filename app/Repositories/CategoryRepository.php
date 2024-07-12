<?php

namespace App\Repositories;

use App\Models\Category;

/**
 * Class BaseRepository.
 */
class CategoryRepository extends BaseRepository
{

    protected function model()
    {
        return Category::class;
    }

    public function search($request){

        $key_search         = $request->key_search ?? null;

        $query = Category::query()->with('Function_medicinal')->select(
            "categorys.*"
        )
            ->when(!empty($key_search), function ($query) use ($key_search) {
                $query->where('categorys.name', 'like', "%$key_search%")
                ;
            })

        ;

        return $query->paginate(config('constants.paginate') ?? 10);

    }

    public function findById($id){
        return $this->model->find($id);
    }


}
