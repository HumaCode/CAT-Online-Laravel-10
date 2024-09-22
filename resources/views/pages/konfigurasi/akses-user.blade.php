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
                                <li class="breadcrumb-item active">Akses User</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="col-xxl-4 col-lg-12">
                <div class="card">
                    <div class="card-header">

                        <h6 class="card-title mb-0">Akses User</h6>
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
            const datatableId = 'user-table';

            function handleCheckMenu() {
                $('.parent').on('click', function() {
                    const childs = $(this).parents('tr').find('.child')
                    childs.prop('checked', this.checked)
                })

                $('.child').on('click', function() {
                    const parent = $(this).parents('tr')
                    const childs = parent.find('.child')
                    const checked = parent.find('.child:checked')

                    parent.find('.parent').prop('checked', childs.length == checked.length)
                })

                $('.parent').each(function() {
                    const parent = $(this).parents('tr')
                    const childs = parent.find('.child')
                    const checked = parent.find('.child:checked')

                    parent.find('.parent').prop('checked', childs.length == checked.length)
                })
            }

            handleAction(datatableId, function() {
                handleCheckMenu()

                $('.search').on('keyup', function() {
                    const value = this.value.toLowerCase()
                    $('#menu_permissions tr').show().filter(function(i, item) {
                        return item.innerText.toLowerCase().indexOf(value) == '-1'
                    }).hide()
                })

                $('.copy-user').on('change', function() {
                    handleAjax(`{{ url('konfigurasi/akses-user') }}/${this.value}/user`)
                        .onSuccess(function(res) {
                            $('#menu_permissions').html(res)
                            handleCheckMenu()
                        }, false)
                        .execute()
                })
            })
            handleDelete(datatableId)
        </script>
    @endpush
</x-master-layout>
