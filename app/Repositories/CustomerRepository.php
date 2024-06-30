<?php

namespace App\Repositories;

use App\Models\Customer;

/**
 * Class BaseRepository.
 */
class CustomerRepository extends BaseRepository
{

    protected function model()
    {
        return Customer::class;
    }

    public function search($request){

        $key_search         = $request->key_search ?? null;

        $query = Customer::query()->select(
                    "customers.*"
            )
            ->when(!empty($key_search), function ($query) use ($key_search) {
                $query->where('customers.name', 'like', "%$key_search%")
                    ->orWhere('customers.email', 'like', "%$key_search%")
                    ->orWhere('customers.phone', 'like', "%$key_search%")

                ;
            })

        ;

        return $query->paginate(config('constants.paginate') ?? 10);

    }

    public function findById($id){
        return $this->model->find($id);
    }


}
