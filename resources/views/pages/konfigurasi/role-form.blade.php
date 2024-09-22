<x-form.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
    @method('put')
    @endif

    <div class="row">
        <div class="col-md-6">
            <x-form.input name="name" label="Nama Role" placeholder="Nama Role" value="{{ $data->name }}" />
        </div>

        <div class="col-md-6">
            <x-form.input name="guard_name" label="Guard Name" placeholder="Guard Name"
                value="{{ $data->guard_name }}" />
        </div>
    </div>

</x-form.modal>