@extends('layouts.app')

@section('content')
<div class="container">
    <!-- si estas logueado -->
                @if (Auth::check())
                    @if($user->venedor == false)
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                        <img src="uploads/{{ Session::get('file') }}">
                        @endif
                                <table class="table">
                                    <thead><tr>
                                        <th colspan="2">Ilitacions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <td>Codi de la subasta</td>
                                <td>Nom Cotxe</td>
                                <td>Preu</td>
                                <td>Data Licitacio</td>
                                <td>Data Final</td>
                                </tr>
                                @foreach($user->ilitacio as $ilitacio)
                                    <tr>
                                        <td>
                                            {{$ilitacio->subasta->id}}
                                        </td>
                                        <td>
                                            {{$ilitacio->subasta->cotxe->nom}}
                                        </td>
                                        <td>
                                            {{$ilitacio->preu}}
                                        </td>
                                        <td>
                                            {{$ilitacio->data_ilitacio}}
                                        </td>
                                        <td>
                                            {{$ilitacio->subasta->data_final}}
                                        </td>
                                        
                                    </tr>


                                @endforeach</tbody>
                                </table>
                    @endif
                @endif

</div>
@endsection
