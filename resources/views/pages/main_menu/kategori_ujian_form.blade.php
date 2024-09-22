<x-form.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif

    <div class="row">
        <div class="col-lg-12">
            <x-form.input name="kategori" label="Kategori" placeholder="Kategori" value="{{ $data->kategori }}" />
        </div>

    </div>

</x-form.modal>
