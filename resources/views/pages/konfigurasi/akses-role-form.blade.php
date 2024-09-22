<x-form.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif

    <div class="row">
        <div class="col-md-12">
            <h5>Role : {{ $data->name }}</h5>

            <div class="my-3">
                <x-form.select class="copy-role" label="Copy dari role" placeholder="Copy role" :options="$roles" />
                <x-form.input name="search" class="search" label="Cari menu" placeholder="Cari..." />
            </div>

            <hr>

            <div class="table-responsive">
                <table class="table table-nowrap align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">Menu</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="menu_permissions">

                        @include('pages.konfigurasi.akses-role-items')

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-form.modal>
