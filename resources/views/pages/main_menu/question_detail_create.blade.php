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
                                        <label for="gambar" class="form-label text-primary">Gambar</label>


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
                                <div class="col-lg-12 mt-4">
                                    <div class="mb-3">
                                        <label for="choice_1" class="form-label text-primary">Pilihan A<span
                                                class="text-danger">*</span></label>
                                        <textarea name="choice_1" id="choice_1" class="form-control" rows="2" placeholder="Pilihan A"></textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('choice_1') }}
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="col-lg-12 mt-4">
                                    <div class="mb-3">
                                        <label for="choice_2" class="form-label text-primary">Pilihan B<span
                                                class="text-danger">*</span></label>
                                        <textarea name="choice_2" id="choice_2" class="form-control" rows="2" placeholder="Pilihan B"></textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('choice_2') }}
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="col-lg-12 mt-4">
                                    <div class="mb-3">
                                        <label for="choice_3" class="form-label text-primary">Pilihan C<span
                                                class="text-danger">*</span></label>
                                        <textarea name="choice_3" id="choice_3" class="form-control" rows="2" placeholder="Pilihan C"></textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('choice_3') }}
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="col-lg-12 mt-4">
                                    <div class="mb-3">
                                        <label for="choice_4" class="form-label text-primary">Pilihan D<span
                                                class="text-danger">*</span></label>
                                        <textarea name="choice_4" id="choice_4" class="form-control" rows="2" placeholder="Pilihan D"></textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('choice_4') }}
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="col-lg-12 mt-4">
                                    <div class="mb-3">
                                        <label for="choice_5" class="form-label text-primary">Pilihan E<span
                                                class="text-danger">*</span></label>
                                        <textarea name="choice_5" id="choice_5" class="form-control" rows="2" placeholder="Pilihan E"></textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('choice_5') }}
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="col-lg-12 mt-4">
                                    <div class="mb-3">
                                        <label for="key" class="form-label text-primary">Jawaban Benar<span
                                                class="text-danger">*</span></label>
                                        <textarea name="key" id="key" class="form-control" rows="2" placeholder="Jawaban Benar"></textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('key') }}
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
            })
        </script>
    @endpush
</x-master-layout>
