$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $("meta[name=csrf_token]").attr("content"),
    },
});

showLoading();

$(document).ready(function () {
    showLoading(false);
});

function select2Init() {
    $('.select2').select2({
        dropdownParent: $('.select2').parents('.modal-content'),
        // theme: 'bootstrap-5',
        allowClear: true,
    });
}

function handleAction(datatableId, onShowAction, onSuccessAction) {
    $(".main-content").on("click", ".action", function (e) {
        e.preventDefault();

        handleAjax(this.href)
            .onSuccess(function (res) {
                onShowAction && onShowAction(res);
                handleFormSubmit("#form-action")
                    .setDataTable(datatableId)
                    .onSuccess(function (res) {
                        onSuccessAction && onSuccessAction();
                    })
                    .init();
            })
            .execute();
    });
}

function handleDelete(datatableId, onSuccessAction) {
    $('#' + datatableId).on('click', '.delete', function (e) {
        e.preventDefault()


        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false,
            didOpen: () => {
                // Tambahkan margin kanan ke tombol "success" setelah SweetAlert dibuka
                document.querySelector('.swal2-confirm').style.marginLeft = '10px';
            }
        });
        swalWithBootstrapButtons.fire({
            title: "Kamu yakin..?",
            text: "Akan menghapus data ini.!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak, Batalkan!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                handleAjax(this.href, 'delete')
                    .onSuccess(function (res) {
                        swalWithBootstrapButtons.fire({
                            title: "Dihapus!",
                            text: res.message,
                            icon: res.status
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Reload DataTable setelah konfirmasi

                                onSuccessAction && onSuccessAction(res)
                                table.ajax.reload(null, false);
                            }
                        });
                    }, false)
                    .execute()
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                    title: "Dibatalkan",
                    text: "Data tidak dihapus :)",
                    icon: "error"
                });
            }
        });

    })
}

function showToast(status = "success", message) {
    iziToast[status]({
        title: status == "success" ? "Berhasil" : "Gagal",
        message: message,
        position: "topRight",
    });
}

function showLoading(show = true) {
    const preloader = $(".preloader");
    if (show) {
        preloader.css({
            opacity: 1,
            visibility: "visible",
        });
    } else {
        preloader.css({
            opacity: 0,
            visibility: "hidden",
        });
    }
}

function submitLoader(formId = "#form-action") {
    const button = $(formId).find('button[type="submit"]');

    function show() {
        button
            .addClass("btn-load")
            .attr("disabled", true)
            .html(
                `<span class="d-flex align-items-center"> <span class="spinner-border flex-shrink-0"></span> <span class="flex-grow-1 ms-2">Loading....</span> </span>`
            );
    }

    function hide(text = "Save") {
        button.removeClass("btb_load").removeAttr("disabled").text(text);
    }
    return {
        show,
        hide,
    };
}

function handleFormSubmit(selector) {
    function init() {
        const _this = this;

        $(selector).on("submit", function (e) {
            e.preventDefault();

            const _form = this;
            $.ajax({
                url: this.action,
                method: this.method,
                data: new FormData(_form),
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $(_form).find(".is_invalid").removeClass("is-invalid");
                    $(_form).find(".invalid-feedback").remove();
                    submitLoader().show();
                },
                success: (res) => {
                    if (_this.runDefaultSuccessCallback) {
                        const modal = $("#modal-action");
                        modal.modal("hide");
                        showToast(res.status, res.message);
                    }

                    _this.onSuccessCallback && _this.onSuccessCallback(res);
                    _this.dataTableId &&
                        table.ajax.reload(null, false);
                },
                complete: function () {
                    submitLoader().hide();
                },
                error: function (err) {
                    const errors = err.responseJSON?.errors;
                    if (errors) {
                        for (let [key, message] of Object.entries(errors)) {
                            // console.log(key, message);
                            $(`[name=${key}]`)
                                .addClass("is-invalid")
                                .parent()
                                .append(
                                    `<div class="invalid-feedback">${message}</div>`
                                );
                        }
                    }

                    showToast("error", err.responseJSON?.message);
                },
            });
        });
    }

    function onSuccess(cb, runDefault = true) {
        this.onSuccessCallback = cb;
        this.runDefaultSuccessCallback = runDefault;
        return this;
    }

    function setDataTable(id) {
        this.dataTableId = id;
        return this;
    }

    return {
        init,
        onSuccess,
        runDefaultSuccessCallback: true,
        setDataTable,
    };
}

function handleAjax(url, method = "get") {
    function execute() {
        $.ajax({
            url,
            method,
            beforeSend: function () {
                showLoading();
            },
            complete: function () {
                showLoading(false);
            },
            success: (res) => {
                if (this.runDefaultSuccessCallback) {
                    const modal = $("#modal-action");
                    modal.html(res);
                    modal.modal("show");
                }

                this.onSuccessCallback && this.onSuccessCallback(res);
            },
            error: function (err) {
                console.log(err);
            },
        });
    }

    function onSuccess(cb, runDefault = true) {
        this.onSuccessCallback = cb;
        this.runDefaultSuccessCallback = runDefault;
        return this;
    }

    return {
        execute,
        onSuccess,
        runDefaultSuccessCallback: true,
    };
}