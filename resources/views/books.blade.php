<!DOCTYPE html>
<html>
<head>
    <title>Laravel 6.2 Ajax CRUD with DataTables Tutorial For Beginners - MyNotePaper.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <h4 class="one">Registro</h4>
            <button class="btn btn-info ml-auto" id="createNewBook">Registrar Alumno</button>
        </div>
    </div>
    <br>

    <div class="alert alert-success alert-dismissible" role="alert" id="msj-succes" style="display: none">
        <strong id="msj">eXITO</strong>
    </div>

    <div class="alert alert-danger alert-dismissible" role="alert" id="msj-error" style="display: none">
        <strong id="msj">FALLO</strong>
    </div>

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

{{-- create/update book modal--}}
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="bookForm" name="bookForm" class="form-horizontal">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <input type="hidden" name="book_id" id="book_id">

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                                   value="{{ old('content') }}" maxlength="50" required="" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">firstname</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                   placeholder="Enter firstname name"
                                   value="{{ old('content') }}" maxlength="50" required="" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">secondname</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="secondname" name="secondname"
                                   placeholder="Enter secondname name"
                                   value="" maxlength="50" required="" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">curp</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="curp" name="curp" placeholder="Enter curp"
                                   value="" maxlength="50" required="" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">boleta</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="boleta" name="boleta"
                                   placeholder="Enter boleta name"
                                   value="{{ old('content') }}" maxlength="50" required="" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">status</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="status" name="status"
                                   placeholder="Enter status "
                                   value="" maxlength="50" required="" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Guardar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</body>

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
</html>
