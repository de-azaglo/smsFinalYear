
<main class="home-section items-center bg-gray-200 flex-col py-5 rounded">
    <div class="card-container flex justify-between w-11/12">
        <div class="card py-4 pl-6 pr-20 flex flex-row items-center" id="grade-card">
                <h3 class="text-2xl font-semibold">
                     <?= $grade['grade_name'] ?>
                </h3>
        </div>

        <div class="card py-4 px-5 flex flex-row items-center">
            <div class="bg-gray-100 flex justify-center items-center p-2 rounded">
                <i class='bx bx-log-in text-red-400 text-4xl'></i>
            </div>
            <div class="caption ml-4">
                <h3 class="text-2xl font-semibold">
                    <?= $grade['number_of_student'] ?>
                </h3>
                <p class="text-sm text-gray-500">
                    Total Students
                </p>
            </div>
        </div>

        <div class="card py-4 px-5 flex flex-row items-center">
            <div class="bg-gray-100 flex justify-center items-center p-2 rounded">
                <i class='bx bx-log-in text-red-400 text-4xl'></i>
            </div>
            <div class="caption ml-4">
                <h3 class="text-2xl font-semibold">
                    <?= /** @var int $students_present */
                    $students_present ? : 0 ?>
                </h3>
                <p class="text-sm text-gray-500">
                    Student Present Today
                </p>
            </div>
        </div>



        <div class="card py-4 px-5 flex flex-row items-center">
            <div class="bg-gray-100 flex justify-center items-center p-2 rounded">
                <i class='bx bx bx-log-in text-red-400 text-4xl'></i>
            </div>
            <div class="caption ml-4">
                <h3 class="text-2xl font-semibold">
                    6
                </h3>
                <p class="text-sm text-gray-500">
                    Homeworks to give
                </p>
            </div>
        </div>
    </div>

    <div class="w-11/12 flex mt-4 justify-between">
        <div class=" card w-4/5 mr-5 bg-white p-3">
            <h3 class="mb-2 text-red-500 text-lg">Student's List</h3>
            <hr>
            <table class="table  mt-3">
                <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Student ID</th>
                    <th>Status</th>
                    <th>Mark Attendance</th>

                </tr>
                </thead>

                <tbody>
                <?php

                /** @var array $teachers */
                foreach ($students as $student) : ?>
                    <tr >
                        <td><?= $student['first_name'] ?> <?= $student['other_name'] ?> <?= $student['last_name']
                            ?></td>
                        <td class="student_id"><?= $student['user_number'] ?></td>
                        <td>
                            <?= checkStatus($today, $student['user_number'], $grade['id'])?>
                        </td>
                        <td class="flex justify-around"> 
                            <button class="action-btn btn btn-success" data-status="Present">Present</button>
                            <button class="action-btn btn btn-danger" data-status="Absent">Absent</button>
                        </td>

                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="card w-4/12 bg-white p-3">
            <h3 class="mb-2 text-red-500 text-lg">Events Today</h3>
            <hr>
            <ul>
                <?php if(empty($events)){?>
                    <p class="text-center mt-3">No Event Today</p>
                <?php } else {
                    foreach ($events as $event):
                        ?>
                        <li class=" my-3 p-2 border-l-4 <?= $event['event_type'] === 'Public Holiday' ? 'border-yellow-300' :
                            'border-indigo-300'
                        ?>">
                            <h2 class="text-lg font-medium"><?=$event['event_name']?></h2>
                            <p class="text-sm"><?=$event['event_type']?></p>
                        </li>
                    <?php endforeach;}?>
            </ul>
        </div>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    document.querySelectorAll('.action-btn').forEach(button =>{

        button.addEventListener('click', function(){
            let row = this.closest('tr');
            let status = this.getAttribute('data-status')

            let student_id = row.querySelector('.student_id').innerText;
            let class_id = <?=$grade['id']?>;
            let academic_year = "<?=$academic_year?>";
            let term = <?=$active_term?>;



            $.ajax({
                    url: "/facilitator/attendance/mark",
                    type: "POST",
                    data: {
                        student_id: student_id,
                        class_id: class_id,
                        academic_year: academic_year,
                        term: term,
                        status: status
                    },
                    success: function() {
                        location.reload();
                    },
                    error: function (xhr, status, error){
                        console.error("AJAX Error: " + status + "-" + error);
                    }
                })
        })



    })
</script>
