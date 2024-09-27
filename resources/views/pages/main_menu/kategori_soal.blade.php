<x-master-layout>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Main Menu</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Main Menu</a></li>
                                <li class="breadcrumb-item active">Kategori Soal</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="col-lg-12">
                <div class="card" data-aos="zoom-in">
                    <div class="card-header">
                        @can('create main-menu/kategori-soal')
                            <a href="{{ route('main-menu.kategori-soal.create') }}"
                                class="btn btn-primary btn-animation float-end waves-effect waves-light action"> <i
                                    class="mdi mdi-plus"></i> &nbsp; Tambah
                            </a>
                        @endcan

                        <h6 class="card-title mb-0">Kategori Soal</h6>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="scroll-horizontal" class="table table-nowrap border-primary align-middle"
                                width="100%">
                                <thead class="bg-primary text-light text-center card-animate">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col"><i class="mdi mdi-centos"></i></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>

    @push('js')
        <script src="{{ asset('') }}assets/js/show_table.js"></script>


        <script>
            const datatableId = 'scroll-horizontal';

            var table;
            var url = '{{ route('main-menu.kategori-soal.data') }}';
            var columns = [{
                    data: 'kategori',
                    name: 'kategori'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ];

            initializeDataTable(datatableId, url, columns);

            handleAction(datatableId)
            handleDelete(datatableId)
        </script>
    @endpush
</x-master-layout>
