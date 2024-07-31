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
                        <label for="">Date</label>
                        <input type="datetime-local" name="date" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Total amount</label>
                        <input type="text" name="total_amount" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Customer</label>
                        <select class="form-control" id="cus_id" name="cus_id" required>
                            <option value="">Select Category</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div><div class="form-group">
                        <label for="category_id">Voucher</label>
                            <select class="form-control" id="vou_id" name="vou_id" required>
                            <option value="">Select Category</option>
                            @foreach($vouchers as $voucher)
                                <option value="{{ $voucher->id }}">{{ $voucher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Price after discount</label>
                        <input type="text" name="price_discount" class="form-control"  placeholder="">
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
