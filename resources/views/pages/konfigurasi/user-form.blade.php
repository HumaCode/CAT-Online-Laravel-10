<x-form.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif

    <div class="row">
        <div class="col-md-6">
            <x-form.input name="name" label="Nama User" placeholder="Nama User" value="{{ $data->name }}" />
        </div>
        <div class="col-md-6">
            <x-form.input name="username" label="Username" placeholder="Username" value="{{ $data->username }}" />
        </div>

        <div class="col-md-6">
            <x-form.input name="email" label="Email" placeholder="Email" value="{{ $data->email }}" />
        </div>

        @if (request()->routeIs('konfigurasi.users.create'))
            <div class="col-md-6">
                <x-form.input type="password" name="password" label="Password" placeholder="Password" />
            </div>

            <div class="col-md-6">
                <x-form.input type="password" name="password_confirmation" label="Ulangi Password"
                    placeholder="Ulangi Password" />
            </div>
        @endif

        <div class="col-md-6 ">
            <div class="mb-3">
                <span class="form-label mb-3">Roles</span>
                <select class="select2 form-select form-select-sm " name="roles[]" id="roles" multiple="multiple">
                    <option value="" disabled>Pilih Roles</option>

                    @foreach ($roles as $item)
                        <option value="{{ $item }}" @selected(in_array($item, $data->roles->pluck('name')->toArray()))>{{ $item }}</option>
                    @endforeach

                </select>
            </div>
        </div>
    </div>

</x-form.modal>
