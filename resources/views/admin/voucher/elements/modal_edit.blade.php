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
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Condition</label>
                        <input type="number" name="condition" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Release date</label>
                        <input type="date" name="release_date" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">End date</label>
                        <input type="date" name="end_date" class="form-control"  placeholder="">
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
