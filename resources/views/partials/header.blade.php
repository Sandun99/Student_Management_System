<nav class="app-header navbar navbar-expand shadow-sm" style="
    background: rgba(255, 255, 255, 0.88) !important;
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(0,0,0,0.06);
    height: 55px;
    min-height: 55px;
">
    <div class="container-fluid px-4 d-flex align-items-center justify-content-between">

        <ul class="navbar-nav">
            <li class="nav-item d-flex align-items-center">
                <a class="nav-link text-dark p-0" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list fs-3"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav align-items-center gap-4">
            <li class="nav-item">
                <a class="nav-link text-secondary p-2" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen fs-5"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit fs-5" style="display: none"></i>
                </a>
            </li>

            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 text-decoration-none p-0"
                       href="#" data-bs-toggle="dropdown">
                        <img src="{{ Auth::user()->avatar ?? asset('assets/img/user2-160x160.jpg') }}"
                             class="rounded-circle border border-2 border-primary shadow-sm"
                             width="38" height="38" alt="User">
                        <span class="d-none d-md-inline fw-medium text-dark">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-2"
                        style="background: rgba(255,255,255,0.97); backdrop-filter: blur(12px);">
                        <li><a href="{{ route('profile.index') }}" class="dropdown-item py-2 hover-bg-primary text-dark">
                                <i class="bi bi-person me-2"></i> Profile
                            </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger py-2 hover-bg-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @endauth
        </ul>
    </div>
</nav>
