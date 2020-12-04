<!-- Modal -->
<div class="modal fade" id="modal-{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form action="{{action('StudentController@destroy', $student->id)}}" method="post">

        {{csrf_field()}}
        <input name="_method" type="hidden" value="DELETE">

      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar Alumno </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <img src="https://www.creativefabrica.com/wp-content/uploads/2019/02/Alert-Icon-by-arus-1-580x386.jpg" style="width: 200px">
                            </div>

                            <h3 class="text-center p-2">Desea eliminar el Registro? </h3>

                            <ul class="text-center mt-2 mb-2" style="text-decoration: none">
                                <li ><strong>Boleta:</strong> {{ $student->boleta}} </li>
                                <li><strong>Nombre: </strong>{{ $student->name}} </li>
                                <li><strong>Curp:</strong> {{ $student->curp}} </li>
                            </ul>

                            <p class="text-center mt-2">Una vez, eliminado no se puede recuperar</p>

                            <div class="d-flex justify-content-center">
                                <input type="submit" class="btn  btn-lg btn-info mr-1 d-block" value="SI" style="color: #fff">
                                <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                  </div>
        </div>

      </div>
    </form>

</div>
