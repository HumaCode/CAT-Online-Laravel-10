<x-form.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif

    <div class="row">
        <div class="col-lg-12">
            <x-form.input name="kategori_soal" label="Kategori" placeholder="Kategori" value="{{ $data->kategori_soal }}" />
        </div>

    </div>

</x-form.modal>
