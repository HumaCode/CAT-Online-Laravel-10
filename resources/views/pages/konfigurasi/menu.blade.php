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
                                <li class="breadcrumb-item active">Menu</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class=" col-lg-12">
                <div class="card">
                    <div class="card-header">
                        @can('create konfigurasi/menu')
                            <a href="{{ route('konfigurasi.menu.create') }}"
                                class="btn btn-primary btn-animation float-end waves-effect waves-light action"> <i
                                    class="mdi mdi-plus"></i> &nbsp; Tambah
                            </a>
                        @endcan

                        @can('sort konfigurasi/menu')
                            <a href="{{ route('konfigurasi.menu.sort') }}"
                                class="btn btn-info btn-animation float-end waves-effect waves-light sort"
                                style="margin-right: 10px"> <i class="mdi mdi-sort"></i> &nbsp; Sort
                            </a>
                        @endcan


                        <h6 class="card-title mb-0">Konfigurasi Menu</h6>
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
            const datatableId = 'menu-table';

            function handleMenuChange() {
                $('[name=level_menu]').on('change', function() {
                    // console.log(this.value);
                    if (this.value == 'sub_menu') {
                        console.log(this.value);

                        $('#main_menu_wrapper').removeClass('d-none');
                    } else {
                        console.log(this.value);

                        $('#main_menu_wrapper').addClass('d-none');
                    }
                });
            }

            $('.sort').on('click', function(e) {
                e.preventDefault();
                handleAjax(this.href, 'put')
                    .onSuccess(function(res) {
                        window.location.reload()
                    }, false)
                    .execute()
            })


            handleAction(datatableId, function() {
                handleMenuChange()
            })
        </script>
    @endpush
</x-master-layout>
