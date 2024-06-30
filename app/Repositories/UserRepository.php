<?php

namespace App\Repositories;

use App\Models\User;

/**
 * Class BaseRepository.
 */
class UserRepository extends BaseRepository
{

    protected function model()
    {
        return User::class;
    }

    public function search($request){

        $key_search         = $request->key_search ?? null;

        $query = $this->model->select(
                "users.*"
            )
            ->when(!empty($key_search), function ($query) use ($key_search) {
                $query->where('users.name', 'like', "%$key_search%")
                    ->orWhere('users.email', 'like', "%$key_search%")
                ;
            })

        ;

        return $query->paginate(config('constants.paginate') ?? 10);

    }

    public function findById($id){
        return $this->model->find($id);
    }


}
