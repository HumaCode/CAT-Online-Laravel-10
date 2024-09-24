<x-master-layout>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Main Menu</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Main Menu</a></li>
                                <li class="breadcrumb-item active">Detail Soal</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="col-lg-12">
                <div class="card" data-aos="zoom-in">
                    <div class="card-header">
                        @can('create main-menu/data-soal')
                            <a href="{{ route('main-menu.detail-soal.index', $kode_soal) }}"
                                class="btn btn-danger btn-animation float-end waves-effect waves-light"> <i
                                    class="mdi mdi-arrow-left-thin"></i> &nbsp; Kembali
                            </a>
                        @endcan

                        <h6 class="card-title mb-0">Tambah Soal <span
                                class="badge bg-danger">kode-{{ $kode_soal }}</span></h6>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('main-menu.detail-soal.store', $kode_soal) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12 mt-4">
                                    <div class="mb-3">
                                        <label for="question" class="form-label text-primary">Soal<span
                                                class="text-danger">*</span></label>
                                        <textarea name="question" id="question" class="form-control" rows="5" placeholder="Soal"></textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('question') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mt-4">
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label text-primary">Gambar <span
                                                class="text-danger">jika tidak ada gambar, kosongkan..!</span></label>


                                        <input class="form-control @error('image') is-invalid @enderror" name="image"
                                            type="file" id="image" accept=".png,.jpg,.jpeg">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('image') }}
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-6 text-center">
                                    <label for="gambar" class="form-label">Preview</label><br>
                                    <img src="{{ asset('') }}assets/images/noimage.png" class="img-fluid "
                                        width="200" alt="" id="showImage">
                                </div>

                                <hr>

                                <div class="col-xxl-12">
                                    <div class="card" style="background-color: #d7cde8">
                                        <div class="card-body">

                                            <div class="col-lg-12 mt-4">
                                                <div class="mb-3">
                                                    <label for="choice_1" class="form-label text-primary">Pilihan
                                                        A<span class="text-danger">*</span></label>
                                                    <textarea name="choice_1" id="choice_1" class="form-control" rows="2" placeholder="Pilihan A"></textarea>
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('choice_1') }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 mt-4">
                                                    <div class="mb-3">
                                                        <label for="image_choice_1"
                                                            class="form-label text-primary">Gambar Pilihan A
                                                            <span class="text-danger">jika tidak ada gambar,
                                                                kosongkan..!</span></label>

                                                        <input
                                                            class="form-control @error('image_choice_1') is-invalid @enderror"
                                                            name="image_choice_1" type="file" id="image_choice_1"
                                                            accept=".png,.jpg,.jpeg">
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('image_choice_1') }}
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-lg-6 text-center">
                                                    <label for="show_image_choice_1"
                                                        class="form-label">Preview</label><br>
                                                    <img src="{{ asset('') }}assets/images/noimage.png"
                                                        class="img-fluid " width="200" alt=""
                                                        id="show_image_choice_1">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="col-xxl-12">
                                    <div class="card" style="background-color: #f1c4be">
                                        <div class="card-body">

                                            <div class="col-lg-12 mt-4">
                                                <div class="mb-3">
                                                    <label for="choice_2" class="form-label text-primary">Pilihan
                                                        B<span class="text-danger">*</span></label>
                                                    <textarea name="choice_2" id="choice_2" class="form-control" rows="2" placeholder="Pilihan B"></textarea>
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('choice_2') }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 mt-4">
                                                    <div class="mb-3">
                                                        <label for="image_choice_2"
                                                            class="form-label text-primary">Gambar Pilihan B
                                                            <span class="text-danger">jika tidak ada gambar,
                                                                kosongkan..!</span></label>

                                                        <input
                                                            class="form-control @error('image_choice_2') is-invalid @enderror"
                                                            name="image_choice_2" type="file" id="image_choice_2"
                                                            accept=".png,.jpg,.jpeg">
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('image_choice_2') }}
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-lg-6 text-center">
                                                    <label for="show_image_choice_2"
                                                        class="form-label">Preview</label><br>
                                                    <img src="{{ asset('') }}assets/images/noimage.png"
                                                        class="img-fluid " width="200" alt=""
                                                        id="show_image_choice_2">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="col-xxl-12">
                                    <div class="card " style="background-color: #edd9b1">
                                        <div class="card-body">

                                            <div class="col-lg-12 mt-4">
                                                <div class="mb-3">
                                                    <label for="choice_3" class="form-label text-primary">Pilihan
                                                        C<span class="text-danger">*</span></label>
                                                    <textarea name="choice_3" id="choice_3" class="form-control" rows="2" placeholder="Pilihan C"></textarea>
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('choice_3') }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 mt-4">
                                                    <div class="mb-3">
                                                        <label for="image_choice_3"
                                                            class="form-label text-primary">Gambar Pilihan C
                                                            <span class="text-danger">jika tidak ada gambar,
                                                                kosongkan..!</span></label>

                                                        <input
                                                            class="form-control @error('image_choice_3') is-invalid @enderror"
                                                            name="image_choice_3" type="file" id="image_choice_3"
                                                            accept=".png,.jpg,.jpeg">
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('image_choice_3') }}
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-lg-6 text-center">
                                                    <label for="show_image_choice_3"
                                                        class="form-label">Preview</label><br>
                                                    <img src="{{ asset('') }}assets/images/noimage.png"
                                                        class="img-fluid " width="200" alt=""
                                                        id="show_image_choice_3">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="col-xxl-12">
                                    <div class="card" style="background-color: #bdd0f1">
                                        <div class="card-body">

                                            <div class="col-lg-12 mt-4">
                                                <div class="mb-3">
                                                    <label for="choice_4" class="form-label text-primary">Pilihan
                                                        D<span class="text-danger">*</span></label>
                                                    <textarea name="choice_4" id="choice_4" class="form-control" rows="2" placeholder="Pilihan D"></textarea>
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('choice_4') }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 mt-4">
                                                    <div class="mb-3">
                                                        <label for="image_choice_4"
                                                            class="form-label text-primary">Gambar Pilihan D
                                                            <span class="text-danger">jika tidak ada gambar,
                                                                kosongkan..!</span></label>

                                                        <input
                                                            class="form-control @error('image_choice_4') is-invalid @enderror"
                                                            name="image_choice_4" type="file" id="image_choice_4"
                                                            accept=".png,.jpg,.jpeg">
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('image_choice_4') }}
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-lg-6 text-center">
                                                    <label for="show_image_choice_4"
                                                        class="form-label">Preview</label><br>
                                                    <img src="{{ asset('') }}assets/images/noimage.png"
                                                        class="img-fluid " width="200" alt=""
                                                        id="show_image_choice_4">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <hr>

                                <div class="col-xxl-12">
                                    <div class="card" style="background-color: #e1e6eb">
                                        <div class="card-body">

                                            <div class="col-lg-12 mt-4">
                                                <div class="mb-3">
                                                    <label for="choice_5" class="form-label text-primary">Pilihan
                                                        E<span class="text-danger">*</span></label>
                                                    <textarea name="choice_5" id="choice_5" class="form-control" rows="2" placeholder="Pilihan E"></textarea>
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('choice_5') }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 mt-4">
                                                    <div class="mb-3">
                                                        <label for="image_choice_5"
                                                            class="form-label text-primary">Gambar Pilihan E
                                                            <span class="text-danger">jika tidak ada gambar,
                                                                kosongkan..!</span></label>

                                                        <input
                                                            class="form-control @error('image_choice_5') is-invalid @enderror"
                                                            name="image_choice_5" type="file" id="image_choice_5"
                                                            accept=".png,.jpg,.jpeg">
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('image_choice_5') }}
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-lg-6 text-center">
                                                    <label for="show_image_choice_5"
                                                        class="form-label">Preview</label><br>
                                                    <img src="{{ asset('') }}assets/images/noimage.png"
                                                        class="img-fluid " width="200" alt=""
                                                        id="show_image_choice_5">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="col-xxl-12">
                                    <div class="card" style="background-color: #c0efd9">
                                        <div class="card-body">

                                            <div class="col-lg-12 mt-4">
                                                <div class="mb-3">
                                                    <label for="key" class="form-label text-primary">Jawaban
                                                        Benar
                                                        <span class="text-danger">*</span></label>
                                                    <textarea name="key" id="key" class="form-control" rows="2" placeholder="Jawaban Benar"></textarea>
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('key') }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 mt-4">
                                                    <div class="mb-3">
                                                        <label for="image_key" class="form-label text-primary">Gambar
                                                            Jawaban Benar
                                                            <span class="text-danger">jika tidak ada gambar,
                                                                kosongkan..!</span></label>

                                                        <input
                                                            class="form-control @error('image_key') is-invalid @enderror"
                                                            name="image_key" type="file" id="image_key"
                                                            accept=".png,.jpg,.jpeg">
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('image_key') }}
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-lg-6 text-center">
                                                    <label for="show_image_key" class="form-label">Preview</label><br>
                                                    <img src="{{ asset('') }}assets/images/noimage.png"
                                                        class="img-fluid " width="200" alt=""
                                                        id="show_image_key">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <br>

                                <button type="submit" class="btn btn-primary btn-animation waves-effect waves-light"
                                    data-text="Simpan">
                                    <span><i class="mdi mdi-content-save"></i> &nbsp;SIMPAN</span>
                                    <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"
                                        aria-hidden="true"></span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>

    @push('js')
        <script src="https://cdn.tiny.cloud/1/re1hyyagcsptel9z6bg836dptpkbrbpua7kjc4rgae0ap8kj/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>

        <script>
            $(document).ready(function() {


                tinymce.init({
                    selector: 'textarea#question',
                    height: 350,
                });

                tinymce.init({
                    selector: 'textarea#choice_1',
                    height: 200,
                });

                tinymce.init({
                    selector: 'textarea#choice_2',
                    height: 200,
                });

                tinymce.init({
                    selector: 'textarea#choice_3',
                    height: 200,
                });

                tinymce.init({
                    selector: 'textarea#choice_4',
                    height: 200,
                });

                tinymce.init({
                    selector: 'textarea#choice_5',
                    height: 200,
                });

                tinymce.init({
                    selector: 'textarea#key',
                    height: 200,
                });

                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0'])
                });

                $('#image_choice_1').change(function(e) {
                    var reader1 = new FileReader();
                    reader1.onload = function(e) {
                        $('#show_image_choice_1').attr('src', e.target.result);
                    }
                    reader1.readAsDataURL(e.target.files['0'])
                });

                $('#image_choice_2').change(function(e) {
                    var reader2 = new FileReader();
                    reader2.onload = function(e) {
                        $('#show_image_choice_2').attr('src', e.target.result);
                    }
                    reader2.readAsDataURL(e.target.files['0'])
                });

                $('#image_choice_3').change(function(e) {
                    var reader3 = new FileReader();
                    reader3.onload = function(e) {
                        $('#show_image_choice_3').attr('src', e.target.result);
                    }
                    reader3.readAsDataURL(e.target.files['0'])
                });

                $('#image_choice_4').change(function(e) {
                    var reader4 = new FileReader();
                    reader4.onload = function(e) {
                        $('#show_image_choice_4').attr('src', e.target.result);
                    }
                    reader4.readAsDataURL(e.target.files['0'])
                });

                $('#image_choice_5').change(function(e) {
                    var reader5 = new FileReader();
                    reader5.onload = function(e) {
                        $('#show_image_choice_5').attr('src', e.target.result);
                    }
                    reader5.readAsDataURL(e.target.files['0'])
                });

                $('#image_key').change(function(e) {
                    var reader6 = new FileReader();
                    reader6.onload = function(e) {
                        $('#show_image_key').attr('src', e.target.result);
                    }
                    reader6.readAsDataURL(e.target.files['0'])
                });
            })
        </script>
    @endpush
</x-master-layout>
