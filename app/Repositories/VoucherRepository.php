<?php

namespace App\Repositories;

use App\Models\Voucher;

/**
 * Class BaseRepository.
 */
class VoucherRepository extends BaseRepository
{

    protected function model()
    {
        return Voucher::class;
    }

    public function search($request){

        $key_search         = $request->key_search ?? null;

        $query = Voucher::query()->select(
            "vouchers.*"
        )
            ->when(!empty($key_search), function ($query) use ($key_search) {
                $query->where('vouchers.name', 'like', "%$key_search%")

                ;
            })

        ;

        return $query->paginate(config('constants.paginate') ?? 10);

    }

    public function findById($id){
        return $this->model->find($id);
    }


}
