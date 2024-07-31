<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ 'Add new' }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" id="form-data" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="category_id">Invoice</label>
                        <select class="form-control" id="invoice_id" name="invoice_id" required>
                            <option value="">Select Category</option>
                            @foreach($invoices as $invoice)
                                <option value="{{ $invoice->id }}">{{ $invoice->date}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Product</label>
                        <select class="form-control" id="pro_id" name="pro_id" required>
                            <option value="">Select Category</option>
                            @foreach($product_details as $product_detail)
                                <option value="{{ $product_detail->id }}">{{ $product_detail->code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="text" name="quantity" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Price total</label>
                        <input type="text" name="total_price" class="form-control"  placeholder="">
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-default mr-1" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>

    </div>

</div>
