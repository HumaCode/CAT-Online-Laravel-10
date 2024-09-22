<x-form.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif

    <div class="row">
        <div class="col-lg-6">

            <label for="">Type Soal</label>
            <select name="type" id="type" class="form-control" {{ $data->id ? 'disabled' : '' }}
                style="{{ $data->id ? 'cursor: no-drop;' : '' }} ">
                <option value="" selected disabled>-- Pilih Type Soal--</option>
                <option value="pilgan" {{ $data->type == 'pilgan' ? 'selected' : '' }}>Pilihan Ganda</option>
                <option value="essay" {{ $data->type == 'essay' ? 'selected' : '' }}>Essay</option>
            </select>

        </div>

        <div class="col-lg-6">
            <label for="">Kategori Ujian</label>
            <select name="kategori_id" id="kategori_id" class="form-control">
                <option value="" selected disabled>-- Pilih Kategori Ujian--</option>

                @foreach ($kat as $item => $key)
                    @if ($data->kategori_id == $item)
                        <option value="{{ $item }}" selected>{{ $key }}</option>
                    @else
                        <option value="{{ $item }}">{{ $key }}</option>
                    @endif
                @endforeach

            </select>
        </div>

    </div>

</x-form.modal>
