<x-master-layout>

    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <style>
            .select2-container--default .select2-results__option {
                color: #fff;
                background-color: #05192f;
            }

            .select2-container--default .select2-results__option--highlighted[aria-selected] {
                background-color: #05192f;
                color: #fff;
            }

            .select2-container--default .select2-selection--multiple {
                background-color: #05192f;
                border: 1px solid #444;
                color: #fff;
                margin-top: 10px;

            }

            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                background-color: #05192f;
                color: #fff;
            }
        </style>
    @endpush
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
                                <li class="breadcrumb-item active">User</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="col-xxl-4 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        @can('create konfigurasi/users')
                            <a href="{{ route('konfigurasi.users.create') }}"
                                class="btn btn-primary btn-animation float-end waves-effect waves-light action"> <i
                                    class="mdi mdi-plus"></i> &nbsp; Tambah
                            </a>
                        @endcan

                        <h6 class="card-title mb-0">User</h6>
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

        <!--select2 cdn-->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="{{ asset('') }}assets/js/pages/select2.init.js"></script>
        <script>
            const datatableId = 'user-table';

            handleAction(datatableId, function() {
                select2Init();
            })
            handleDelete(datatableId)
        </script>
    @endpush
</x-master-layout>
