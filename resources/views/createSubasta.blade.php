@extends('layouts.app')

@section('content')
@if (Auth::check())
@if($user->venedor == true)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Subasta') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('crearSubasta') }}">
                    @csrf 
                        <div class="form-group row">
                            <label for="licitacio_minima" class="col-md-4 col-form-label text-md-right">{{ __('Licitacio Minima') }}</label>

                            <div class="col-md-6">
                                <input id="licitacio_minima" type="number" class="form-control @error('licitacio_minima') is-invalid @enderror" name="licitacio_minima" value="{{ old('licitacio_minima') }}" required autocomplete="licitacio_minima" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cotxe" class="col-md-4 col-form-label text-md-right">{{ __('Cotxe') }}</label>
                            <select name = "cotxe">
                            @foreach($user->objetos as $cotxes)
                                @if($cotxes->subasta == false)
                                    <option value={{$cotxes->id}}>{{$cotxes->nom}} </option>
                                @endif
                            @endforeach
                            </select>
                        </div>

                        @if(count($user->objetos)>0)
                            @if($user->saldo>=100)
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crear Subasta') }}
                                    </button>
                                </div>
                            </div>
                            @else
                            <h2>Necesites un mínim de 100 de saldo per fer una subasta</h2>
                            @endif
                        @else
                        <h2>Necesites cotxes per fer una subasta</h2>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endif
@endsection
