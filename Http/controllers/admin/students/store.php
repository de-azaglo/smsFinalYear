<?php

use Core\Database;

$db = new Database();

// dd($_POST);


$user_number = generateUserId('student', 'students');
error_log($user_number);
$student_mail = $user_number."@gmail.com";

// Guardian's Information
$guardian_user_number = generateUserId('parent', 'guardians');
error_log($guardian_user_number);
$guardian_type = $_POST['guardian_type'];
$guardian_name = $_POST['guardian_name'];
$guardian_email = $_POST['guardian_email'];
$guardian_contact = $_POST['guardian_contact'];
$guardian_occupation = $_POST['guardian_occupation'];
$address = $_POST['address'];



// Insert into 'guardians' database
$db->query("INSERT INTO guardians ( user_number, guardian_name, guardian_type, contact, occupation, email, address) VALUES (:user_number, :guardian_name, :guardian_type, :contact, :occupation, :email, :address)", [
    'user_number' => $guardian_user_number,
    'guardian_name' => $guardian_name,
    'guardian_type' => $guardian_type,
    'contact' => $guardian_contact,
    'occupation' => $guardian_type,
    'email' => $guardian_email,
    'address' => $address
]);

$db->query("INSERT INTO users (user_number, user_type, last_name, email, password) VALUES(:user_number, :user_type, :last_name, :email, :password)", [
    'user_number' => $guardian_user_number,
    'user_type' => 'parent',
    'last_name' => $guardian_name,
    'email' => $guardian_email,
    'password' => 'default'
]);


// Student's Information
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$other_name = $_POST['other_name'];
$gender = $_POST['gender'];
$date_of_birth = $_POST['date_of_birth'];
$date_of_admission = $_POST['date_of_admission'];
$height = $_POST['height'];
$blood_group = $_POST['blood_group'];
$grade = $_POST['grade'];

// Insert into 'students' database
$db->query("INSERT INTO students ( user_number, first_name, last_name, other_name, gender, date_of_birth, date_of_admission, height, blood_group, class_id, address, parent_id) VALUES (:user_number, :first_name, :last_name, :other_name, :gender, :date_of_birth, :date_of_admission, :height, :blood_group, :class_id, :address, :parent_id)", [
    'user_number' => $user_number,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'other_name' => $other_name,
    'gender' => $gender,
    'date_of_birth' => $date_of_birth,
    'date_of_admission' => $date_of_admission,
    'height' => $height,
    'blood_group' => $blood_group,
    'class_id' => $grade,
    'address' => $address,
    'parent_id' => $guardian_user_number
]);

$db->query("INSERT INTO users (user_number, user_type, email, password, last_name) VALUES(:user_number, :user_type, :email, :password, :last_name)", [
    'user_number' => $user_number,
    'user_type' => 'student',
    'email' => $student_mail,
    'password' => 'default',
    'last_name' => $last_name
]);

 $db->query("UPDATE grades SET number_of_student = number_of_student + 1 WHERE id = :class_id",[
     'class_id' => $grade
]);




$alert = "{$first_name} added to Grade {$grade}.";


header("Location: /admin/students/create?alert=" . urlencode($alert));
die();



