<x-form.modal title="Form Modal" action="{{ $action }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="name" label="Nama Menu" placeholder="Nama Menu" value="{{ $data->name }}" />
        </div>

        <div class="col-md-6">
            <x-form.input name="url" label="Url" placeholder="Url" value="{{ $data->url }}" />
        </div>

        <div class="col-md-6">
            <x-form.input name="icon" label="Icon" placeholder="Icon" value="{{ $data->icon }}" />
        </div>

        <div class="col-md-6">
            <x-form.input name="category" label="Kategori" placeholder="Kategori" value="{{ $data->category }}" />
        </div>

        <div class="col-md-6">
            <x-form.input name="orders" label="Urutan" placeholder="Urutan" value="{{ $data->orders }}"
                type="number" />
        </div>

        <div class="col-md-6">
            <x-form.radio label="Level Menu" value="{{ $data->main_menu_id ? 'sub_menu' : 'main_menu' }}"
                name="level_menu" inline="true" :options="['Main Menu' => 'main_menu', 'Sub Menu' => 'sub_menu']" />
        </div>


        <div id="main_menu_wrapper" class="col-md-6 {{ !$data->main_menu_id ? 'd-none' : '' }}">
            <x-form.select name="main_menu" value="{{ $data->main_menu_id }}" label="Main Menu"
                placeholder="-- Pilih Main Menu --" :options="$mainMenus" />
        </div>

        @if (!$data->id)
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="permission" class="form-label d-block mb-3">Permissions </label>

                    @foreach (['create', 'read', 'update', 'delete'] as $item)
                        <x-form.checkbox name="permissions[]" id="{{ $item }}_permissions"
                            value="{{ $item }}" label="{{ $item }}" />
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</x-form.modal>
