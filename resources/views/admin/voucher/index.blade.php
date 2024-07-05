@extends("layouts.app")
@section('title', $title ?? 'Voucher')
@section("content")

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Voucher</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">{{ $title ?? 'Voucher' }}</li>
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
                                    <th>Price</th>
                                    <th>Condition</th>
                                    <th>Release date</th>
                                    <th>End date</th>
                                    <th class="text-center" style="width: 170px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($vouchers as $voucher)
                                    <tr>
                                        <td>{{ $voucher->name }}</td>
                                        <td>{{ $voucher->price }}</td>
                                        <td>{{ $voucher->condition }}</td>
                                        <td>{{ $voucher->release_date }}</td>
                                        <td>{{ $voucher->end_date }}</td>
                                        <td class="text-center">
                                            <a role="button" class="btn btn-primary js-on-edit" data-url="{{ route('admin.voucher.detail', $voucher->id) }}">
                                                Detail
                                            </a>
                                            <a role="button" class="btn btn-danger js-on-delete" data-id="{{ $voucher->id }}">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                            <!---- Phân trang----->
                            <div class="pagination-custom">
                                {!! $vouchers->appends(request()->input())->links('pagination::bootstrap-4') !!}
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @include('admin.voucher.elements.modal_edit')
    @include('admin.voucher.elements.modal_confirm')

@endsection

@section("pagescript")
    <script>
        const STORE_URL = "{{ route('admin.voucher.store') }}";
        const DELETE_URL = "{{ route('admin.voucher.destroy') }}";
    </script>
    <script src="{{ asset('js/admin/voucher/index.js?t='.config('constants.app_version') )}}"></script>
@endsection


