<div class="horizontal-nav">
    <nav class="home-content">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="/../resource/bootstrap.bundle.min.js"></script>


        <div class="logo-container">
            <i class='bx bx-menu'></i>
            <p class="text-sm text-gray-400 ml-4"><?= $full_date ?></p>
        </div>
        <div class="greeting-container flex flex-col items-center">
            <p class="greeting-nav">Welcome Back, <span class="name-greeting"><?= $name ?></span></p>

        </div>

        <form action="/sessions" method="post">
            <input type="hidden" value="DELETE" name="_method">
            <button class="nav-login-btn">Logout</button>
        </form>

        <!-- <a href="/login" class="nav-login-btn">Logout</a> -->

        <script>
            function toggleDropdown() {
                var dropdownMenu = document.getElementById("dropdownMenu");

                // Toggle the display style between 'block' and 'none'
                if (dropdownMenu.style.display === "block") {
                    dropdownMenu.style.display = "none";
                } else {
                    dropdownMenu.style.display = "block";
                }
            }
        </script>


    </nav>
</div>

<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });
</script>