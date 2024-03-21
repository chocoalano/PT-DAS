<!-- Left Sidebar Start -->
<div class="leftside-menu">
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/panel/images/logo.png') }}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/panel/images/logo_sm.png') }}" alt="" height="16">
        </span>
    </a>
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('assets/panel/images/logo.png') }}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/panel/images/logo_sm.png') }}" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">
            @foreach ($menu as $k)
                <li class="side-nav-title side-nav-item">{{ $k['groupname'] }}</li>
                @foreach ($k['data'] as $key => $v)
                    @if (!empty($v['permission']))
                        @can($v['permission'][0])
                            <li class="side-nav-item">
                                <a href="{{ $v['url'] }}" class="side-nav-link" wire:navigate.hover>
                                    <i class="{{ $v['icon'] }}"></i>
                                    <span> {{ $v['nama'] }} </span>
                                </a>
                            </li>
                        @endcan
                    @else
                        <li class="side-nav-item">
                            <a href="{{ $v['url'] }}" class="side-nav-link" wire:navigate.hover>
                                <i class="{{ $v['icon'] }}"></i>
                                <span> {{ $v['nama'] }} </span>
                            </a>
                        </li>
                    @endif
                @endforeach
            @endforeach
        </ul>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->
