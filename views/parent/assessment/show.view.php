<style>




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
<div id="popup">
    <div class="overlay flex justify-center items-center">
        <form action="/facilitator/assessment" class="flex flex-col bg-white p-2 pb-4 rounded items-center" method="POST">
            <div class="flex justify-between items-center w-100 header">
                <h2 class="text-center text-base font-bold" id="title"></h2>
                <i class="bx bxs-x-circle" id="close-btn"></i>
            </div>
            <div class="content flex flex-col items-center ">
                <h1 class="text-lg font-bold" id="head-message"></h1>
                <p class="text-xs" id="content-message"></p>
                <div class="mt-2">
                    <input type="text" name="subject_id" id="subjectID" hidden>
                    <input type="text" name="student_id" id="studentID" hidden>
                    <input type="number" class="p-1" name="score" style="border: 1px solid red;" id="scoreInput">
                    <input class="mt-2 bg-red-500 text-white  p-1" type="submit" value="Submit">
                </div>
            </div>

        </form>
    </div>
</div>
<main class="home-section items-start bg-gray-200 rounded py-5 h-100">

    <div class=" p-4 bg-white w-11/12 flex flex-col items-center">
        <div class="flex justify-between items-center pb-3 border-b-2 border-red-500 w-full">
            <h1 class="text-3xl font-bold">Assessment</h1>
            <!-- <a href="/admin/academics/year/create">
                <button class="bg-red-500 text-white p-2">Print Calendar</button>
            </a> -->
        </div>



        <?php if (empty($student)) { ?>
            <p class="bg-red-200 text-center inline py-2 px-3 mt-2 rounded-xl">No Report</p>
        <?php } else { ?>
            <div class="grid grid-cols-3 gap-x-6 gap-y-5 self-start w-100">
                <p class="text-lg">Name: <strong><?= $student['first_name'] ?> <?= $student['other_name'] ?> <?= $student['last_name'] ?> </strong></p>
                <p class="text-lg">Year: <strong><?= $year['year'] ?></strong></p>
                <p class="text-lg">Class: <strong>Grade <?= $student['class_id'] ?> </strong></p>
                <p class="text-lg">No. of Learners: <strong><?= $grade['number_of_student'] ?></strong></p>
                <p class="text-lg">Term: <strong><?= $terms['term_name'] ?></strong></p>
                <p class="text-lg">Position: <strong><?= getOverallPosition($student['user_number'], $scores) ?></strong></p>
            </div>


            <div class="table-container">
                <table class="table-bordered mt-3 ">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Class Score (40%)</th>
                            <th>Exam Score (60%)</th>
                            <th>Total Score (100%)</th>
                            <th>Grade</th>
                            <th>Position</th>


                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($assessments as $assessment): ?>
                            <tr>
                                <td ><?= $assessment['subject_title'] ?> </td>
                                <td ><?= $assessment['class_score'] ?> </td>
                                <td ><?= $assessment['exam_weighted'] ?> </td>
                                <td ><?= $assessment['final_score'] ?> </td>
                                <td ><?= getGrade($assessment['final_score']) ?> </td>
                                <td ><?= getStudentPositionInSubject($assessment['subject_id'], $assessment['user_number'], $scores)?> </td>

                                


                            </tr>
                        <?php endforeach ?>

                    <?php } ?>

                    </tbody>
                </table>
            </div>


    </div>
</main>

<script>
    document.querySelectorAll('.score_cell').forEach(cell => {
        cell.addEventListener('click', function() {
            let score = this.getAttribute('data-score');
            let student = this.getAttribute('data-student');
            let studentName = this.getAttribute('data-student-name');
            let subjectTitle = this.getAttribute('data-subject-title');
            let subject = this.getAttribute('data-subject');
            let scoreInput = document.getElementById('scoreInput')

            document.getElementById('popup').style.display = "block"
            document.getElementById('subjectID').setAttribute('value', `${subject}`)
            document.getElementById('studentID').setAttribute('value', `${student}`)
            if (score === 'Class') {
                document.getElementById('title').innerHTML = `Class Score-${subjectTitle}`
                document.getElementById('head-message').innerHTML = `Input Mid-term Score for ${studentName}`
                document.getElementById('content-message').innerHTML = '(40% of the scores will be entered for Class Scores)'
                scoreInput.setAttribute('name', 'class_score')


            } else {
                document.getElementById('title').innerHTML = `Exam Score-${subjectTitle}`
                document.getElementById('head-message').innerHTML = `Input Exam Score for ${studentName}`
                document.getElementById('content-message').innerHTML = '(60% of the scores will be entered for Exam Scores)'
                scoreInput.setAttribute('name', 'exam_score')
            }
        })
    })

    document.getElementById('close-btn').addEventListener('click', function() {
        document.getElementById('popup').style.display = "none"
    })
</script>