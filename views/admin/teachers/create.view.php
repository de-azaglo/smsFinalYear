<main class="home-section items-center bg-gray-200 flex-col py-5 rounded">
    <?php if (isset($alert)) : ?>
        <p class="text-center bg-red-200 py-2 px-4 rounded mb-3 "><?= $alert ?></p>
    <?php endif ?>
    <form action="/admin/teachers/store" method="POST" enctype="multipart/form-data" class="flex flex-col  newUserForm p-4 bg-white w-11/12 items-center">
        <h2>Add New Facilitator</h2>

        <p class=" mt-4 mb-2 ml-2 font-bold">Personal Information</p>

<!--        Personal Information -->

        <div class="input-fields">
        <div class="form-group">
            <label for="" class="text-red-500">Last Name: </label>
            <input required type="text" placeholder="eg. Azaglo" name="last_name" class="form-input">
        </div>
        <div class="form-group">
            <label for="" class="text-red-500">Other Name(Optional): </label>
            <input required type="text" placeholder="eg. Kwabena" name="other_name" class="form-input">
        </div>
        <div class="form-group">
            <label for="" class="text-red-500">First Name:</label>
            <input required type="text" placeholder="eg. Derrick" name="first_name" class="form-input">
        </div>

        <div class="form-group">
            <label for="" class="text-red-500 mb-2">Gender:</label>
            <div class="form-group flex flex-row mb-0">
                <div>
                    <input required type="radio" name="gender" value="Male"> Male
                </div>
                <div>
                    <input required type="radio" name="gender" value="Female"> Female
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="text-red-500 mb-2">Email:</label>
            <input required type="email" placeholder="eg. derrick@gmail.com" name="email" class="form-input">
        </div>
        <div class="form-group">
            <label for="" class="text-red-500 mb-2">Phone number:</label>
            <input required type="text" placeholder="eg. 0555555555" name="contact" class="form-input">
        </div>
        <div class="form-group">
            <label for="" class="text-red-500 mb-2">Digital Address:</label>
            <input required type="text" placeholder="e.g GA-000-0000" name="address" class="form-input">
        </div>
        <div class="form-group">
            <label for="" class="text-red-500">Date of Birth</label>
            <input required type="date" placeholder="Date of Birth" name="date_of_birth" class="form-input">
        </div>

        </div>

        <p class="mb-4 ml-2 font-bold">Professional Information</p>

        <div class="input-fields">

        <div class="form-group">
            <label for="" class="text-red-500 mb-2">Role of Teacher</label>
            <div class="form-group flex flex-row mb-0 w-100">
                <div>
                    <input required type="radio" name="teacher_type" value="Class Teacher" onclick="toggleInput('class')"> Class Teacher
                </div>
                <div>
                    <input required type="radio" name="teacher_type" value="Subject Teacher" onclick="toggleInput
                    ('subject')"> Subject Teacher
                </div>
            </div>
        </div>

        <div class="form-group">
            <select name="class" id="class" class="form-input bg-transparent">
                <option>Select A Grade</option>
                <?php foreach ($grades as $grade) : ?>
                    <option value="<?= $grade['id'] ?>"><?= $grade['grade_name'] ?></option>
                <?php endforeach ?>
            </select>
            <!-- <input required type="text" placeholder="Class" name="class" class="form-input"> -->
        </div>
        <div class="form-group">
            <select name="subject" id="subject" class="form-input bg-transparent">
                <option value="">Select A Subject</option>
                <option value="ICT">I.C.T</option>
                <option value="Twi">Twi</option>
                <option value="French">French</option>
            </select>
            <!-- <input required type="text" placeholder="Subject" name="subject" class="form-input"> -->
        </div>
        <div class="form-group">
            <label for="" class="mb-2 text-red-500">Qualification</label>
            <input required type="text" placeholder="Qualification" name="qualification" class="form-input">
        </div>
        <div class="form-group flex flex-col">
            <label for="" class="mb-2 text-red-500">Upload CV(PDF only)</label>
            <input class="form-control" type="file" name="cv" id="formFile" accept=".pdf">
        </div>
        <div class="form-group">
            <label for="" class="text-red-500">Date of Employment</label>
            <input required type="date" placeholder="Date of Employment" name="date_of_employment" class="form-input">
        </div>
        </div>

            <input required type="submit" value="Add Teacher" class="form-btn align-self-end mt-2">

    </form>

</main>
<script>
    function toggleInput(inputName) {
        var classInput = document.getElementsByName("class")[0];
        var subjectInput = document.getElementsByName("subject")[0];

        if (inputName === "class") {
            classInput.disabled = false;
            subjectInput.disabled = true;
        } else if (inputName === "subject") {
            classInput.disabled = true;
            subjectInput.disabled = false;
        }
    }
</script>
<script src="/../resource/script/admin/alert.js"></script>