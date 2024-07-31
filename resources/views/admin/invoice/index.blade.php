@extends("layouts.app")
@section('title', $title ?? 'Invoice')
@section("content")

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">{{ $title ?? 'Invoice' }}</li>
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
                                    <th>Date</th>
                                    <th>Address</th>
                                    <th>Total Amount</th>
                                    <th>Customer</th>
                                    <th>Voucher</th>
                                    <th>Price Discount</th>
                                    <th class="text-center" style="width: 170px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->date }}</td>
                                        <td>{{ $invoice->address }}</td>
                                        <td>{{ $invoice->total_amount }}</td>
                                        <td>{{ $invoice->Customer->name }}</td>
                                        <td>{{ $invoice->Voucher->name }}</td>
                                        <td>{{ $invoice->price_discount }}</td>
                                        <td class="text-center">
                                            <a role="button" class="btn btn-primary js-on-edit" data-url="{{ route('admin.invoice.detail', $invoice->id) }}">
                                                Detail
                                            </a>
                                            <a role="button" class="btn btn-danger js-on-delete" data-id="{{ $invoice->id }}">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                            <!---- Phân trang----->
                            <div class="pagination-custom">
                                {!! $invoices->appends(request()->input())->links('pagination::bootstrap-4') !!}
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @include('admin.invoice.elements.modal_edit')
    @include('admin.invoice.elements.modal_confirm')

@endsection

@section("pagescript")
    <script>
        const STORE_URL = "{{ route('admin.invoice.store') }}";
        const DELETE_URL = "{{ route('admin.invoice.destroy') }}";
    </script>
    <script src="{{ asset('js/admin/invoice/index.js?t='.config('constants.app_version') )}}"></script>
@endsection


