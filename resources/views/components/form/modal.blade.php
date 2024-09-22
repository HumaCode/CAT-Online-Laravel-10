@props(['size' => 'lg', 'title', 'action' => null])

<div class="modal-dialog modal-{{ $size }} ">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">{{ $title }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>

        <form id="form-action" action="{{ $action }}" method="post">
            @csrf


            <div class="modal-body">

                {{ $slot }}

            </div>

            @if ($action)
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-animation waves-effect waves-light"
                        data-bs-dismiss="modal"> <i class="mdi mdi-block-helper"></i> &nbsp; Batal</button>
                    <button type="submit" class="btn btn-primary btn-animation waves-effect waves-light"><i
                            class="mdi mdi-content-save"></i> &nbsp;
                        Simpan</button>
                </div>
            @endif

        </form>


    </div><!-- /.modal-content -->
</div>
