function initializeDataTable(datatableId, url, columns) {
    $(document).ready(function () {
        setTimeout(function () {
            // Tambahkan kolom DT_RowIndex di bagian depan
            columns.unshift({
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false,
                sortable: false,
                render: function (data) {
                    return '<div class="text-center hover-scale">' + data + '.</div>';
                }
            });

            table = $('#' + datatableId).DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                searchDelay: 1000,
                ajax: {
                    url: url,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataSrc: function (json) {
                        return json.data;
                    },
                    error: function (xhr, error, code) {
                        Swal.fire({
                            title: 'Error',
                            text: 'Tidak dapat menampilkan data',
                            icon: 'error'
                        });
                    }
                },
                language: {
                    url: "../assets/dtindo.json"
                },
                columns: columns,
                drawCallback: function (settings) {
                    var api = this.api();
                    var data = api.rows({
                        page: 'current'
                    }).data();

                    if (data.length === 0 && settings.json && settings.json.recordsTotal > 0) {
                        Swal.fire({
                            title: 'No Results',
                            text: 'Tidak ada data yang ditemukan untuk pencarian ini',
                            icon: 'info'
                        });
                    }

                    $('#' + datatableId + ' tbody tr').addClass('card-animate');
                }
            });
        }, 1500);
    });
}