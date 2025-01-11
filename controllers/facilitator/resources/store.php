 <?php

    use Core\Database;

    $db = new Database();
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $uploaded_at = date('Y-m-d');
    $subject_id = $_POST['subject_id'];
    $teacher_id = $_SESSION['user']['user_number'];
    $grade = $db->query('SELECT * FROM grades WHERE class_teacher_number = :user_id', [
        'user_id' => $_SESSION['user']['user_number']
    ])->find();

    // Handle file upload
    $file_path = NULL;
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $file_path = './resource/uploads/assignments/' . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $file_path);
    }
    $db->query('INSERT INTO learning_materials (title, description, uploaded_at, subject_id, teacher_id, file_path, class_id)
 VALUES (:title, :description, :uploaded_at, :subject_id, :teacher_id, :file_path, :class_id)',[
        'title' => $title,
        'description' => $description,
        'uploaded_at' => $uploaded_at,
        'subject_id' => $subject_id,
        'teacher_id' => $teacher_id,
        'file_path' => $file_path,
        'class_id' => $grade['id']
 ]);

 header("location: /facilitator/resources");
 die();


