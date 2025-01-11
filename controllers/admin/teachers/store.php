<?php

use Core\Database;

$db = new Database();

// dd($_POST);


$user_number = generateUserId('teacher', 'teachers');
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$other_name = $_POST['other_name'];
$teacher_type = $_POST['teacher_type'];

error_log($teacher_type);

if (isset($_POST['class'])) {
    $class = $_POST['class'];
}
if (isset($_POST['subject'])) {
    $subject = $_POST['subject'];
}
$qualification = $_POST['qualification'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$date_of_birth = $_POST['date_of_birth'];
$date_of_employment = $_POST['date_of_employment'];




$targetDir = base_path("public/resource/document/");

$targetFile = $targetDir . basename($user_number . $_FILES["cv"]["name"]);


//  dd($targetFile);



if (move_uploaded_file($_FILES["cv"]["tmp_name"], $targetFile)) {

    $cv_path = $db->quote($targetFile);

    $db->query("INSERT INTO teachers ( user_number, first_name, last_name, other_name, teacher_type, qualification, email, date_of_birth, date_of_employment, cv, contact, address) VALUES (:user_number, :first_name, :last_name, :other_name, :teacher_type, :qualification, :email, :date_of_birth, :date_of_employment, :cv_path, :contact, :address)", [
        'user_number' => $user_number,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'other_name' => $other_name,
        'teacher_type' => $teacher_type,
        'qualification' => $qualification,
        'email' => $email,
        'date_of_birth' => $date_of_birth,
        'date_of_employment' => $date_of_employment,
        'cv_path' => $cv_path,
        'contact' => $contact,
        'address' => $address
    ]);

    $db->query("INSERT INTO users (user_number, last_name, user_type, email, password) VALUES(:user_number,:last_name, :user_type, :email, :password)", [
        'user_number' => $user_number,
        'last_name' => $last_name,
        'user_type' => 'facilitator',
        'email' => $email,
        'password' => 'default'
    ]);

    if ($teacher_type === "class_teacher") {
        $db->query("INSERT INTO class_teachers (user_number, class_id) VALUES(:user_number, :class_id)", [
            'user_number' => $user_number,
            'class_id' => $class
        ]);

        $db->query("UPDATE grades SET class_teacher_number = :user_number WHERE id = :class_id", [
            'user_number' => $user_number,
            'class_id' => $class
        ]);

        $alert = "{$first_name} has been added as Grade {$class_id} Teacher.";
    } elseif ($teacher_type === "subject_teacher") {
        $db->query("INSERT INTO subject_teachers (user_number, subject) VALUES(:user_number, :subject)", [
            'user_number' => $user_number,
            'subject' => $subject
        ]);

        $alert = "{$first_name} has been added as {$subject} Teacher.";
    }


    header("Location: /admin/teachers/create?alert=" . urlencode($alert));

    die();
}
