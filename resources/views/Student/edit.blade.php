@extends('layouts.layout')
@section('content')

<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
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
					<h3 class="panel-title">Editar Alumno</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('student.update',$student->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">

							<div class="row">

								<div class="form-group">
									<label for="name" class="col-12 control-label "><span class="text-danger">*</span> Nombre </label>

									<div class="col-12">
										<input type="text" class="form-control" id="name" name="name" placeholder="Enter name"  value="{{$student->name}}">
										<span class="text-danger p-1">{{ $errors->first('name') }}</span>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-12 control-label"><span class="text-danger">*</span> Apellido paterno</label>
									<div class="col-sm-12">
										<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter firstname name" value="{{$student->firstname}}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-12 control-label"><span class="text-danger">*</span> Apellido materno</label>
									<div class="col-sm-12">
										<input type="text" class="form-control" id="secondname" name="secondname" placeholder="Enter secondname name" value="{{$student->secondname}}">
									</div>
								</div>

								<div class="form-group">
									<label for="name" class="col-sm-12 control-label"><span class="text-danger">*</span>CURP</label>
									<div class="col-sm-12">
										<input type="text" class="form-control" id="curp" name="curp" placeholder="Enter curp" value="{{$student->curp}}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-12 control-label"><span class="text-danger">*</span>Boleta</label>
									<div class="col-sm-12">
										<input type="text" class="form-control" id="boleta" name="boleta" placeholder="Enter boleta name" value="{{$student->boleta}}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-12 control-label"><span class="text-danger">*</span>Estatus</label>
									<div class="col-sm-12">

											   <select class="form-control" id="status" name="status" value="">
												<option value="activo">Activar</option>
												<option value="desactivado">Desactivar</option>
												<option value="baja">Baja</option>

											  </select>

									</div>
								</div>

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('student.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>

							</div>

						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection