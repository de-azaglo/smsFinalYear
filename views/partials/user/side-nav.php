<div class="sidebar close">
    <div class="logo-details">
        <img src="/../resource/logo.png" alt="" id="logo-icon">
        <!-- <i class='bx bxl-c-plus-plus'></i> -->
        <span class="logo_name">LMIS</span>
    </div>
    <?php if ($_SESSION['user']['user_type'] === 'admin' ?? false) { ?>
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
                <a href="#">
                    <i class='bx bx-line-chart'></i>
                    <span class="link_name">Assessment</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Assessment</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Setting</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="/../resource/profile.jpg" alt="profileImg">
                    </div>
                    <div class="name-job">
                        <div class="profile_name"><?= $name ?></div>
                        <div class="job"><?= $user_type ?></div>
                    </div>
                    <form action="/sessions" method="post">
                        <input type="hidden" value="DELETE" name="_method">
                        <button class="logout-btn-side-nav"><i class='bx bx-log-out'></i></button>
                    </form>
                </div>
            </li>
        </ul>
    <?php }elseif ($_SESSION['user']['user_type'] === 'facilitator' ?? false){ ?>
        <ul class="side-nav-links">
            <li class="<?= $_SERVER['REQUEST_URI'] === '/facilitator/dashboard' ? 'active' : '' ?>">
                <a href="/facilitator/dashboard">
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
                <a href="#">
                    <i class='bx bx-line-chart'></i>
                    <span class="link_name">Assessment</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Assessment</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Setting</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="/../resource/profile.jpg" alt="profileImg">
                    </div>
                    <div class="name-job">
                        <div class="profile_name"><?= $name ?></div>
                        <div class="job"><?= $user_type ?></div>
                    </div>
                    <form action="/sessions" method="post">
                        <input type="hidden" value="DELETE" name="_method">
                        <button class="logout-btn-side-nav"><i class='bx bx-log-out'></i></button>
                    </form>
                </div>
            </li>
        </ul>
    <?php }?>
</div>
<!-- <section class="home-section">
    <div class="home-content">
        
        <span class="text">Drop Down Sidebar</span>
    </div>
</section> -->