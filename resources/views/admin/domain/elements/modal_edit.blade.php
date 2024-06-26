<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ '作成する' }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" id="form-data" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">ドメイン</label>
                        <input type="text" name="domain" class="form-control"  placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">プロジェクト名</label>
                        <input type="text" name="project_name" class="form-control"  placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">有効期限</label>
                        <input type="text" name="expired_datetime" class="form-control input-datetime"  placeholder="">
                    </div>


                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-default mr-1" data-dismiss="modal">閉じる</button>
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div>

    </div>

</div>
