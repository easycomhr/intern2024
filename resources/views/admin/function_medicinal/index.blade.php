@extends("layouts.app")
@section('title', $title ?? 'Function_medicinal')
@section("content")

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Function_medicinal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">{{ $title ?? 'Function_medicinal' }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools">
                                <a role="button" class="btn btn-success js-on-create">
                                    + Add new
                                </a>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Display</th>
                                    <th class="text-center" style="width: 170px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($function_medicinals as $function_medicinal)
                                    <tr>
                                        <td>{{ $function_medicinal->name }}</td>
                                        <td>{{ $function_medicinal->display }}</td>
                                        <td class="text-center">
                                            <a role="button" class="btn btn-primary js-on-edit" data-url="{{ route('admin.function_medicinal.detail', $function_medicinal->id) }}">
                                                Detail
                                            </a>
                                            <a role="button" class="btn btn-danger js-on-delete" data-id="{{ $function_medicinal->id }}">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                            <!---- Phân trang----->
                            <div class="pagination-custom">
                                {!! $function_medicinals->appends(request()->input())->links('pagination::bootstrap-4') !!}
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @include('admin.function_medicinal.elements.modal_edit')
    @include('admin.function_medicinal.elements.modal_confirm')

@endsection

@section("pagescript")
    <script>
        const STORE_URL = "{{ route('admin.function_medicinal.store') }}";
        const DELETE_URL = "{{ route('admin.function_medicinal.destroy') }}";
    </script>
    <script src="{{ asset('js/admin/function_medicinal/index.js?t='.config('constants.app_version') )}}"></script>
@endsection


