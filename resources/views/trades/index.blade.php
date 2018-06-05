@extends('layouts.app')

@section('content')
    @include('layouts.partials.sidebar')
    <div class="main-panel">
        @include('layouts.partials.navbar')
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header" data-background-color="orange">
                                <h4 class="title">Mis Trades</h4>
                                <p class="category">YYY</p>
                                <a class="btn btn-link" data-background-color="green" href="{{ route('trades.create') }}">
                                    {{ __('Añadir Trade') }}
                                </a>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <th>{{ __("Mercado") }}</th>
                                    <th>{{ __("Instrumento") }}</th>
                                    <th>{{ __("Puntos") }}</th>
                                    <th>{{ __("Fecha") }}</th>
                                    <th>{{ __("Acciones") }}</th>
                                    </thead>
                                    <tbody>
                                    @forelse($trades as $trade)
                                        <tr>
                                            <td>{{ $trade->instrument->market->name }}</td>
                                            <td>{{ $trade->instrument->name }}</td>
                                            @if($trade->point > 0)
                                                <td><span class="label label-success">{{ $trade->point }}</span></td>
                                            @elseif($trade->point === '0')
                                                <td><span class="label label-warning">{{ $trade->point }}</span></td>
                                            @else
                                                <td><span class="label label-danger">{{ $trade->point }}</span></td>
                                            @endif
                                            <td>{{ $trade->created_at }}</td>
                                            <td>
                                                @include('trades.partials.trades_action_buttons')
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-dark">
                                            {{ __("No tienes trades") }}
                                        </div>
                                    @endforelse
                                    </tbody>
                                </table>
                                {{ $trades->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.partials.footer')
    </div>
@endsection
@push('scripts')
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('js/dashboard/demo.js') }}"></script>
@endpush

</html>