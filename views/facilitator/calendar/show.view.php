<main class="home-section items-start bg-gray-200 rounded py-5">
    <div class=" p-4 bg-white w-5/6 flex flex-col items-center">
        <div class="flex justify-between items-center pb-3 border-b-2 border-red-500 w-full">
            <h1 class="text-3xl font-bold"><?= $academic_calender[0]['year'] ?> Academic Calender</h1>
            <a href="/admin/academics/year/create">
                <button class="bg-red-500 text-white p-2">Print Calendar</button>
            </a>
        </div>



        <?php if (empty($academic_calender)) { ?>
            <p class="bg-red-200 text-center inline py-2 px-3 mt-2 rounded-xl">No Academic Events</p>
        <?php } else { ?>
            <table class="table table-bordered mt-3">
                <thead>
                    <h1></h1>
                    <tr>
                        <th>Starts On</th>
                        <th>Ends On</th>
                        <th>Event</th>
                        <th>Type</th>
                        <th>Status</th>
                    </tr>
                </thead>



                <tbody>
                    <?php foreach ($academic_calender as $events) : ?>
                        <tr>
                            <td><?= $events['start_date'] ?></td>
                            <td><?= $events['end_date'] ?></td>
                            <td><?= $events['event_name'] ?></td>
                            <td><?= $events['event_type'] ?> </td>
                            <td><?= $events['school_status'] ?></td>
                        </tr>
                    <?php endforeach ?>

                <?php } ?>

                </tbody>
            </table>
    </div>
</main>