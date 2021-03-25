@extends('layouts.app')

@section('content')
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
                            <th colspan="2">Cotxes</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td>Imatge</td>
                    <td>Nom</td>
                    <td>Matricula</td>
                    <td>Tipus de Cotxe</td>
                    <td>Motor</td>
                    <td>Marca</td>
                    </tr>
                    @if($user->venedor == false)
                    @foreach($user->objetos as $cotxe)
                        @if($cotxe->subasta == false)
                        <tr>
                            <td>
                                <img src="{{$cotxe->path}}" height="100px" width="100px" />
                            </td>
                            <td>
                                {{$cotxe->nom}}
                            </td>
                            <td>
                                {{$cotxe->matricula}}
                            </td>
                            <td>
                                {{$cotxe->tipus_de_cotxe}}
                            </td>
                            <td>
                                {{$cotxe->motor}}
                            </td>
                            <td>
                                {{$cotxe->marca}}
                            </td>

                        </tr>
                        @endif
                    @endforeach</tbody>
                    @endif
                    @if($user->venedor == true)
                    @foreach($cotxes as $cotxe)
                        <tr>
                            <td>
                                <img src="{{$cotxe->path}}" height="100px" width="100px" />
                            </td>
                            <td>
                                {{$cotxe->nom}}
                            </td>
                            <td>
                                {{$cotxe->matricula}}
                            </td>
                            <td>
                                {{$cotxe->tipus_de_cotxe}}
                            </td>
                            <td>
                                {{$cotxe->motor}}
                            </td>
                            <td>
                                {{$cotxe->marca}}
                            </td>

                        </tr>
                    @endforeach</tbody>
                    @endif
                    </table>
                    <div>
                        <a class="nav-link" href="{{ route('verCrearCotxe') }}">
                            {{ __('Crear Cotxe') }}
                        </a>
                    </div>
                @endif

</div>
@endsection
