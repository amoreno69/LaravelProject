@extends('layouts.app')
@section('subastas')
<div class="container">
    <!-- si estas logueado -->
                @if (Auth::check())
                    @if($user->venedor == true)
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                        <img src="uploads/{{ Session::get('file') }}">
                        @endif
                                <table class="table">
                                    <thead><tr>
                                        <th colspan="2">Meves Subastes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <td>Nom Cotxe</td>
                                <td>Preu Actual</td>
                                <td>Data Final</td>
                                </tr>
                                @foreach($user->subasta as $subasta)
                                @if($subasta->activa == true)
                                    <tr>
                                        <td>
                                            {{$subasta->cotxe->nom}}
                                        </td>
                                        <td>
                                            {{$subasta->ilitació_minima}}
                                        </td>
                                        <td>
                                            {{$subasta->data_final}}
                                        </td>
                                        <td>
                                            <a class="dropdown-item" href="{{ url('bid/lowerPrice/'.$subasta->id) }}" class="btn btn-info">
                                                Baixar 5% Preu
                                            </a>
                                        </td>
                                    </tr>
                                @endif

                                @endforeach</tbody>
                                </table>
                    @endif
                @endif

</div>
@endsection
