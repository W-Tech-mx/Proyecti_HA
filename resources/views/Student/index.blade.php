@extends('layouts.layout')
@section('content')


        <div class="row">

          <section class="content">

            <div class="col-12 col-md-offset-2">
              <div class="panel panel-default">

                <div class="panel-body">

                    <div class="row">
                        <div class="col-6">
                             <div class="pull-left"><h3 class="text-left">Lista Alumnos</h3></div>
                        </div>
                        <div class="col-6">
                          <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{route('student.create')}}" type="button" class="btn btn-success" data-toggle="modal" data-target="#addphoto">
                                    Agregar Alumno
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                    </svg>
                                </a>

                            </div>
                          </div>
                        </div>
                    </div>

                    @include('Student.create')

                    <div class="table-container">

                    <table id="mytable" class="table table-bordred table-striped">
                     <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Curp</th>
                    <th>Boleta</th>
                    <th>Estado</th>
                    <th width="280px">Action</th>
                     </thead>
                     <tbody>
                      @if($students->count())
                          @foreach($students as $student)
                          <tr>
                              <td>{{$student->id}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->firstname}}</td>
                            <td>{{$student->secondname}}</td>
                            <td>{{$student->curp}}</td>
                            <td>{{$student->boleta}}</td>
                               <td>{{$student->status}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{action('StudentController@edit', $student->id)}}" >
                                    <span class="glyphicon glyphicon-pencil">
                                        Edit
                                    </span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                            </td>

                            <td>

                                <a type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-{{$student->id}}">
                                    <span class="glyphicon glyphicon-pencil">
                                        Eliminar
                                    </span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                    </svg>
                                </a>

                                @include('Student.modal')

                             </td>

                           </tr>

                           @endforeach
                       @else
                       <tr>
                        <td colspan="8">No hay registro !!</td>
                      </tr>
                      @endif
                    </tbody>

                  </table>

                </div>
              </div>
              {{ $students->links() }}
            </div>
          </div>

        </section>

        </div>

@endsection