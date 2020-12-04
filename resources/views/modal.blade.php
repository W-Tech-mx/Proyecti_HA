{{-- create/update book modal--}}
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>

            <div class="modal-body">
                <form id="bookForm" name="bookForm" class="form-horizontal">

                        <div class="col-md-12">
                           <div class="alert alert-success d-none" id="msg_div">
                                   <span id="res_message"></span>
                              </div>
                        </div>


                    <input type="hidden" name="book_id" id="book_id">

                    <div class="form-group">
                        <label for="name" class="col-12 control-label "><span class="text-danger">*</span> Nombre </label>

                        <div class="col-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"  value="" >
                            <span class="text-danger p-1">{{ $errors->first('name') }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label"><span class="text-danger">*</span> Apellido paterno</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                   placeholder="Enter firstname name"
                                   value="" maxlength="50" required="" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label"> Apellido materno</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="secondname" name="secondname"  placeholder="Enter secondname name"  value="" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label"><span class="text-danger">*</span>CURP</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="curp" name="curp" placeholder="Enter curp"  value="" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label"><span class="text-danger">*</span>Boleta</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="boleta" name="boleta" placeholder="Enter boleta name" value="" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label"><span class="text-danger">*</span>Estatus</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="status" name="status" placeholder="Enter status "  value="" >
                        </div>
                    </div>

                    <div class="col-sm-offset-12 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Guardar</button>
                    </div>

                </form>
            </div>

        </div>

    </div>
</div>
