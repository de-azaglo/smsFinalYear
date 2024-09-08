<main class="home-section items-start bg-gray-200 rounded py-5 h-100">
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Assignments</h2>
            <a href="/facilitator/assignment/add">
                <button class="bg-red-500 text-white p-2">Add Assignment</button>
            </a>

        </div>

        <div class="grid grid-cols-3 gap-6">
            <?php foreach ($assignments as $assignment): ?>
                <!-- Assignment Card -->
                <a href="/facilitator/assignment?id=<?= $assignment['id'] ?>">
                    <div class="border p-4 rounded-lg shadow-lg bg-white">

                        <div class="flex justify-between items-center mt-2>
                            <p class=" text-sm text-gray-500"><?= $assignment['due_date'] ?></p>
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <h3 class="text-lg font-semibold"><?= $assignment['title'] ?></h3>
                            <p class="text-sm text-gray-500"><?= $assignment['subject_title'] ?></p>
                        </div>
                        <p class="mt-1 text-gray-600"><?= $assignment['description'] ?></p>
                    </div>
                </a>
            <?php endforeach ?>

            <!-- Add more cards as needed -->
        </div>
    </div>

</main>