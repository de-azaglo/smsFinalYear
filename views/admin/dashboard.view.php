<main class="home-section items-center bg-gray-200 flex-col py-5 rounded">
    <div class="card-container flex justify-between w-11/12">
        <div class="card py-4 px-5 flex flex-row items-center">
            <div class="bg-gray-100 flex justify-center items-center p-2 rounded">
                <i class='bx bxs-graduation text-red-400 text-3xl'></i>
            </div>
            <div class="caption ml-4">
                <h3 class="text-2xl font-semibold">
                    <?= /** @var int $number_of_student */
                    $number_of_student ? : 0 ?>
                </h3>
                <p class="text-xs text-gray-500">
                    Total Student
                </p>
            </div>
        </div>
        <div class="card py-4 px-5 flex flex-row items-center">
            <div class="bg-gray-100 flex justify-center items-center p-2 rounded">
                <i class='bx bx-log-in text-red-400 text-3xl'></i>
            </div>
            <div class="caption ml-4">
                <h3 class="text-2xl font-semibold">
                    <?= /** @var int $students_present */
                    $students_present ? : 0 ?>
                </h3>
                <p class="text-xs text-gray-500">
                    Student Present Today
                </p>
            </div>
        </div>
        <div class="card py-4 px-5 flex flex-row items-center">
            <div class="bg-gray-100 flex justify-center items-center p-2 rounded">
                <i class='bx bx-user-pin text-red-400 text-3xl'></i>
            </div>
            <div class="caption ml-4">
                <h3 class="text-2xl font-semibold">
                    <?= /** @var int $number_of_teachers */
                    $number_of_teachers ? : 0 ?>
                </h3>
                <p class="text-xs text-gray-500">
                    Total Teachers
                </p>
            </div>
        </div>
        <div class="card py-4 px-5 flex flex-row items-center">
            <div class="bg-gray-100 flex justify-center items-center p-2 rounded">
                <i class='bx bx bx-log-in text-red-400 text-3xl'></i>
            </div>
            <div class="caption ml-4">
                <h3 class="text-2xl font-semibold">
                    <?= /** @var int $number_of_teachers */
                        $number_of_teachers ? : 0 ?>
                </h3>
                <p class="text-xs text-gray-500">
                    Teachers Present Today
                </p>
            </div>
        </div>
    </div>
    <div class="w-11/12 flex mt-4 justify-between">
        <div class="card w-4/5 bg-white p-3 mr-5">
            <h3 class="mb-2 text-red-500 text-lg">Teacher's List</h3>
            <hr>
            <table class="table mt-3">
                <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Teacher Role</th>
                </tr>
                </thead>

                <tbody>
                <?php
                /** @var array $teachers */
                foreach ($teachers as $teacher) : ?>
                    <tr>
                        <td class="text-gray-600"><?= $teacher['first_name'] ?> <?= $teacher['other_name'] ?> <?=
                            $teacher['last_name']
                            ?></td>
                        <td class="text-gray-600"><?= $teacher['email'] ?></td>
                        <td class="text-gray-600"><?= $teacher['teacher_type'] ?></td>
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
    <div class="w-11/12 flex mt-4 justify-between">
        <div class="card w-4/12 bg-white p-3">
            <h3 class="mb-2 text-red-500 text-lg">Students</h3>
            <hr>
            <canvas id="myChart"></canvas>
        </div>
        <div class=" card w-4/5 ml-5 bg-white p-3">
            <h3 class="mb-2 text-red-500 text-lg">Student's List</h3>
            <hr>
            <table class="table  mt-3">
                <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Student ID</th>
                    <th>Gender</th>
                    <th>Class</th>
                </tr>
                </thead>

                <tbody>
                <?php
                /** @var array $teachers */
                foreach ($students as $student) : ?>
                    <tr>
                        <td><?= $student['first_name'] ?> <?= $student['other_name'] ?> <?= $student['last_name']
                            ?></td>
                        <td><?= $student['user_number'] ?></td>
                        <td><?= $student['gender'] ?></td>
                        <td><?= $student['class_id'] ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Load Chart.js from CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Male: <?= $male_student?>', 'Female: <?= $female_student?>'],
            datasets: [{
                label: 'My First Dataset',
                data: ['<?= $male_student?>', '<?= $female_student?>'],
                backgroundColor: [
                    'rgba(165,180,252,1)',
                    'rgba(252,211,77,1)'
                ],
                hoverOffset: 4
            }]
        }
    });
</script>