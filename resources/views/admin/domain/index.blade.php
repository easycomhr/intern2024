@extends("layouts.app")
@section('title', $title ?? 'Domain')
@section("content")

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Domain</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">{{ $title ?? 'Domain' }}</li>
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
                                    <th>Domain</th>
                                    <th>Project Name</th>
                                    <th>Expired Date</th>
                                    <th class="text-center" style="width: 170px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($domains as $domain)
                                    <tr>
                                        <td>{{ $domain->domain }}</td>
                                        <td>{{ $domain->project_name }}</td>
                                        <td>{{ $domain->expired_datetime }}</td>
                                        <td class="text-center">
                                            <a role="button" class="btn btn-primary js-on-edit" data-url="{{ route('admin.domain.detail', $domain->id) }}">
                                                Detail
                                            </a>
                                            <a role="button" class="btn btn-danger js-on-delete" data-id="{{ $domain->id }}">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>

                            <div class="pagination-custom">
                                {!! $domains->appends(request()->input())->links('pagination::bootstrap-4') !!}
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @include('admin.domain.elements.modal_edit')
    @include('admin.domain.elements.modal_confirm')

@endsection

@section("pagescript")
    <script>
        const STORE_URL = "{{ route('admin.domain.store') }}";
        const DELETE_URL = "{{ route('admin.domain.destroy') }}";
    </script>
    <script src="{{ asset('js/admin/domain/index.js?t='.config('constants.app_version') )}}"></script>
@endsection


