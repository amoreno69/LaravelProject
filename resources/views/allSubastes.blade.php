@section('subastas')
<div class="container">
    <!-- si estas logueado -->
                @if (Auth::check())

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                        <img src="uploads/{{ Session::get('file') }}">
                        @endif
                                <table class="table">
                                    <thead><tr>
                                        <th colspan="2">Subastes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <td>Fotografia Del Cotxe</td>
                                <td>Nom Usuari</td>
                                <td>Nom Cotxe</td>
                                <td>Preu Actual</td>
                                <td>Data Final</td>
                                </tr>
                                @foreach($subastes as $subasta)
                                @if($subasta->activa == true)
                                    <tr>
                                        <td>
                                            <img src="{{$subasta->cotxe->path}}" height="100px" width="100px" />
                                        </td>
                                        <td>
                                            {{$subasta->user->name}}
                                        </td>
                                        <td>
                                            {{$subasta->cotxe->nom}}
                                        </td>
                                        <td>
                                            {{$subasta->ilitació_minima}}
                                        </td>
                                        <td>
                                            {{$subasta->data_final}}
                                        </td>
                                        @if($user->venedor == false)
                                        <td>
                                            <a class="dropdown-item" href="{{ url('bid/'.$subasta->id) }}" class="btn btn-info">
                                                CrearLicitació
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                @endif

                                @endforeach</tbody>
                                </table>
                @endif

</div>
@endsection
