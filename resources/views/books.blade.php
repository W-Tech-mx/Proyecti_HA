@extends('dashboard')

@section('content')

<div class="container mt-5">

    <div class="container-fluid  mb-3">
        <div class="row">
            <h4 class="one">Registro</h4>
            <button class="btn btn-info ml-auto" id="createNewBook">Registrar Alumno</button>
        </div>
    </div>

    <table id="dataTable" class="table table-striped table-bordered">
        <thead>

        <div class="col-md-12">
            <div class="alert alert-success d-none" id="msg_div">
                <span id="res_message">Creado exitosamente</span>
            </div>
        </div>

        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Curp</th>
            <th>Boleta</th>
            <th>Estado</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

</div>

@include('modal')

<script type="text/javascript">
    $(function () {
        //ajax setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // datatable
        var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('books') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'firstname', name: 'firstname'},
                {data: 'secondname', name: 'secondname'},
                {data: 'curp', name: 'curp'},
                {data: 'boleta', name: 'boleta'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        // create new book
        $('#createNewBook').click(function () {
            $('#saveBtn').html("Crear");
            $('#book_id').val('');
            $('#bookForm').trigger("reset");
            $('#modelHeading').html("Crear registro");
            $('#ajaxModel').modal('show');
        });

        // create or update book
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Saving..');

            $.ajax({
                data: $('#bookForm').serialize(),
                url: "{{ url('books') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#bookForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                    $('#saveBtn').html('Save');
                    $('#msg_div').removeClass('d-none');
                    document.getElementById("post-form").reset();
                    setTimeout(function(){
                    $('#res_message').hide();
                    $('#msg_div').hide();
                    },10000);
                    console.log('se guardo');

                },
                error: function (data) {
                    console.log('No se guardo:', data);
                    $('#msj').html(msj.responseJSON.genre);
                    $('#msj-error').fadeIn;
                    $('#saveBtn').html('Save');
                }
            });
        });

        // edit book
        $('body').on('click', '.editBook', function () {
            var book_id = $(this).data('id');
            $.get("{{ url('books') }}" + '/' + book_id + '/edit', function (data) {
                $('#modelHeading').html("Editar Registro");
                $('#saveBtn').html('Editar registro');
                $('#ajaxModel').modal('show');
                $('#book_id').val(data.id);
                $('#name').val(data.name);
                $('#firstname').val(data.firstname);
                $('#secondname').val(data.secondname);
                $('#curp').val(data.curp);
                $('#boleta').val(data.boleta);
                $('#status').val(data.status);
            })
        });

        // delete book
        $('body').on('click', '.deleteBook', function () {
            var book_id = $(this).data("id");
            confirm("Estas seguro que deseas eliminar el alumno !");

            $.ajax({
                type: "DELETE",
                url: "{{ url('books') }}" + '/' + book_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

    });
</script>

@endsection
