<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                 class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">AdminLTE</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" data-accordion="false">

                <li class="nav-item {{ request()->routeIs('dashboard') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Admin Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('teacher.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('teacher.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-badge"></i>
                        <p>
                            Teacher
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('teacher.teacher.index') }}" class="nav-link {{ request()->routeIs('teacher.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Teachers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('teacher.teacher.add') }}" class="nav-link {{ request()->routeIs('teacher.create') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Add Teacher</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('student.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('student.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people"></i>
                        <p>
                            Student
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('student.index') }}" class="nav-link {{ request()->routeIs('student.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('student.create') }}" class="nav-link {{ request()->routeIs('student.create') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Add Student</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('course.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('course.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-book"></i>
                        <p>
                            Courses
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('course.index') }}" class="nav-link {{ request()->routeIs('course.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Courses</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('course.create') }}" class="nav-link {{ request()->routeIs('course.create') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Create Course</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('subject.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('subject.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-book"></i>
                        <p>
                            Subjects
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('subject.index') }}" class="nav-link {{ request()->routeIs('subject.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Subjects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subject.create') }}" class="nav-link {{ request()->routeIs('subject.create') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Create Subject</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('class.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('class.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-book"></i>
                        <p>
                            Classes
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('class.index') }}" class="nav-link {{ request()->routeIs('class.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Classes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('class.create') }}" class="nav-link {{ request()->routeIs('class.create') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Create class</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('grade.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('grade.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-book"></i>
                        <p>
                            Grades
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('grade.index') }}" class="nav-link {{ request()->routeIs('grade.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Grades</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('grade.create') }}" class="nav-link {{ request()->routeIs('grade.create') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Create Grade</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
