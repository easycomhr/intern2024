$(document).ready(function () {

    initDaterangepicker();

    $(document).on('click', '.js-on-create', function () {
        var _modal = $('#modal-edit');
        $('#form-data')[0].reset();
        _modal.find('h4').text('作成する');
        _modal.modal('show');
    });

    $(document).on('click', '.js-on-delete', function () {
        var _modal = $('#modal-confirm');
        var _form = $('#form-delete');
        var id = $(this).attr('data-id');
        _form.find('input[name="id"]').val(id);
        _modal.modal('show');
    });

    $(document).on('click', '.js-on-edit', function () {
        var _modal = $('#modal-edit');
        var url = $(this).attr('data-url');

        $('#form-data')[0].reset();
        _modal.find('h4').text('編集');

        $.ajax({
            url: url,
            type: 'GET',
            dataType:"json",
            success: function (response) {

                if (response.success) {
                    console.log(response.data);
                    var data = response.data;
                    $('input[name="id"]').val(data.id);
                    $('input[name="domain"]').val(data.domain);
                    $('input[name="project_name"]').val(data.project_name);
                    $('input[name="expired_datetime"]').val(data.expired_datetime_format);
                    $('#modal-edit').modal('show');
                }else{
                    Notification.showError(response.message);
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });

        _modal.modal('show');
    });

    saveData();
    deleteData();

});

function deleteData() {

    $("form#form-delete").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: DELETE_URL,
            type: 'POST',
            dataType:"json",
            data: formData,
            success: function (response) {

                if (response.success) {
                    Notification.showSuccess(response.message);
                    // Reset form
                    $("form#form-delete")[0].reset();

                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);


                }else{
                    Notification.showError(response.message);
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
}

function saveData() {

    $("form#form-data").submit(function(e) {
        e.preventDefault();
        console.log("Submit save");
        var formData = new FormData(this);

        $.ajax({
            url: STORE_URL,
            type: 'POST',
            dataType:"json",
            data: formData,
            success: function (response) {

                if (response.success) {
                    Notification.showSuccess(response.message);
                    $('#modal-edit').modal('hide');
                    // Reset form
                    $("form#form-data")[0].reset();

                    setTimeout(() => {
                        window.location.reload();
                    }, 1200);


                }else{
                    Notification.showError(response.message);
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
}
