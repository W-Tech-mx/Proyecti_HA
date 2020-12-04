@extends('dashboard')

@section('content')

<div class="container">

    <div class="container-fluid">
        <div class="row">
            <h4 class="one">Registro</h4>
            <button class="btn btn-info ml-auto" id="createNewBook">Registrar Alumno</button>
        </div>
    </div>


    <div class="alert alert-success alert-dismissible" role="alert" id="msj-succes" style="display: none">
        <strong id="msj">Exito</strong>
    </div>

    <div class="alert alert-danger alert-dismissible" role="alert" id="msj-error" style="display: none">
        <strong id="msj">FALLO</strong>
    </div>

    @if(Session::has('succes'))
        <div class="alert alert-success alert-dismissible fade show mb-4 mt-4" role="alert">
            {{Session::get('succes')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table id="dataTable" class="table table-striped table-bordered">
        <thead>
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
            $('#saveBtn').html("Create");
            $('#book_id').val('');
            $('#bookForm').trigger("reset");
            $('#modelHeading').html("Create New Book");
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
                    $("#msj-succes").fadeIn;
                    console.log('se guardo');
                    window.no
                },
                error: function (data) {
                    console.log('Error:', data);
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
                $('#modelHeading').html("Edit Book");
                $('#saveBtn').html('Update');
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
            confirm("Are You sure want to delete !");

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
