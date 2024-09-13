 <style>
     /* Green for Present */
     .present {
         background-color: #b8e994;
     }

     /* Red for Absent */
     .absent {
         background-color: #ff6b6b;
     }
 </style>

 <main class="home-section items-center bg-gray-200 flex-col py-5 rounded">
     <!-- <div class="card-container flex justify-between w-11/12">
         <div class="card py-4 px-5 flex flex-row items-center">
             <div class="bg-gray-100 flex justify-center items-center p-2 rounded">
                 <i class='bx bxs-graduation text-red-400 text-3xl'></i>
             </div>
             <div class="caption ml-4">
                 <h3 class="text-2xl font-semibold">
                     <?=
                        /** @var int $number_of_student */
                        $number_of_student ?: 0 ?>
                 </h3>
                 <p class="text-xs text-gray-500">
                     Total Student
                 </p>
             </div>
         </div>
         <div class="card py-4 px-5 flex flex-row items-center">
             <div class="bg-gray-100 flex justify-center items-center p-2 rounded">
                 <i class='bx bx-log-in text-red-400 text-3xl'></i>
             </div>
             <div class="caption ml-4">
                 <h3 class="text-2xl font-semibold">
                     <?=
                        /** @var int $students_present */
                        $students_present ?: 0 ?>
                 </h3>
                 <p class="text-xs text-gray-500">
                     Student Present Today
                 </p>
             </div>
         </div>
         <div class="card py-4 px-5 flex flex-row items-center">
             <div class="bg-gray-100 flex justify-center items-center p-2 rounded">
                 <i class='bx bx-user-pin text-red-400 text-3xl'></i>
             </div>
             <div class="caption ml-4">
                 <h3 class="text-2xl font-semibold">
                     <?=
                        /** @var int $number_of_teachers */
                        $number_of_teachers ?: 0 ?>
                 </h3>
                 <p class="text-xs text-gray-500">
                     Total Teachers
                 </p>
             </div>
         </div>
         <div class="card py-4 px-5 flex flex-row items-center">
             <div class="bg-gray-100 flex justify-center items-center p-2 rounded">
                 <i class='bx bx bx-log-in text-red-400 text-3xl'></i>
             </div>
             <div class="caption ml-4">
                 <h3 class="text-2xl font-semibold">
                     <?=
                        /** @var int $number_of_teachers */
                        $number_of_teachers ?: 0 ?>
                 </h3>
                 <p class="text-xs text-gray-500">
                     Teachers Present Today
                 </p>
             </div>
         </div>
     </div> -->
     <div class="w-11/12 flex mt-4 justify-between bg-white p-4 card" id="calendar">

     </div>

 </main>

 <!-- Load Chart.js from CDN -->
 <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         var calendarEl = document.getElementById('calendar');
         var calendar = new FullCalendar.Calendar(calendarEl, {
             initialView: 'dayGridMonth',
             events: <?= json_encode($attendance_status); ?>
         });
         calendar.render();
     });
 </script>