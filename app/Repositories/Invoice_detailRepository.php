<?php

namespace App\Repositories;

use App\Models\Invoice_detail;

/**
 * Class BaseRepository.
 */
class Invoice_detailRepository extends BaseRepository
{

    protected function model()
    {
        return Invoice_detail::class;
    }

    public function search($request){

        $key_search   = $request->key_search ?? null;

        $query = Invoice_detail::query()->select(
            "invoice_details.*"
        )
            ->when(!empty($key_search), function ($query) use ($key_search) {
                $query->where('invoice_detail.pro_id', 'like', "%$key_search%")
                    ->orWhere('invoice_detail.invoice_id', 'like', "%$key_search%")
                ;
            })

        ;

        return $query->paginate(config('constants.paginate') ?? 10);

    }

    public function findById($id){
        return $this->model->find($id);
    }


}
