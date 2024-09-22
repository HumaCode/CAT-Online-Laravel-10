<div class="app-menu navbar-menu border-end">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('') }}assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('') }}assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('') }}assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('') }}assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>


            <ul class="navbar-nav" id="navbar-nav">


                <li class="nav-item ">
                    <a @class([
                        'nav-link menu-link',
                        'active' => str_contains(request()->path(), 'dashboard'),
                    ]) href="{{ route('dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboard</span>
                    </a>
                </li>

                @foreach (menus() as $category => $menus)
                    @php
                        $showCategory = true;
                    @endphp

                    @foreach ($menus as $mm)
                        @can('read ' . $mm->url)
                            @if ($showCategory)
                                <li class="menu-title"><span data-key="t-menu">{{ $category }}</span></li>

                                @php
                                    $showCategory = false;
                                @endphp
                            @endif

                            <li class="nav-item">


                                @if (count($mm->subMenus))
                                    <a @class([
                                        'nav-link menu-link',
                                        'active' => str_contains(request()->path(), $mm->url),
                                    ]) href="#{{ $mm->url }}" data-bs-toggle="collapse"
                                        aria-expanded="false" aria-controls="{{ $mm->url }}">
                                        <i class="ri-{{ $mm->icon }}"></i> <span
                                            data-key="t-{{ $mm->name }}">{{ $mm->name }}</span>
                                    </a>
                                    <div @class([
                                        'collapse menu-dropdown',
                                        'show ' => str_contains(request()->path(), $mm->url),
                                    ]) id="{{ $mm->url }}">
                                        <ul class="nav nav-sm flex-column">

                                            @foreach ($mm->subMenus as $sm)
                                                @can('read ' . $sm->url)
                                                    <li class="nav-item">
                                                        <a href="{{ url($sm->url) }}" @class([
                                                            'nav-link',
                                                            'active' => str_contains(request()->path(), $sm->url),
                                                        ])
                                                            data-key="t-analytics">
                                                            {{ $sm->name }} </a>
                                                    </li>
                                                @endcan
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <a @class([
                                        'nav-link menu-link',
                                        'active' => str_contains(request()->path(), $mm->url),
                                    ]) href="{{ url($mm->url) }}">
                                        <i class="ri-{{ $mm->icon }}"></i> <span
                                            data-key="t-widgets">{{ $mm->name }}</span>
                                    </a>
                                @endif

                            </li>
                        @endcan
                    @endforeach
                @endforeach



            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
