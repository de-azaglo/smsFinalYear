<main class="home-section items-start bg-gray-200 rounded py-5">
    <div class=" p-4 bg-white w-5/6 flex flex-col items-center">
        <div class="flex justify-between items-center pb-3 border-b-2 border-red-500 w-full">
            <h1 class="text-3xl font-bold"><?= $grade['grade_name'] ?></h1>
            <div>
                <?php foreach ($terms as $term) : ?>
                    <a href="/admin/attendance?term=<?= $term['id'] ?>" class="append-param" data-param="grade" data-value="<?= $grade['id'] ?>">
                        <button class=" <?= $term['id'] == $term_id ? 'bg-red-500 text-white' : '' ?> rounded p-2"><?= $term['term_name'] ?></button>
                    </a>
                <?php endforeach ?>
            </div>
        </div>

        <div class="mt-3 flex justify-between w-full bg-gray-100 rounded-2xl py-10px">
            <?php

            foreach ($grades as $grade) : ?>
                <a href="/admin/attendance?grade=<?= $grade['id'] ?>" class="append-param" data-param="term" data-value="<?= $term['id'] ?>">
                    <button class=" <?= $grade['id'] == $class_id ? 'active' : '' ?> rounded-2xl hover:bg-red-200  py-2 px-3"><?= $grade['grade_name'] ?></button>
                </a>

            <?php endforeach ?>
        </div>

        <?php if (empty($students)) { ?>
            <p class="bg-red-200 text-center inline py-2 px-3 mt-2 rounded-xl">No Students</p>
        <?php } else { ?>

            <table class="table table table-striped table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Name of Student</th>
                        <th>Attendance</th>
                        <th>Status Today</th>
                    </tr>
                </thead>



                <tbody>
                    <?php foreach ($students as $student) : ?>
                        <tr>
                            <td><?= $student['last_name'] ?> <?= $student['first_name'] ?> <?= $student['other_name'] ?></td>
                            <?php
                            $atttendance = getAttendance($student['user_number'], $term_id);
                            ?>
                            <td><?= $atttendance ?></td>
                            <?php
                            $student = studentStatus($student['user_number'], $term_id);
                            ?>
                            <td><?= $student ?></td>

                        </tr>
                    <?php endforeach ?>

                <?php } ?>

                </tbody>
            </table>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('.append-param'); // Select all links that need dynamic parameter appending

        links.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default action of the link

                let currentUrl = this.href; // The current href of the clicked link
                let paramName = this.getAttribute('data-param'); // Get the parameter name to add from data attributes
                let paramValue = this.getAttribute('data-value'); // Get the parameter value to add from data attributes

                let url = new URL(currentUrl, window.location.origin); // Create a URL object from the current URL
                url.searchParams.set(paramName, paramValue); // Set the new parameter, adds if not present, replaces if present

                window.location.href = url.toString(); // Navigate to the new URL
            });
        });
    });
</script>