<main class="home-section items-start bg-gray-200 rounded py-5">

    <div class="container mx-auto p-6">

        <!-- Assignment Details Section -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <!-- Assignment Title -->
            <div class="flex justify-between">
                <h2 class="text-2xl font-bold mb-2"><?= $assignment['title'] ?></h2>
                <a href="/facilitator/assignments" class="bg-red-500 text-white py-2 px-3 flex justify-between items-center ">
                    <i class='bx bx-chevron-left text-lg'></i>
                    <button class="text-sm">Go Back</button>
                </a>
            </div>
            <!-- Assignment Date -->
            <p class="text-sm text-gray-500 mb-2">Posted on: <?= $assignment['date_posted'] ?></p>
            <!-- Assignment Due Date -->
            <p class="text-sm text-gray-500 mb-4">Submit Before: <?= $assignment['due_date'] ?></p>
            <!-- Assignment Description -->
            <p class="text-gray-700 mb-4">
                <?= $assignment['description'] ?>
            </p>

            <!-- File Attachment Section -->
            <?php if ($assignment['file_path'] != NULL): ?>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold mb-2">Attached File:</h3>
                    <!-- Display the file if available -->
                    <a href="/<?= $assignment['file_path']?>" class="text-blue-500 underline">Download Assignment File</a>
                </div>
            <?php endif ?>
        </div>


        <h3 class="text-xl font-bold mb-4">Student Solutions</h3>

        <div class="grid grid-cols-3 gap-6">
            <?php foreach ($submitted_solutions as $submitted_solution): ?>
                <!-- Student's Submission -->
                <div class="bg-white shadow-md rounded-lg p-6">

                    <h2 class="text-lg"><?= $submitted_solution['first_name'] ?> <?= $submitted_solution['other_name'] ?> <?= $submitted_solution['last_name'] ?></h2>
                    <a href="/<?= $submitted_solution['solution_file_path'] ?>" class="text-blue-500 underline" target="_blank">Submitted Solution</a>

                </div>
                <?php endforeach ?>
        </div>

</main>