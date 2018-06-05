@extends('layouts.app')

@section('content')
    @include('layouts.partials.sidebar')
    <div class="main-panel">
        @include('layouts.partials.navbar')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @include('dashboard.partials.card')
                </div>
                <div class="row">
                    @include('dashboard.partials.chart')
                </div>
                <div class="row">
                    @include('dashboard.partials.taskboard')
                </div>
            </div>
        </div>
        @include('layouts.partials.footer')
    </div>
@endsection

@push('scripts')
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('js/dashboard/demo.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>
@endpush