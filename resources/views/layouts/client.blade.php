@include('layouts.header')
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
    <div class="container-fluid">

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse"
            aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="#">
            @if (auth()->user()->profile !== null)
            <img src="{{ asset('img/profiles') }}/{{ auth()->user()->profile }}"
            class="avatar-img rounded-circle" alt="...">
            @else
            <img src="{{ asset('img/logo.svg') }}" class="navbar-brand-img
            mx-auto" alt="...">
            @endif

        </a>

        <!-- User (xs) -->
        <div class="navbar-user d-md-none">

            <!-- Dropdown -->
            <div class="dropdown">

                <!-- Toggle -->
                <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <img src="{{ asset('img/avatars/profiles/avatar-1.jpg') }}" class="avatar-img rounded-circle"
                            alt="...">
                    </div>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                    <a href="{{ route('my-profile.index') }}" class="dropdown-item">Profile</a>
                    <a href="" class="dropdown-item">Settings</a>
                    <hr class="dropdown-divider">
                    <a href="{{ route('logout.index') }}" class="dropdown-item">Settings</a>
                    {{-- <form action="" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form> --}}
                </div>

            </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fe fe-search"></span>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">
                        <i class="fe fe-home"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('my-profile.index') }}">
                        <i class="fe fe-user"></i> Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#settings" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-message-circle"></i> SMS Templates
                    </a>
                    <div class="collapse " id="settings">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('template.index') }}" class="nav-link">
                                    SMS Templates
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacts" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-align-justify"></i> Contacts
                    </a>
                    <div class="collapse " id="contacts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('contacts.index') }}" class="nav-link">
                                    Contacts
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('tags.index') }}" class="nav-link">
                                    Tags
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('import.index') }}" class="nav-link">
                                    Import Contacts
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#send" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-send"></i> SMS
                    </a>
                    <div class="collapse" id="send">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('sms.index') }}" class="nav-link">
                                    Send SMS
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#broadcast" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-command"></i> Schedule Broadcast
                    </a>
                    <div class="collapse" id="broadcast">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('broadcast.index') }}" class="nav-link">
                                    Schedule Broadcast
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#inbox" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-mail"></i> SMS Inbox
                    </a>
                    <div class="collapse " id="inbox">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('inbox.index') }}" class="nav-link">
                                    SMS Inbox
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#outbox" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-message-square"></i> SMS OutBox
                    </a>
                    <div class="collapse " id="outbox">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('outbox.index') }}" class="nav-link">
                                    SMS Outbox
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#unsend" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-alert-octagon"></i> Unsend SMS
                    </a>
                    <div class="collapse " id="unsend">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('unsend.index') }}" class="nav-link">
                                    Unsend SMS
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#payments" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-credit-card"></i> Billing
                    </a>
                    <div class="collapse " id="payments">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('payments.index') }}" class="nav-link">
                                    Payment History
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('payments.create') }}" class="nav-link">
                                    Top up
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#reports" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-pie-chart"></i> Reports
                    </a>
                    <div class="collapse " id="reports">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('reports.index') }}" class="nav-link">
                                    Reports
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                </li>
                <hr class="navbar-divider my-3">
                <li class="nav-item">
                    <a href="{{ route('logout.index') }}" class="nav-link">Logout</a>
                </li>

                <!-- User (md) -->
                <div class="navbar-user d-none d-md-flex" id="sidebarUser">

                    <!-- Icon -->
                    <a href="#sidebarModalActivity" class="navbar-user-link" data-toggle="modal">
                        <span class="icon">
                            <i class="fe fe-bell"></i>
                        </span>
                    </a>

                    <!-- Dropup -->
                    <div class="dropup">

                        <!-- Toggle -->
                        <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-sm avatar-online">
                               @if (auth()->user()->profile !== null)
                               <img src="{{ asset('img/profiles') }}/{{ auth()->user()->profile }}"
                               class="avatar-img rounded-circle" alt="...">
                               @else
                               <img src="{{ asset('img/avatars/profiles/avatar-1.jpg') }}"
                               class="avatar-img rounded-circle" alt="...">
                               @endif
                            </div>
                        </a>

                        <!-- Menu -->
                        <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                            <a href="#" class="dropdown-item">Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <hr class="dropdown-divider">
                            <a href="" class="dropdown-item">Logout</a>
                        </div>

                    </div>

                    <!-- Icon -->
                    <a href="#sidebarModalSearch" class="navbar-user-link" data-toggle="modal">
                        <span class="icon">
                            <i class="fe fe-search"></i>
                        </span>
                    </a>

                </div>


        </div> <!-- / .navbar-collapse -->

    </div>
</nav>

<div class="main-content">
    <div class="card" style="padding: 0px">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h3>{{ auth()->user()->name }}</h3>
                </div>
                <div class="col-md-6 text-right">
                     <a href="{{ route('payments.create') }}" class="btn btn-success">Top up</a>
                     <a href="" class="btn btn-info">Balance: @if (auth()->user()->provider === 'at')
                        {{ \App\Helper\Helper::getBalance() }}
                     @else
                         KES. {{ \App\Helper\Helper::getBalance() }}
                     @endif</a>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
</div>


@include('layouts.footer')
