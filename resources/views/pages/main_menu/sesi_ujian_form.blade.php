<x-form.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif

    <div class="row">
        <div class="col-lg-4">
            <x-form.input name="name" label="Nama Sesi" placeholder="Nama Sesi" value="{{ $data->name }}" />
        </div>


        <div class="col-lg-4 mb-3">
            <label class="form-label mt-0">Waktu Mulai</label>
            <input type="time" name="time_start" class="form-control" id="" value="{{ $data->time_start }}">
        </div>

        <div class="col-lg-4 mb-3">
            <label class="form-label mt-0">Waktu Selesai</label>
            <input type="time" name="time_end" class="form-control" id="" value="{{ $data->time_end }}">
        </div>



    </div>

</x-form.modal>
