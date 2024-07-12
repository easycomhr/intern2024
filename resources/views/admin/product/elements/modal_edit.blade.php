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
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Select Category</option>
                            @foreach($Category as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="supplier_id">Supplier</label>
                        <select class="form-control" id="supplier_id" name="supplier_id" required>
                            <option value="">Select Supplier</option>
                            @foreach($Supplier as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="description" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Nation</label>
                        <input type="text" name="nation" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="pre_type_id">Preparation Type</label>
                        <select class="form-control" id="pre_type_id" name="pre_type_id" required>
                            <option value="">Select Preparation Type</option>
                            @foreach($Pre_types as $pre_type)
                                <option value="{{ $pre_type->id }}">{{ $pre_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="text" name="quantity" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Ingredient</label>
                        <input type="text" name="ingredient" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Uses</label>
                        <input type="text" name="uses" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">User Manual</label>
                        <input type="text" name="user_manual" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Important Note</label>
                        <input type="text" name="important_note" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Preserve</label>
                        <input type="text" name="preserve" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Packing</label>
                        <input type="text" name="packing" class="form-control"  placeholder="">
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
