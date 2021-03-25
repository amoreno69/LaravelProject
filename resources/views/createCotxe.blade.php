@extends('layouts.app')

@section('content')
@if (Auth::check())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Cotxe') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('crearCotxe') }}" enctype="multipart/form-data">
                    @csrf 
                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('matricula') }}" required autocomplete="nom" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marca" class="col-md-4 col-form-label text-md-right">{{ __('Marca') }}</label>

                            <div class="col-md-6">
                                <select name = "marca">
                                    <option value="Audi">Audi</option>
                                    <option value="Mercedes">Mercedes</option>
                                    <option value="BMW">BMW</option>
                                </select>
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="matricula" class="col-md-4 col-form-label text-md-right">{{ __('Matricula') }}</label>

                            <div class="col-md-6">
                                <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{ old('matricula') }}" required autocomplete="matricula" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="motor" class="col-md-4 col-form-label text-md-right">{{ __('Motor') }}</label>

                            <div class="col-md-6">
                                <select name = "motor">
                                    <option value="Elèctric">Elèctric</option>
                                    <option value="Benzina">Benzina</option>
                                    <option value="Gaseoil">Gaseoil</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipus_de_cotxe" class="col-md-4 col-form-label text-md-right">{{ __('Tipus de cotxe') }}</label>

                            <div class="col-md-6">
                                <select name = "tipus_de_cotxe">
                                    <option value="esportiu">esportiu</option>
                                    <option value="suv">suv</option>
                                    <option value="monovolum">monovolum</option>
                                    <option value="tot terreny">tot terreny</option>
                                    <option value="furgoneta">furgoneta</option>
                                    <option value="camioneta">camioneta</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input_img" class="col-md-4 col-form-label text-md-right">{{ __('Fotografia del cotxe') }}</label>

                            <div class="col-md-6">
                                <input id="input_img" name="input_img" type="file"/>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Crear Cotxe') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
