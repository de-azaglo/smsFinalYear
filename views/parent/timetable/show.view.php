
<main class="home-section items-start bg-gray-200 rounded py-5">

    <?php


    $class = $grade['id'];
    ?>
    <style>
        .tableRow {
            display: grid;
            grid-template-columns: repeat(10, 1fr);
        }
    </style>
    <div class=" p-4 bg-white w-11/12 flex flex-col items-center">
        <div class="flex justify-between items-center pb-3 border-b-2 border-red-500 w-full">
            <h1 class="text-3xl font-bold"><?= $grade['grade_name'] ?></h1>
        </div>


        <div class="flex flex-col w-100">
            <div class="tableRow w-100 mt-3">
                <div class="cells border-black border flex flex-col items-center justify-center">
                    <p>Day</p>
                </div>
                <?php foreach ($times as $time) : ?>
                    <div class="cells border-black border flex flex-col items-center justify-center text-sm">
                        <p> <?= $time['start_time'] ?></p>
                        <p> - </p>
                        <p><?= $time['end_time'] ?></p>
                    </div>
                <?php endforeach ?>
            </div>


            <?php foreach ($days as $day) : ?>

                <div class="tableRow w-100">

                    <div class="cells border-black border px-2 py-4 ">
                        <p class="text-sm"><?= $day['day'] ?></p>
                    </div>
                    <?php foreach ($times as $time) :
                        $subject = getSubject($time['id'], $day['id'], $class);

                        ?>

                        <div class="cells border-black border flex flex-col items-center justify-center text-sm">
                            <p><?= $subject['subject_title'] ?? 'No Lesson' ?></p>
                        </div>

                    <?php endforeach ?>

                </div>

            <?php endforeach ?>

        </div>
    </div>


    </tbody>
    </table>
    </div>
</main>