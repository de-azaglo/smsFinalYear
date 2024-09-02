<style>
    .table-container {
        position: relative;
        width: 100%;
        /* Adjust as needed */
        overflow-x: auto;
    }

    table {
        table-layout: fixed;
        width: 100%;
    }


    th,
    td {
        padding: 8px 12px;
        border: 1px solid #ddd;
        white-space: nowrap;
        /* Prevents the text from wrapping */
    }

    th {
        width: 30vw;
    }

    .fixed-column {
        position: sticky;
        left: 0;
        background-color: white !important;
        /* Adjust background as needed */
        z-index: auto;
        border-right: 2px solid #ddd;
        width: 20vw;
        /* Optional: Enhances the separation of the fixed column */
    }


    #popup {
        display: none;
        position: absolute;
        z-index: 1;
    }

    .overlay {
        width: 100vw;
        height: 70vh;
        background-color: rgb(0, 0, 0, 0.5)
    }

    form .header {
        border-bottom: 1px solid red;
        margin-bottom: 2vh;
    }

    form .header i {
        cursor: pointer;
    }

    form .content {
        margin-left: 2vw;
        margin-right: 2vw;
    }
</style>
<?php
if (isset($_GET['term'])) {
    $term_id = $_GET['term'];
} else {
    $term_id = 1;
}
?>
<main class="home-section items-start bg-gray-200 rounded py-5">
    <div class=" p-4 bg-white w-5/6 flex flex-col items-center">
        <div class="flex justify-between items-center pb-3 border-b-2 border-red-500 w-full">
            <h1 class="text-3xl font-bold"><?= $grade['grade_name'] ?></h1>
            <div>
                <?php foreach ($terms as $term) : ?>
                    <a href="/admin/assessment?term=<?= $term['id'] ?>" class="append-param" data-param="grade" data-value="<?= $grade['id'] ?>">
                        <button class=" <?= $term['id'] == $term_id ? 'bg-red-500 text-white' : '' ?> rounded p-2"><?= $term['term_name'] ?></button>
                    </a>
                <?php endforeach ?>
            </div>
        </div>

        <div class="mt-3 flex justify-between w-full bg-gray-100 rounded-2xl py-10px">
            <?php

            foreach ($grades as $grade) : ?>
                <a href="/admin/assessment?grade=<?= $grade['id'] ?>" class="append-param" data-param="term" data-value="<?= $term['id'] ?>">
                    <button class=" <?= $grade['id'] == $class_id ? 'active' : '' ?> rounded-2xl hover:bg-red-200  py-2 px-3"><?= $grade['grade_name'] ?></button>
                </a>

            <?php endforeach ?>
        </div>

        <?php if (empty($students)) { ?>
            <p class="bg-red-200 text-center inline py-2 px-3 mt-2 rounded-xl">No Students</p>
        <?php } else { ?>
            <div class="table-container">
                <table class="table-bordered mt-3 ">
                    <thead>
                        <tr>
                            <th class="fixed-column" rowspan="2">Student Name</th>
                            <?php foreach ($subjects as $subject): ?>
                                <th style="text-align: center;" colspan="3"><?= $subject['subject_title'] ?></th>
                            <?php endforeach ?>
                        </tr>
                        <tr>
                            <?php foreach ($subjects as $subject): ?>
                                <th>Class Score</th>
                                <th>Exam Score</th>
                                <th>Total Score</th>
                            <?php endforeach ?>
                        </tr>

                    </thead>



                    <tbody>
                        <?php foreach ($students as $student) : ?>
                            <!-- <tr>
                                <td>Class Score</td>
                                <td>Exam Score</td>
                            </tr> -->
                            <tr>
                                <td class="fixed-column"><?= $student['first_name'] ?> <?= $student['other_name'] ?> <?= $student['last_name'] ?></td>

                                <?php foreach ($subjects as $subject): ?>
                                    <td class="score_cell" data-score="Class" data-student="<?= $student['user_number'] ?>" data-subject="<?= $subject['id'] ?>" data-student-name="<?= $student['first_name'] ?>" data-subject-title="<?= $subject['subject_title'] ?>">
                                        <?php $class_score = getScore($student['user_number'], $subject['id'], 'class_score', $term_id);

                                        if ($class_score === false) {
                                            $class_score = [];
                                        }
                                        if (!isset($class_score['class_score'])) {
                                            $class_score['class_score'] = 0;
                                        }
                                        echo $class_score['class_score'];

                                        ?>
                                    </td>
                                    <td class="score_cell" data-score="Exam" data-student="<?= $student['user_number'] ?>" data-subject="<?= $subject['id'] ?>" data-student-name="<?= $student['first_name'] ?>" data-subject-title="<?= $subject['subject_title'] ?>">
                                        <?php
                                        $exam_score = getScore($student['user_number'], $subject['id'], 'exam_weighted', $term_id);

                                        if ($exam_score === false) {
                                            $exam_score = [];
                                        }

                                        if (!isset($exam_score['exam_weighted'])) {
                                            $exam_score['exam_weighted'] = 0;
                                        }
                                        echo $exam_score['exam_weighted'];
                                        ?>

                                    </td>
                                    <td>
                                        <?php
                                        $final_score = getScore($student['user_number'], $subject['id'],'final_score', $term_id);

                                        if ($final_score === false) {
                                            $final_score = [];
                                        }

                                        if (!isset($final_score['final_score'])) {
                                            $final_score['final_score'] = 0;
                                        }
                                        echo $final_score['final_score'];
                                        ?>
                                    </td>
                                <?php endforeach ?>


                            </tr>
                        <?php endforeach ?>

                    <?php } ?>

                    </tbody>
                </table>
            </div>