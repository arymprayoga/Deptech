<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
            theme: "bootstrap4",
            placeholder: "Silahkan Pilih",
            width: 'resolve'
        });
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script>
    $(document).ready(function() {
        dt = $('#user-table').DataTable({
            "processing": true,
            "serverSide": true,
            "columns": [{
                    "data": "id",
                    "name": "id",
                    "title": "#"
                },
                {
                    "data": "nama_depan",
                    "name": "nama_depan",
                    "title": "NAMA DEPAN"
                },
                {
                    "data": "nama_belakang",
                    "name": "nama_belakang",
                    "title": "NAMA BELAKANG"
                },
                {
                    "data": "email",
                    "name": "email",
                    "title": "EMAIL"
                },
                {
                    "data": "tanggal_lahir",
                    "name": "tanggal_lahir",
                    "title": "TANGGAL LAHIR"
                },
                {
                    "data": "jenis_kelamin",
                    "name": "jenis_kelamin",
                    "title": "JENIS KELAMIN"
                },
                {
                    "data": "action",
                    "name": "action",
                    "orderable": false,
                    "searchable": false
                },
            ],
            "ajax": "{{ url('master/data-user-get') }}",
        });
    });
</script>

<script>
    $('#modalhapususer').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
    });
</script>
