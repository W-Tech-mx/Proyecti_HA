@extends('layouts.layout')
@section('content')

<div class="row">
	<section class="content">
		<div class="col-12 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="d-flex justify-content-between mt-3 mb-3">

						<h3 class="panel-title">Editar Alumno</h3>
						<a href="{{ route('student.index') }}" class="btn btn-info" >Atrás</a>

					</div>

				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('student.update',$student->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">

							<div class="row">

								<div class="col-12">
									<div class="form-group">
									<label for="name" class="col-12 control-label "><span class="text-danger">*</span> Nombre </label>

									<div class="col-12">
										<input type="text"   class="form-control " id="name" name="name" placeholder="Ingrese Nombre"  value="{{$student->name}}" >
										<span class="text-danger p-1">{{ $errors->first('name') }}</span>
									</div>
								</div>


								<div class="form-group">
									<label class="col-12 control-label"><span class="text-danger">*</span> Apellido paterno</label>
									<div class="col-12">
										<input type="text" class="form-control "id="firstname" name="firstname" placeholder="Ingrese  Apellido paterno"  value="{{$student->firstname}}" >
										<span class="text-danger p-1">{{ $errors->first('firstname') }}</span>

									</div>
								</div>
							</div>


							<div class="col-12">
								<div class="form-group">
									<label class="col-12 control-label"><span class="text-danger">*</span> Apellido materno</label>
									<div class="col-12">
										<input type="text" class="form-control "id="secondname" name="secondname" placeholder="IngreseApellido materno" value="{{$student->secondname}}" >
										<span class="text-danger p-1">{{ $errors->first('secondname') }}</span>

									</div>
								</div>

								<div class="form-group">
									<label for="name" class="col-12 control-label"><span class="text-danger">*</span>CURP</label>
									<div class="col-12">
										<input type="text" class="form-control "id="curp" name="curp" placeholder="Ingrese CURP" value="{{$student->curp}}" >
										<span class="text-danger p-1">{{ $errors->first('curp') }}</span>

									</div>
								</div>
							</div>

								<div class="col-6">
									<div class="form-group">
										<label class="col-12 control-label"><span class="text-danger">*</span>Boleta</label>
										<div class="col-12">
											<input type="text" class="form-control "id="boleta" name="boleta"  placeholder="Ingrese Boleta" value="{{$student->boleta}}" >
											<span class="text-danger p-1">{{ $errors->first('boleta') }}</span>

										</div>
									</div>
								</div>

								<div class="col-6">
									<div class="form-group">
										<label class="col-12 control-label"><span class="text-danger">*</span>Estatus</label>
										<div class="col-12">

												   <select class="form-control" id="status" name="status" value="">
													   <option value="{{$student->status}}">{{$student->status}}</option>
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

						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection