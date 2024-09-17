<?php

// return  [
// '/' => '/index.php',
// '/admin/teachers/create' => '/admin/teacher-create.php',
// '/admin/teachers' => '/teacher-show.php',
// '/admin/dashboard' => '/admin/index.php',
// ];

/* ------------------- Guest Routes ------------------- */
global $router;
$router->get('/boot', '/boots.php');
$router->get('/', '/guest/index.php')->only('guest');
$router->get('/about', '/guest/about.php')->only('guest');
$router->get('/contact', '/guest/contact.php')->only('guest');
$router->get('/login', '/guest/sessions/create.php')->only('guest');
$router->post('/sessions', '/guest/sessions/store.php')->only('guest');
$router->delete('/sessions', '/guest/sessions/destroy.php')->only('auth');
$router->get('/settings', '/settings.php')->only('auth');
$router->post('/settings/save', '/save.settings.php')->only('auth');

/* ------------------- Admin Routes ------------------- */
$router->get('/admin/dashboard', '/admin/index.php')->only('admin');
$router->get('/admin/dashboard', '/admin/index.php')->only('admin');
$router->get('/admin/teachers/show', '/admin/teachers/show.php')->only('admin');
$router->get('/admin/teachers/create', '/admin/teachers/create.php')->only('admin');
$router->post('/admin/teachers/store', '/admin/teachers/store.php')->only('admin');
$router->get('/admin/students/show', '/admin/students/show.php')->only('admin');
$router->get('/admin/students/create', '/admin/students/create.php')->only('admin');
$router->post('/admin/students/store', '/admin/students/store.php')->only('admin');
$router->get('/admin/grades/show', '/admin/grades/show.php')->only('admin');
$router->get('/admin/grades/show', '/admin/grades/show.php')->only('admin');
$router->get('/admin/attendance', '/admin/attendance/show.php')->only('admin');
$router->get('/admin/assessment', '/admin/assessment/show.php')->only('admin');
$router->get('/admin/academics/calendar', '/admin/academics/calendar/show.php')->only('admin');
$router->get('/admin/academics/event/create', '/admin/academics/event/create.php')->only('admin');
$router->post('/admin/academics/event/store', '/admin/academics/event/store.php')->only('admin');
$router->get('/admin/academics/year/show', '/admin/academics/year/show.php')->only('admin');
$router->get('/admin/academics/year/create', '/admin/academics/year/create.php')->only('admin');
$router->post('/admin/academics/year/store', '/admin/academics/year/store.php')->only('admin');
$router->get('/admin/academics/terms/show', '/admin/academics/terms/show.php')->only('admin');
$router->get('/admin/academics/timetable', '/admin/academics/timetable/show.php')->only('admin');
$router->get('/admin/academics/timetable/create', '/admin/academics/timetable/create.php')->only('admin');
$router->post('/admin/academics/timetable/store', '/admin/academics/timetable/store.php')->only('admin');
$router->get('/test', '/test.php')->only('admin');
$router->post('/test', '/test.php')->only('admin');


/* ------------------- Teacher Routes ------------------- */
$router->get('/facilitator/dashboard', '/facilitator/index.php')->only('facilitator');
$router->get('/facilitator/timetable', '/facilitator/timetable/show.php')->only('facilitator');
$router->get('/facilitator/calendar', '/facilitator/calendar/show.php')->only('facilitator');
$router->get('/facilitator/assessment', '/facilitator/assessment/show.php')->only('facilitator');
$router->get('/facilitator/assessment/single', '/facilitator/assessment/single/show.php')->only('facilitator');
$router->post('/facilitator/assessment', '/facilitator/assessment/store.php')->only('facilitator');
$router->post('/facilitator/attendance/mark', '/facilitator/attendance/store.php')->only('facilitator');
$router->get('/facilitator/assignments', '/facilitator/assignment/show.php')->only('facilitator');
$router->get('/facilitator/assignment/add', '/facilitator/assignment/create.php')->only('facilitator');
$router->get('/facilitator/assignment', '/facilitator/assignment/single/show.php')->only('facilitator');
$router->post('/facilitator/assignment', '/facilitator/assignment/store.php')->only('facilitator');
$router->get('/facilitator/resources', '/facilitator/resources/show.php')->only('facilitator');
$router->get('/facilitator/resources/add', '/facilitator/resources/create.php')->only('facilitator');
$router->post('/facilitator/resources', '/facilitator/resources/store.php')->only('facilitator');

/* ------------------- Student Routes ------------------- */
$router->get('/student/dashboard', '/student/index.php')->only('student');
$router->get('/student/timetable', '/student/timetable/show.php')->only('student');
$router->get('/student/calendar', '/student/calendar/show.php')->only('student');
$router->get('/student/assignments', '/student/assignment/show.php')->only('student');
$router->get('/student/assignment', '/student/assignment/single/show.php')->only('student');
$router->post('/student/assignment/submit', '/student/assignment/single/submit.php')->only('student');
$router->get('/student/assessment', '/student/assessment/show.php')->only('student');
$router->get('/student/resources', '/student/resources/show.php')->only('student');

/* ------------------- Parent Routes ------------------- */
$router->get('/parent/dashboard', '/parent/index.php')->only('parent');
$router->get('/parent/timetable', '/parent/timetable/show.php')->only('parent');
$router->get('/parent/calendar', '/parent/calendar/show.php')->only('parent');
$router->get('/parent/assessment', '/parent/assessment/show.php')->only('parent');


