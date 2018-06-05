@extends('layouts.app')

@section('content')
    @include('layouts.partials.sidebar')
    <div class="main-panel">
        @include('layouts.partials.navbar')
        <div class="content">
            <div class="container-fluid">
                @include('partials.session_message')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" data-background-color="green">
                                <h4 class="title">Nuevo Trade</h4>
                                <p class="category">Ingresa los valores</p>
                            </div>
                            <div class="card-content">
                                <form
                                        method="POST"
                                        action="{{ ! $trade->id ? route('trades.store') : route('trades.update', ['trade_id' => $trade->id])}}"
                                >
                                    @if($trade->id)
                                        @method('PUT')
                                    @endif

                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">{{ __("Puntos del Trade") }}</label>
                                                <input
                                                        name="point"
                                                        id="point"
                                                        class="form-control{{ $errors->has('point') ? ' is-invalid' : '' }}"
                                                        value="{{ old('point') ?: $trade->point }}"
                                                        required
                                                        autofocus
                                                />

                                                @if ($errors->has('point'))
                                                    <span class="invalid-feedback">
                                                <strong>{{ $errors->first('point') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">{{ __("Instrumento") }}</label>
                                                <select name="instrument_id" id="instrument_id" class="form-control">
                                                    @foreach(\App\Instrument::pluck('name', 'id') as $id => $instrument)
                                                        <option {{ (int) old('instrument_id') === $id || $trade->instrument_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                                            {{ $instrument }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">{{ __("Instrumento") }}</label>
                                                <select name="market_id" id="market_id" class="form-control">
                                                    @foreach(\App\Market::pluck('name', 'id') as $id => $market)
                                                        @if($trade->id)
                                                            <option {{ (int) old('market_id') === $id || $trade->instrument->market_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                                                {{ $market }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $id }}">
                                                                {{ $market }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button data-background-color="green" type="submit" class="btn btn-primary">
                                                {{ __($btnText) }}
                                            </button>

                                            <a class="btn btn-link" href="{{ route('trades.index') }}">
                                                {{ __('Cancelar') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.partials.footer')
    </div>
@endsection
