<?php

namespace App\Repositories;

use App\Models\Invoice;

/**
 * Class BaseRepository.
 */
class InvoiceRepository extends BaseRepository
{

    protected function model()
    {
        return Invoice::class;
    }

    public function search($request){

        $key_search   = $request->key_search ?? null;

        $query = Invoice::query()->select(
            "invoices.*"
        )
            ->when(!empty($key_search), function ($query) use ($key_search) {
                $query->where('invoice.cus_id', 'like', "%$key_search%")
                    ->orWhere('invoice.vou_id', 'like', "%$key_search%")
                    ->orWhere('invoice.date', 'like', "%$key_search%")
                ;
            })

        ;

        return $query->paginate(config('constants.paginate') ?? 10);

    }

    public function findById($id){
        return $this->model->find($id);
    }


}
