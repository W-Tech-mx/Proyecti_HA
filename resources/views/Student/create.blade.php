<!-- Modal -->
                    <div class="modal fade" id="addphoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">


                                        <form method="POST" action="{{ route('student.store') }}"  role="form">
                                            {{csrf_field()}}

                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">

                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Crear Nuevo alumno</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>

                                                    <div class="modal-body">
                                                        <div class="row">

															<div class="col-12">
																<div class="form-group">
																<label for="name" class="col-12 control-label "><span class="text-danger">*</span> Nombre </label>

																<div class="col-12">
																	<input type="text"   class="form-control " id="name" name="name" placeholder="Ingrese Nombre"  value="{{old('name')}}" >
																	<span class="text-danger p-1">{{ $errors->first('name') }}</span>
																</div>
															</div>


															<div class="form-group">
																<label class="col-12 control-label"><span class="text-danger">*</span> Apellido paterno</label>
																<div class="col-12">
																	<input type="text" class="form-control "id="firstname" name="firstname" placeholder="Ingrese  Apellido paterno" value="{{old('firstname')}}" >
																	<span class="text-danger p-1">{{ $errors->first('firstname') }}</span>

																</div>
															</div>
														</div>

															<div class="col-12">
															<div class="form-group">
																<label class="col-12 control-label"><span class="text-danger">*</span> Apellido materno</label>
																<div class="col-12">
																	<input type="text" class="form-control "id="secondname" name="secondname" placeholder="IngreseApellido materno" value="{{old('secondname')}}" >
																	<span class="text-danger p-1">{{ $errors->first('secondname') }}</span>

																</div>
															</div>

															<div class="form-group">
																<label for="name" class="col-12 control-label"><span class="text-danger">*</span>CURP</label>
																<div class="col-12">
																	<input type="text" class="form-control "id="curp" name="curp" placeholder="Ingrese CURP" value="{{old('curp')}}" >
																	<span class="text-danger p-1">{{ $errors->first('curp') }}</span>

																</div>
															</div>
														</div>

															<div class="col-6">
																<div class="form-group">
																	<label class="col-12 control-label"><span class="text-danger">*</span>Boleta</label>
																	<div class="col-12">
																		<input type="text" class="form-control "id="boleta" name="boleta"  placeholder="Ingrese Boleta" value="{{old('boleta')}}" >
																		<span class="text-danger p-1">{{ $errors->first('boleta') }}</span>

																	</div>
																</div>
															</div>

															<div class="col-6">
																<div class="form-group">
																	<label class="col-12 control-label"><span class="text-danger">*</span>Estatus</label>
																	<div class="col-12">

																			   <select class="form-control "id="status" name="status" value="">
																				<option value="activo">Activar</option>
																				<option value="desactivado">Desactivar</option>
																				<option value="baja">Baja</option>

																			  </select>

																	</div>
																</div>
															</div>

															<div class="col-xs-12 col-sm-12 col-md-12">
																<input type="submit"  value="Guardar" class="btn btn-success ">
															</div>

														</div>
                                                    </div>

                                                </div>
                                              </div>
                                        </form>
                    </div>