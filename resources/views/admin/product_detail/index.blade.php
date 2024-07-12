@extends("layouts.app")
@section('title', $title ?? 'Product_detail')
@section("content")

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product_detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">{{ $title ?? 'Product_detail' }}</li>
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
                                    <th>Code</th>
                                    <th>Product</th>
                                    <th>Pack</th>
                                    <th>Price</th>
                                    <th>Manufacturing Date</th>
                                    <th>Expiry Date</th>
                                    <th class="text-center" style="width: 170px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($product_details as $product_detail)
                                    <tr>
                                        <td>{{ $product_detail->code }}</td>
                                        <td>{{ $product_detail->Product->name }}</td>
                                        <td>{{ $product_detail->pack }}</td>
                                        <td>{{ $product_detail->price }}</td>
                                        <td>{{ $product_detail->mfg }}</td>
                                        <td>{{ $product_detail->exp }}</td>
                                        <td class="text-center">
                                            <a role="button" class="btn btn-primary js-on-edit" data-url="{{ route('admin.product_detail.detail', $product_detail->id) }}">
                                                Detail
                                            </a>
                                            <a role="button" class="btn btn-danger js-on-delete" data-id="{{ $product_detail->id }}">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                            <!---- Phân trang----->
                            <div class="pagination-custom">
                                {!! $product_details->appends(request()->input())->links('pagination::bootstrap-4') !!}
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @include('admin.product_detail.elements.modal_edit')
    @include('admin.product_detail.elements.modal_confirm')

@endsection

@section("pagescript")
    <script>
        const STORE_URL = "{{ route('admin.product_detail.store') }}";
        const DELETE_URL = "{{ route('admin.product_detail.destroy') }}";
    </script>
    <script src="{{ asset('js/admin/product_detail/index.js?t='.config('constants.app_version') )}}"></script>
@endsection


