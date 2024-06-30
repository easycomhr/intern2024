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
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control"  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control"  placeholder="">
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
