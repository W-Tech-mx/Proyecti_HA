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
                              <a href="{{ route('student.create') }}" class="btn btn-info text-right" >Añadir Alumno</a>
                            </div>
                          </div>
                        </div>
                    </div>





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
                          <td>#</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->firstname}}</td>
                        <td>{{$student->secondname}}</td>
                        <td>{{$student->curp}}</td>
                        <td>{{$student->boleta}}</td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="{{action('StudentController@edit', $student->id)}}" >
                                <span class="glyphicon glyphicon-pencil">Edit</span>
                            </a>
                        </td>

                        <td>
                          <form action="{{action('StudentController@destroy', $student->id)}}" method="post">

                           {{csrf_field()}}

                           <input name="_method" type="hidden" value="DELETE">
                           <button class="btn btn-danger btn-xs" type="submit">
                               <span class="glyphicon glyphicon-trash">Elimar</span>
                           </button>

                          </form>
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