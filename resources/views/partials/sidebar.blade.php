<aside class="app-sidebar shadow-lg"
       style="background: rgba(15, 23, 42, 0.95);
              backdrop-filter: blur(20px);
              border-right: 1px solid rgba(255,255,255,0.08);
              width: 240px;
              transition: all 0.3s ease;">

    <div class="sidebar-brand text-center py-4 border-bottom border-white border-opacity-10">
        <a href="{{ route('dashboard') }}" class="text-decoration-none">
            <div class="d-flex align-items-center justify-content-center gap-3">
                <div class="bg-gradient-primary rounded-3 d-flex align-items-center justify-content-center"
                     style="width: 45px; height: 45px; background: linear-gradient(135deg, #667eea, #764ba2);">
                    <i class="bi bi-mortarboard-fill text-white fs-3"></i>
                </div>
                <span class="text-white fw-bold fs-5 d-none d-lg-inline" style="letter-spacing: 1px;">Admin</span>
            </div>
        </a>
    </div>

    <!-- Menu -->
    <div class="sidebar-wrapper pt-3 pb-5">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                       class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Teachers -->
                <li class="nav-item {{ request()->is('teacher*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('teacher*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-badge-fill"></i>
                        <p>Teachers <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('teacher.teacher.index') }}" class="nav-link {{ request()->routeIs('teacher.teacher.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle-fill fs-7"></i>
                                <p>All Teachers</p>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('teacher.teacher.create') }}" class="nav-link {{ request()->routeIs('teacher.teacher.create') ? 'active' : '' }}">--}}
{{--                                <i class="nav-icon bi bi-circle-fill fs-7"></i>--}}
{{--                                <p>Add Teacher</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>

                <!-- Students -->
                <li class="nav-item {{ request()->is('student*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('student*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Students <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('student.index') }}" class="nav-link {{ request()->routeIs('student.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle-fill fs-7"></i>
                                <p>All Students</p>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('student.create') }}" class="nav-link {{ request()->routeIs('student.create') ? 'active' : '' }}">--}}
{{--                                <i class="nav-icon bi bi-circle-fill fs-7"></i>--}}
{{--                                <p>Add Student</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>

                <!-- Courses -->
                <li class="nav-item {{ request()->is('course*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('course*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-book-half"></i>
                        <p>Courses <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('course.index') }}" class="nav-link {{ request()->routeIs('course.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle-fill fs-7"></i>
                                <p>All Courses</p>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('course.create') }}" class="nav-link {{ request()->routeIs('course.create') ? 'active' : '' }}">--}}
{{--                                <i class="nav-icon bi bi-circle-fill fs-7"></i>--}}
{{--                                <p>Create Course</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>

                <!-- Subjects -->
                <li class="nav-item {{ request()->is('subject*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('subject*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-journal-text"></i>
                        <p>Subjects <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('subject.index') }}" class="nav-link {{ request()->routeIs('subject.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle-fill fs-7"></i>
                                <p>All Subjects</p>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('subject.create') }}" class="nav-link {{ request()->routeIs('subject.create') ? 'active' : '' }}">--}}
{{--                                <i class="nav-icon bi bi-circle-fill fs-7"></i>--}}
{{--                                <p>Create Subject</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>

                <!-- Grades -->
                <li class="nav-item {{ request()->is('grade*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('grade*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-award-fill"></i>
                        <p>Grades <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('grade.index') }}" class="nav-link {{ request()->routeIs('grade.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle-fill fs-7"></i>
                                <p>All Grades</p>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('grade.create') }}" class="nav-link {{ request()->routeIs('grade.create') ? 'active' : '' }}">--}}
{{--                                <i class="nav-icon bi bi-circle-fill fs-7"></i>--}}
{{--                                <p>Create Grade</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>

                <!-- Classes -->
                <li class="nav-item {{ request()->is('class*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('class*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-building"></i>
                        <p>Classes <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('class.index') }}" class="nav-link {{ request()->routeIs('class.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle-fill fs-7"></i>
                                <p>All Classes</p>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('class.create') }}" class="nav-link {{ request()->routeIs('class.create') ? 'active' : '' }}">--}}
{{--                                <i class="nav-icon bi bi-circle-fill fs-7"></i>--}}
{{--                                <p>Create Class</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<style>
    .app-sidebar .nav-link {
        border-radius: 12px;
        margin: 4px 12px;
        padding: 11px 16px !important;
        transition: all 0.3s ease;
        color: #cbd5e1 !important;
    }
    .app-sidebar .nav-link:hover {
        background: rgba(255,255,255,0.08);
        color: #ffffff !important;
        transform: translateX(4px);
    }
    .app-sidebar .nav-link.active {
        background: linear-gradient(90deg, #667eea, #764ba2);
        color: white !important;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(102, 94, 234, 0.4);
    }
    .app-sidebar .nav-treeview .nav-link {
        padding-left: 50px !important;
        font-size: 0.94rem;
    }
    .app-sidebar .nav-treeview .nav-link.active {
        background: rgba(102, 94, 234, 0.25);
        color: #c4b5fd !important;
    }
    .app-sidebar .nav-icon {
        width: 36px;
        text-align: center;
    }
</style>
