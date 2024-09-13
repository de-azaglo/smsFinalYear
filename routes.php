<?php

// return  [
// '/' => 'controllers/index.php',
// '/admin/teachers/create' => 'controllers/admin/teacher-create.php',
// '/admin/teachers' => 'controllers/teacher-show.php',
// '/admin/dashboard' => 'controllers/admin/index.php',
// ];

/* ------------------- Guest Routes ------------------- */
global $router;
$router->get('/boot', 'controllers/boots.php');
$router->get('/', 'controllers/guest/index.php')->only('guest');
$router->get('/about', 'controllers/guest/about.php')->only('guest');
$router->get('/contact', 'controllers/guest/contact.php')->only('guest');
$router->get('/login', 'controllers/guest/sessions/create.php')->only('guest');
$router->post('/sessions', 'controllers/guest/sessions/store.php')->only('guest');
$router->delete('/sessions', 'controllers/guest/sessions/destroy.php')->only('auth');
$router->get('/settings', 'controllers/settings.php')->only('auth');
$router->post('/settings/save', 'controllers/save.settings.php')->only('auth');

/* ------------------- Admin Routes ------------------- */
$router->get('/admin/dashboard', 'controllers/admin/index.php')->only('admin');
$router->get('/admin/dashboard', 'controllers/admin/index.php')->only('admin');
$router->get('/admin/teachers/show', 'controllers/admin/teachers/show.php')->only('admin');
$router->get('/admin/teachers/create', 'controllers/admin/teachers/create.php')->only('admin');
$router->post('/admin/teachers/store', 'controllers/admin/teachers/store.php')->only('admin');
$router->get('/admin/students/show', 'controllers/admin/students/show.php')->only('admin');
$router->get('/admin/students/create', 'controllers/admin/students/create.php')->only('admin');
$router->post('/admin/students/store', 'controllers/admin/students/store.php')->only('admin');
$router->get('/admin/grades/show', 'controllers/admin/grades/show.php')->only('admin');
$router->get('/admin/grades/show', 'controllers/admin/grades/show.php')->only('admin');
$router->get('/admin/attendance', 'controllers/admin/attendance/show.php')->only('admin');
$router->get('/admin/assessment', 'controllers/admin/assessment/show.php')->only('admin');
$router->get('/admin/academics/calendar', 'controllers/admin/academics/calendar/show.php')->only('admin');
$router->get('/admin/academics/event/create', 'controllers/admin/academics/event/create.php')->only('admin');
$router->post('/admin/academics/event/store', 'controllers/admin/academics/event/store.php')->only('admin');
$router->get('/admin/academics/year/show', 'controllers/admin/academics/year/show.php')->only('admin');
$router->get('/admin/academics/year/create', 'controllers/admin/academics/year/create.php')->only('admin');
$router->post('/admin/academics/year/store', 'controllers/admin/academics/year/store.php')->only('admin');
$router->get('/admin/academics/terms/show', 'controllers/admin/academics/terms/show.php')->only('admin');
$router->get('/admin/academics/timetable', 'controllers/admin/academics/timetable/show.php')->only('admin');
$router->get('/admin/academics/timetable/create', 'controllers/admin/academics/timetable/create.php')->only('admin');
$router->post('/admin/academics/timetable/store', 'controllers/admin/academics/timetable/store.php')->only('admin');
$router->get('/test', 'controllers/test.php')->only('admin');
$router->post('/test', 'controllers/test.php')->only('admin');


/* ------------------- Teacher Routes ------------------- */
$router->get('/facilitator/dashboard', 'controllers/facilitator/index.php')->only('facilitator');
$router->get('/facilitator/timetable', 'controllers/facilitator/timetable/show.php')->only('facilitator');
$router->get('/facilitator/calendar', 'controllers/facilitator/calendar/show.php')->only('facilitator');
$router->get('/facilitator/assessment', 'controllers/facilitator/assessment/show.php')->only('facilitator');
$router->get('/facilitator/assessment/single', 'controllers/facilitator/assessment/single/show.php')->only('facilitator');
$router->post('/facilitator/assessment', 'controllers/facilitator/assessment/store.php')->only('facilitator');
$router->post('/facilitator/attendance/mark', 'controllers/facilitator/attendance/store.php')->only('facilitator');
$router->get('/facilitator/assignments', 'controllers/facilitator/assignment/show.php')->only('facilitator');
$router->get('/facilitator/assignment/add', 'controllers/facilitator/assignment/create.php')->only('facilitator');
$router->get('/facilitator/assignment', 'controllers/facilitator/assignment/single/show.php')->only('facilitator');
$router->post('/facilitator/assignment', 'controllers/facilitator/assignment/store.php')->only('facilitator');
$router->get('/facilitator/resources', 'controllers/facilitator/resources/show.php')->only('facilitator');
$router->get('/facilitator/resources/add', 'controllers/facilitator/resources/create.php')->only('facilitator');
$router->post('/facilitator/resources', 'controllers/facilitator/resources/store.php')->only('facilitator');

/* ------------------- Student Routes ------------------- */
$router->get('/student/dashboard', 'controllers/student/index.php')->only('student');
$router->get('/student/timetable', 'controllers/student/timetable/show.php')->only('student');
$router->get('/student/calendar', 'controllers/student/calendar/show.php')->only('student');
$router->get('/student/assignments', 'controllers/student/assignment/show.php')->only('student');
$router->get('/student/assignment', 'controllers/student/assignment/single/show.php')->only('student');
$router->post('/student/assignment/submit', 'controllers/student/assignment/single/submit.php')->only('student');
$router->get('/student/assessment', 'controllers/student/assessment/show.php')->only('student');
$router->get('/student/resources', 'controllers/student/resources/show.php')->only('student');

/* ------------------- Parent Routes ------------------- */
$router->get('/parent/dashboard', 'controllers/parent/index.php')->only('parent');
$router->get('/parent/timetable', 'controllers/parent/timetable/show.php')->only('parent');
$router->get('/parent/calendar', 'controllers/parent/calendar/show.php')->only('parent');
$router->get('/parent/assessment', 'controllers/parent/assessment/show.php')->only('parent');


