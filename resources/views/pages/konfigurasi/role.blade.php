<x-master-layout>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Konfigurasi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Konfigurasi</a></li>
                                <li class="breadcrumb-item active">Role</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="col-xxl-4 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        @can('create konfigurasi/roles')
                            <a href="{{ route('konfigurasi.roles.create') }}"
                                class="btn btn-primary btn-animation float-end waves-effect waves-light action"> <i
                                    class="mdi mdi-plus"></i> &nbsp; Tambah
                            </a>
                        @endcan

                        <h6 class="card-title mb-0">Roles</h6>
                    </div>
                    <div class="card-body">

                        {!! $dataTable->table() !!}

                    </div>
                    {{-- <div class="card-footer">
                        <a href="javascript:void(0);" class="link-success float-end">Read More <i
                                class="ri-arrow-right-s-line align-middle ms-1 lh-1"></i></a>
                        <p class="text-muted mb-0">1 days Ago</p>
                    </div> --}}
                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>

    @push('js')
        {!! $dataTable->scripts() !!}


        <script>
            const datatableId = 'role-table';

            handleAction(datatableId)
            handleDelete(datatableId)
        </script>
    @endpush
</x-master-layout>
