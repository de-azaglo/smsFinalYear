<main class="home-section items-start bg-gray-200 rounded py-5">
    <div class=" p-4 bg-white w-5/6 flex flex-col items-center">
        <div class="flex justify-between items-center pb-3 border-b-2 border-red-500 w-full">
            <h1 class="text-3xl font-bold">Terms</h1>

        </div>



        <?php if (empty($terms)) { ?>
            <p class="bg-red-200 text-center inline py-2 px-3 mt-2 rounded-xl">No Terms</p>
        <?php } else { ?>

            <table class="table table table-striped table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Term</th>
                        <th>Starts On</th>
                        <th>Ends on</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>



                <tbody>
                    <?php foreach ($terms as $term) : ?>
                        <tr>
                            <td><?= $term['year'] ?> </td>
                            <td><?= $term['term_name'] ?> </td>
                            <td><?= $term['start_date'] ?></td>
                            <td><?= $term['end_date'] ?></td>
                            <td><?= $term['status'] ?></td>
                            <td>
                                <a href="/admin/academics/terms/show?setActiveTerm=<?= $term['id'] ?>" class="text-red-500">
                                    Set As Active
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                <?php } ?>

                </tbody>
            </table>
    </div>
</main>