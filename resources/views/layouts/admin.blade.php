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
            <img src="{{ asset('img/logo.svg') }}" class="navbar-brand-img
            mx-auto" alt="...">
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
                    <a href="{{ route('profile.index') }}" class="dropdown-item">Profile</a>
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
                    <a class="nav-link" href="{{ url('/admin') }}">
                        <i class="fe fe-home"></i> Dashboard
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link " href="{{ route('profile.index') }}">
                        <i class="fe fe-user"></i> Profile
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#settings" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-message-circle"></i> SMS Templates
                    </a>
                    <div class="collapse " id="settings">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('client-templates.index') }}" class="nav-link">
                                    SMS Templates
                                </a>
                            </li>

                        </ul>
                    </div>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#contacts" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-align-justify"></i> Contacts
                    </a>
                    <div class="collapse " id="contacts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('client-contacts.index') }}" class="nav-link">
                                    Contacts
                                </a>
                            </li>


                        </ul>
                    </div>
                </li> --}}
                {{-- <li class="nav-item">
                <a class="nav-link" href="#groups" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBasics">
                  <i class="fe fe-users"></i> Clients
                </a>
                <div class="collapse " id="groups">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item ">
                      <a href="{{ route('groups.index') }}" class="nav-link">
                        Groups
                      </a>
                    </li>

                  </ul>
                </div>
              </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#send" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-send"></i> Send SMS
                    </a>
                    <div class="collapse " id="send">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="" class="nav-link">
                                    Send SMS
                                </a>
                            </li>

                        </ul>
                    </div>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#broadcast" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-command"></i> Schedule Broadcast
                    </a>
                    <div class="collapse " id="broadcast">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('client-broadcast.index') }}" class="nav-link">
                                    Scheduled Broadcasts
                                </a>
                            </li>

                        </ul>
                    </div>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#inbox" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-mail"></i> SMS Inbox
                    </a>
                    <div class="collapse " id="inbox">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('client-inbox.index') }}" class="nav-link">
                                    SMS Inbox
                                </a>
                            </li>

                        </ul>
                    </div>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#outbox" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-message-square"></i> SMS OutBox
                    </a>
                    <div class="collapse " id="outbox">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('client-outbox.index') }}" class="nav-link">
                                    SMS Outbox
                                </a>
                            </li>

                        </ul>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="#clients" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-clipboard"></i> Clients
                    </a>
                    <div class="collapse " id="clients">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('clients.index') }}" class="nav-link">
                                    Clients
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#providers" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-clipboard"></i> SMS Providers
                    </a>
                    <div class="collapse " id="providers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('providers.index') }}" class="nav-link">
                                    SMS Providers
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sub" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarBasics">
                        <i class="fe fe-clipboard"></i> Subscriptions
                    </a>
                    <div class="collapse " id="sub">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="{{ route('subscriptions.index') }}" class="nav-link">
                                    Subscriptions
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
                                <a href="" class="nav-link">
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
                                <img src="{{ asset('img/avatars/profiles/avatar-1.jpg') }}"
                                    class="avatar-img rounded-circle" alt="...">
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
    @yield('content')
</div>
@include('layouts.footer')
