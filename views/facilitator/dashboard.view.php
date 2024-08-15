<main class="home-section items-center bg-gray-200 flex-col py-5 rounded">
    <div class="card-container flex justify-between w-11/12">
        <div class="card py-4 px-5 flex flex-row items-center ">

                <h3 class="text-2xl font-semibold">
                     <?= $grade['grade_name'] ?>
                </h3>
                <p class="text-sm text-gray-500">
                    Total Student
                </p>

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
                <i class='bx bx-user-pin text-red-400 text-4xl'></i>
            </div>
            <div class="caption ml-4">
                <h3 class="text-2xl font-semibold">
                    <?= /** @var int $number_of_teachers */
                    $number_of_teachers ? : 0 ?>
                </h3>
                <p class="text-sm text-gray-500">
                    Total Teachers
                </p>
            </div>
        </div>
        <div class="card py-4 px-5 flex flex-row items-center">
            <div class="bg-gray-100 flex justify-center items-center p-2 rounded">
                <i class='bx bx bx-log-in text-red-400 text-4xl'></i>
            </div>
            <div class="caption ml-4">
                <h3 class="text-2xl font-semibold">
                    <?= /** @var int $number_of_teachers */
                    $number_of_teachers ? : 0 ?>
                </h3>
                <p class="text-sm text-gray-500">
                    Teachers Present Today
                </p>
            </div>
        </div>
    </div>
</main>
