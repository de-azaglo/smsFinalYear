<div class="sidebar close">
    <div class="logo-details">
        <img src="/../resource/logo.png" alt="" id="logo-icon">
        <!-- <i class='bx bxl-c-plus-plus'></i> -->
        <span class="logo_name">LMIS</span>
    </div>
    <?php
    // Admin's Side Nav
    if ($_SESSION['user']['user_type'] === 'admin' ?? false) { ?>
        <ul class="side-nav-links">
            <li class="<?= $_SERVER['REQUEST_URI'] === '/admin/dashboard' ? 'active' : '' ?>">
                <a href="/admin/dashboard">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank ">
                    <li><a class="link_name" href="#">Dashboard</a></li>
                </ul>
            </li>
            <li class="<?= ($_SERVER['REQUEST_URI'] === '/admin/teachers/create' || $_SERVER['REQUEST_URI'] === '/admin/teachers/show') ? 'active' : '' ?>">
                <div class="icon-link">
                    <a href="#">
                        <!-- <i class='bx bx-collection'></i> -->
                        <i class='bx bx-user-pin'></i>
                        <span class="link_name">Facilitators</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Facilitators</a></li>
                    <li><a href="/admin/teachers/create">Add Facilitator</a></li>
                    <li><a href="/admin/teachers/show">View Facilitators</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="#">
                        <i class='bx bx-book-alt'></i>
                        <span class="link_name">Students</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Students</a></li>
                    <li><a href="/admin/students/create">Add Student</a></li>
                    <li><a href="/admin/students/show">View Students</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="/admin/grades/show">
                        <i class='bx bx-chalkboard'></i>
                        <span class="link_name">Grades</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down arrow'></i> -->
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/admin/grades/show">Grades</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="#">
                        <i class='bx bx-book-alt'></i>
                        <span class="link_name">Academics</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Academics</a></li>
                    <li><a href="/admin/academics/year/show">Academic Year</a></li>
                    <li><a href="/admin/academics/terms/show">Terms</a></li>
                    <li><a href="/admin/academics/event/create">Add Academic Events</a></li>
                    <li><a href="/admin/academics/calendar">Calendar</a></li>
                    <li><a href="/admin/academics/timetable">Timetable</a></li>
                </ul>
            </li>
            <li>
                <a href="/admin/attendance">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="link_name">Attendance</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Attendance</a></li>
                </ul>
            </li>
            <li>
                <a href="/admin/assessment">
                    <i class='bx bx-line-chart'></i>
                    <span class="link_name">Assessment</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Assessment</a></li>
                </ul>
            </li>
            <li>
                <a href="/settings">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/settings">Setting</a></li>
                </ul>
            </li>
            <li class="profile-container mt-auto">
                <div class="icon-link">
                    <a href="">
                        <form action="/sessions" method="post">
                            <input type="hidden" value="DELETE" name="_method">
                            <button class="logout-btn-side-nav"><i class='bx bx-log-out'></i></button>
                        </form>
                        <span class="link_name">Log Out</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Log Out</a></li>
                </ul>
            </li>
        </ul>
    <?php }
    // Teacher's Side Nav    
    elseif ($_SESSION['user']['user_type'] === 'facilitator' ?? false) { ?>
        <ul class="side-nav-links ">
            <li class="<?= $_SERVER['REQUEST_URI'] === '/facilitator/dashboard' ? 'active' : '' ?>">
                <div class="icon-link">
                    <a href="/facilitator/dashboard">
                        <i class='bx bx-grid-alt'></i>
                        <span class="link_name">Dashboard</span>
                    </a>
                </div>
                <ul class="sub-menu blank ">
                    <li><a class="link_name" href="#">Dashboard</a></li>
                </ul>
            </li>

            <li class="<?= $_SERVER['REQUEST_URI'] === '/facilitator/calendar' ? 'active' : '' ?>">
                <div class="icon-link">
                    <a href="/facilitator/calendar">
                        <i class='bx bx-calendar'></i>
                        <span class="link_name">Academic Calendar</span>
                    </a>
                </div>
                <ul class="sub-menu blank ">
                    <li><a class="link_name" href="#">Academic Calendar</a></li>
                </ul>
            </li>

            <li class="<?= $_SERVER['REQUEST_URI'] === '/facilitator/timetable' ? 'active' : '' ?>">
                <div class="icon-link">
                    <a href="/facilitator/timetable">
                        <i class='bx bx-table'></i>
                        <span class="link_name">Timetable</span>
                    </a>
                </div>
                <ul class="sub-menu blank ">
                    <li><a class="link_name" href="#">Timetable</a></li>
                </ul>
            </li>

            <li class="<?= $_SERVER['REQUEST_URI'] === '/facilitator/assignment' ? 'active' : '' ?>">
                <a href="/facilitator/assignments">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Assignment</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Assignment</a></li>
                </ul>
            </li>
            <li class="<?= $_SERVER['REQUEST_URI'] === '/facilitator/assessment' ? 'active' : '' ?>">

                <div class="icon-link">
                    <a href="/facilitator/assessment">
                        <i class='bx bx-line-chart'></i>
                        <span class="link_name">Assessment</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Assessment</a></li>
                </ul>
            </li>
            <li class="<?= $_SERVER['REQUEST_URI'] === '/facilitator/resources' ? 'active' : '' ?>">

                <div class="icon-link">
                    <a href="/facilitator/resources">
                        <i class='bx bx-folder'></i>
                        <span class="link_name">Resources</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Resources</a></li>
                </ul>
            </li>
            <li>
                <a href="/settings">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/settings">Setting</a></li>
                </ul>
            </li>
            <li class="profile-container mt-auto">
                <div class="icon-link">
                    <a href="">
                        <form action="/sessions" method="post">
                            <input type="hidden" value="DELETE" name="_method">
                            <button class="logout-btn-side-nav"><i class='bx bx-log-out'></i></button>
                        </form>
                        <span class="link_name">Log Out</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Log Out</a></li>
                </ul>
            </li>

        </ul>
    <?php }
    // Student's Side Nav
    elseif ($_SESSION['user']['user_type'] === 'student' ?? false) { ?>
        <ul class="side-nav-links ">
            <li class="<?= $_SERVER['REQUEST_URI'] === '/student/dashboard' ? 'active' : '' ?>">
                <div class="icon-link">
                    <a href="/student/dashboard">
                        <i class='bx bx-grid-alt'></i>
                        <span class="link_name">Dashboard</span>
                    </a>
                </div>
                <ul class="sub-menu blank ">
                    <li><a class="link_name" href="#">Dashboard</a></li>
                </ul>
            </li>

            <li class="<?= $_SERVER['REQUEST_URI'] === '/student/calendar' ? 'active' : '' ?>">
                <div class="icon-link">
                    <a href="/student/calendar">
                        <i class='bx bx-calendar'></i>
                        <span class="link_name">Academic Calendar</span>
                    </a>
                </div>
                <ul class="sub-menu blank ">
                    <li><a class="link_name" href="#">Academic Calendar</a></li>
                </ul>
            </li>

            <li class="<?= $_SERVER['REQUEST_URI'] === '/student/timetable' ? 'active' : '' ?>">
                <div class="icon-link">
                    <a href="/student/timetable">
                        <i class='bx bx-table'></i>
                        <span class="link_name">Timetable</span>
                    </a>
                </div>
                <ul class="sub-menu blank ">
                    <li><a class="link_name" href="#">Timetable</a></li>
                </ul>
            </li>

            <li class="<?= $_SERVER['REQUEST_URI'] === '/student/assignment' ? 'active' : '' ?>">
                <a href="/student/assignments">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Assignment</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Assignment</a></li>
                </ul>
            </li>
            <li class="<?= $_SERVER['REQUEST_URI'] === '/student/resources' ? 'active' : '' ?>">

                <div class="icon-link">
                    <a href="/student/resources">
                        <i class='bx bx-folder'></i>
                        <span class="link_name">Resources</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Resources</a></li>
                </ul>
            </li>

            <!-- <li>
                <a href="/facilitator/attendance">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="link_name">Attendance</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Attendance</a></li>
                </ul>
            </li> -->
            <li class="<?= $_SERVER['REQUEST_URI'] === '/student/assessment' ? 'active' : '' ?>">

                <div class="icon-link">
                    <a href="/student/assessment">
                        <i class='bx bx-line-chart'></i>
                        <span class="link_name">Assessment</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Assessment</a></li>
                </ul>
            </li>
            <li>
                <a href="/settings">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/settings">Setting</a></li>
                </ul>
            </li>
            <li class="profile-container mt-auto">
                <div class="icon-link">
                    <a href="">
                        <form action="/sessions" method="post">
                            <input type="hidden" value="DELETE" name="_method">
                            <button class="logout-btn-side-nav"><i class='bx bx-log-out'></i></button>
                        </form>
                        <span class="link_name">Log Out</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Log Out</a></li>
                </ul>
            </li>

        </ul>
    <?php }
    // Parent's Side Nav
    elseif ($_SESSION['user']['user_type'] === 'parent' ?? false) { ?>
        <ul class="side-nav-links ">
            <li class="<?= $_SERVER['REQUEST_URI'] === '/parent/dashboard' ? 'active' : '' ?>">
                <div class="icon-link">
                    <a href="/parent/dashboard">
                        <i class='bx bx-grid-alt'></i>
                        <span class="link_name">Dashboard</span>
                    </a>
                </div>
                <ul class="sub-menu blank ">
                    <li><a class="link_name" href="#">Dashboard</a></li>
                </ul>
            </li>

            <li class="<?= $_SERVER['REQUEST_URI'] === '/parent/calendar' ? 'active' : '' ?>">
                <div class="icon-link">
                    <a href="/parent/calendar">
                        <i class='bx bx-calendar'></i>
                        <span class="link_name">Academic Calendar</span>
                    </a>
                </div>
                <ul class="sub-menu blank ">
                    <li><a class="link_name" href="#">Academic Calendar</a></li>
                </ul>
            </li>

            <li class="<?= $_SERVER['REQUEST_URI'] === '/parent/timetable' ? 'active' : '' ?>">
                <div class="icon-link">
                    <a href="/parent/timetable">
                        <i class='bx bx-table'></i>
                        <span class="link_name">Timetable</span>
                    </a>
                </div>
                <ul class="sub-menu blank ">
                    <li><a class="link_name" href="#">Timetable</a></li>
                </ul>
            </li>

            <li class="<?= $_SERVER['REQUEST_URI'] === '/parent/assessment' ? 'active' : '' ?>">

                <div class="icon-link">
                    <a href="/parent/assessment">
                        <i class='bx bx-line-chart'></i>
                        <span class="link_name">Assessment</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Assessment</a></li>
                </ul>
            </li>
            <li>
                <a href="/settings">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/settings">Setting</a></li>
                </ul>
            </li>
            <li class="profile-container mt-auto">
                <div class="icon-link">
                    <a href="">
                        <form action="/sessions" method="post">
                            <input type="hidden" value="DELETE" name="_method">
                            <button class="logout-btn-side-nav"><i class='bx bx-log-out'></i></button>
                        </form>
                        <span class="link_name">Log Out</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Log Out</a></li>
                </ul>
            </li>

        </ul>
    <?php } ?>
</div>