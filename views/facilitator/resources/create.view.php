<main class="home-section items-start bg-gray-200 rounded py-5 h-100">

    <div class=" p-4 bg-white w-11/12 flex flex-col items-center">
        <div class="flex justify-between items-center pb-3 border-b-2 border-red-500 w-full">
            <h1 class="text-3xl font-bold">Resources</h1>
            <!-- <a href="/admin/academics/year/create">
                <button class="bg-red-500 text-white p-2">Print Calendar</button>
            </a> -->
        </div>

        <!-- assignments.html -->
        <div class="container mx-auto mt-8">
            <h2 class="text-2xl font-bold">Upload Learning Material</h2>
            <form id="postAssignmentForm" action="/facilitator/resources" method="POST" enctype="multipart/form-data" class="mt-4">
                <input type="text" name="title" placeholder="Material Title" class="block w-full p-2 border border-gray-300 rounded mb-4" required>
                <textarea name="description" placeholder="Material Description" class="block w-full p-2 border border-gray-300 rounded mb-4" required></textarea>
                <select name="subject_id" class="block w-full p-2 border border-gray-300 rounded mb-4" required>
                    <!-- Options dynamically populated from the subjects table -->
                    <?php foreach ($subjects as $subject): ?>
                        <option value="<?= $subject['id'] ?>"><?= $subject['subject_title'] ?></option>
                    <?php endforeach ?>
                </select>
                <input type="file" name="file" class="block w-full p-2 border border-gray-300 rounded mb-4" required>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Upload Material</button>
            </form>
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