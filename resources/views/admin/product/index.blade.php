@extends("layouts.app")
@section('title', $title ?? 'Product')
@section("content")

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">{{ $title ?? 'Product' }}</li>
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
                                    <th>Category</th>
                                    <th>Supplier</th>
                                    <th>Description</th>
                                    <th>nation</th>
                                    <th>Preparation Type</th>
                                    <th>Quantity</th>
                                    <th>Ingredient</th>
                                    <th>Uses</th>
                                    <th>User manual</th>
                                    <th>Important note</th>
                                    <th>Preserve</th>
                                    <th>packing</th>
                                    <th class="text-center" style="width: 170px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->Category->name }}</td>
                                        <td>{{ $product->Supplier->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->nation }}</td>
                                        <td>{{ $product->Preparation_type->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->ingredient }}</td>
                                        <td>{{ $product->uses }}</td>
                                        <td>{{ $product->user_manual }}</td>
                                        <td>{{ $product->important_note }}</td>
                                        <td>{{ $product->preserve }}</td>
                                        <td>{{ $product->packing }}</td>
                                        <td class="text-center">
                                            <a role="button" class="btn btn-primary js-on-edit" data-url="{{ route('admin.product.detail', $product->id) }}">
                                                Detail
                                            </a>
                                            <a role="button" class="btn btn-danger js-on-delete" data-id="{{ $product->id }}">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                            <!---- Phân trang----->
                            <div class="pagination-custom">
                                {!! $products->appends(request()->input())->links('pagination::bootstrap-4') !!}
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @include('admin.product.elements.modal_edit')
    @include('admin.product.elements.modal_confirm')

@endsection

@section("pagescript")
    <script>
        const STORE_URL = "{{ route('admin.product.store') }}";
        const DELETE_URL = "{{ route('admin.product.destroy') }}";
    </script>
    <script src="{{ asset('js/admin/product/index.js?t='.config('constants.app_version') )}}"></script>
@endsection


