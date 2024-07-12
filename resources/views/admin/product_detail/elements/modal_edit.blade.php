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
                        <label for="">Code</label>
                        <input type="text" name="code" class="form-control"  placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="category_id">Product</label>
                        <select class="form-control" id="product_id" name="product_id" required>
                            <option value="">Select Category</option>
                            @foreach($Products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Pack</label>
                        <input type="text" name="pack" class="form-control"  placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control"  placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">Manufacturing Date</label>
                        <input type="date" name="mfg" class="form-control"  placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">Expiry Date</label>
                        <input type="date" name="exp" class="form-control"  placeholder="">
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
