<main class="home-section items-start bg-gray-200 rounded py-5 h-100">
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Resources</h2>
            <a href="/facilitator/resources/add">
                <button class="bg-red-500 text-white p-2">Upload Material</button>
            </a>

        </div>
        <?php if (empty($resources)): ?>
            <p class="text-center text-lg mt-5">No Resources posted</p>
        <?php endif ?>
        <div class="grid grid-cols-3 gap-6">

            <?php foreach ($resources as $resource): ?>
                <!-- Resource Card -->
                <div class="border p-4 rounded-lg shadow-lg bg-white">

                    <div class="flex justify-between items-center mt-2">
                        <p class="text-sm text-gray-500"><?= $resource['uploaded_at'] ?></p>
                        <p class="text-sm text-gray-500"><?= $resource['subject_title'] ?></p>

                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <h3 class="text-lg font-bold"><?= $resource['title'] ?></h3>
                    </div>
                    <p class="mt-1 text-gray-600"><?= $resource['description'] ?></p>

                    <?php if ($resource['file_path'] != NULL): ?>
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold mt-2">Attached File:</h3>
                            <!-- Display the file if available -->
                            <a href="/<?= $resource['file_path'] ?>" class="text-blue-500 underline" target="_blank">Download Assignment File</a>
                        </div>
                    <?php endif ?>
                </div>
            <?php endforeach ?>

            <!-- Add more cards as needed -->
        </div>
    </div>

</main>