<main class="home-section items-start bg-gray-200 rounded py-5">

    <div class="container mx-auto p-6">

        <!-- Assignment Details Section -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <!-- Assignment Title -->
            <div class="flex justify-between">
                <h2 class="text-2xl font-bold mb-2"><?= $assignment['title'] ?></h2>
                <a href="/student/assignments" class="bg-red-500 text-white py-2 px-3 flex justify-between items-center ">
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
                    <a href="path_to_file" class="text-blue-500 underline">Download Assignment File</a>
                </div>
            <?php endif ?>
        </div>

        <!-- Submission Form -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h3 class="text-xl font-bold mb-4">Submit Your Solution</h3>
            <form action="/student/assignment/submit" method="POST" enctype="multipart/form-data">
                <!-- Hidden field to pass assignment ID -->
                <input type="hidden" name="assignment_id" value="<?= $assignment['id'] ?>">

                <!-- Solution Text Area -->
                <div class="mb-4">
                    <label for="solution_text" class="block text-sm font-medium text-gray-700">Your Solution</label>
                    <!-- File Upload -->
                    <div class="mb-4">
                        <input type="file" name="solution_file" id="solution_file" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                        <?php if (is_submitted($assignment['id'], $_SESSION['user']['user_number'])): ?>
                            <p class="text-red-500 text-sm">Solution submitted already</p>
                        <?php endif ?>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>

                    <button
                        type="submit"
                        class="px-4 py-2 text-white rounded
                        <?= is_submitted($assignment['id'], $_SESSION['user']['user_number']) ? 'bg-gray-400 cursor-not-allowed' : 'hover:bg-blue-600 bg-blue-500' ?>
                        "
                        <?= is_submitted($assignment['id'], $_SESSION['user']['user_number']) ? 'disabled' : '' ?>>
                        Submit Assignment
                    </button>
                </div>
            </form>
        </div>

        <?php if ($submitted_solution): ?>
            <!-- Student's Submission -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4">Your Solution</h3>
                <a href="/<?= $submitted_solution['solution_file_path'] ?>" target="_blank">Submitted Solution </a>
            </div>
        <?php endif ?>
    </div>

</main>