<x-form.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif

    <div class="row">
        <div class="col-md-12">
            <h5>User : {{ $data->name }}</h5>

            <div class="my-3">
                <x-form.select class="copy-user" label="Copy dari user" placeholder="Copy user" :options="$users" />
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

                        @include('pages.konfigurasi.akses-user-items')

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-form.modal>
