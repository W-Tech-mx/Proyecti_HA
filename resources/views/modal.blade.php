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
