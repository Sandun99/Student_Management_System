<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="{{asset('assets/img/logo/logo.png')}}" alt="Student Management System" /></a>
            <strong><a href="index.html"><img src="{{asset('assets/img/logo/logosn.png')}}" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li class="">
                        <a class="has-arrow" href="#" >
                            <span class="educate-icon educate-home icon-wrap"></span>
                            <span class="mini-click-non">Dashboard</span>
                        </a>
                        <ul class="submenu-angle">
                            <li><a title="Dashboard" href="{{route('dashboard')}}"><span class="mini-sub-pro">Admin Dashboard</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="#" ><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Teachers</span></a>
                        <ul class="submenu-angle" >
                            <li><a title="All Professors" href="{{route('teacher.teacher.index')}}"><span class="mini-sub-pro">All Teachers</span></a></li>
                            <li><a title="Add Professor" href="{{route('teacher.teacher.add')}}"><span class="mini-sub-pro">Add Teacher</span></a></li>
                            <li><a title="Edit Professor" href="{{route('teacher.teacher.edit')}}"><span class="mini-sub-pro">Edit Teacher</span></a></li>
                            <li><a title="Professor Profile" href="{{route('teacher.teacher.show')}}"><span class="mini-sub-pro">Teacher Profile</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="#" ><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Students</span></a>
                        <ul class="submenu-angle" >
                            <li><a title="All Students" href="{{route('student.index')}}"><span class="mini-sub-pro">All Students</span></a></li>
                            <li><a title="Add Students" href="{{route('student.create')}}"><span class="mini-sub-pro">Add Student</span></a></li>
                            <li><a title="Edit Students" href="{{route('student.edit')}}"><span class="mini-sub-pro">Edit Student</span></a></li>
                            <li><a title="Students Profile" href="{{route('student.show')}}"><span class="mini-sub-pro">Student Profile</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="#" ><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Courses</span></a>
                        <ul class="submenu-angle" >
                            <li><a title="All Courses" href="{{route('course.index')}}"><span class="mini-sub-pro">All Courses</span></a></li>
                            <li><a title="Add Courses" href="{{route('course.create')}}"><span class="mini-sub-pro">Add Course</span></a></li>
                            <li><a title="Edit Courses" href="{{route('course.edit')}}"><span class="mini-sub-pro">Edit Course</span></a></li>
                            <li><a title="Courses Profile" href="{{route('course.show')}}"><span class="mini-sub-pro">Courses Info</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
