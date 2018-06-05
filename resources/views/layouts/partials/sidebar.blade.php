<div class="sidebar" data-color="green" data-image="{{ asset('img/dashboard/sidebar-3.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
            Trading<b>APP</b>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li @if($activePage === 'dashboard') class="active" @endif>

                <a href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li @if($activePage === 'mistrades') class="active" @endif>
                <a href="{{ route('trades.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Mis Trades</p>
                </a>
            </li>

    </div>
</div>