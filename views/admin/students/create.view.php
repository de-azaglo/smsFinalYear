<main class="home-section items-center bg-gray-200 flex-col py-5 rounded">
    <style>
        label{
            font-size: 0.8em;
        }
    </style>
    <?php if (isset($alert)) : ?>
        <p class="text-center bg-red-200 py-2 px-4 rounded mb-3 "><?= $alert ?></p>
    <?php endif ?>
    <form action="/admin/students/store" method="POST" enctype="multipart/form-data" class="flex flex-col  newUserForm p-4 bg-white w-11/12 items-center ">
        <h2 class="self-start font-bold text-lg">Add New Student</h2>
        <p class="font-bold">Student's Information</p>

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
            <label for="" class="text-red-500 ">Gender:</label>
            <div class="form-group flex flex-row mb-0 bg-gray-100 w-100 p-2">
                <div>
                    <input required type="radio" name="gender" value="Male"> Male
                </div>
                <div>
                    <input required type="radio" name="gender" value="Female"> Female
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="" class="text-red-500">Digital Address:</label>
            <input required type="text" placeholder="e.g GA-000-0000" name="address" class="form-input">
        </div>
        <div class="form-group">
            <label for="" class="text-red-500">Date of Birth:</label>
            <input required type="date" placeholder="Date of Birth" name="date_of_birth" class="form-input">
        </div>
        <div class="form-group">
            <label for="" class="text-red-500">Date of Admission:</label>
            <input required type="date" placeholder="Date of Admission" name="date_of_admission" class="form-input">
        </div>
        <div class="form-group">
            <label for="" class="text-red-500 ">Height(cm):</label>
            <input required type="text" placeholder="e.g 180" name="height" class="form-input">
        </div>


        <div class="form-group">
            <label for="" class="text-red-500 ">Blood Group:</label>
            <select name="blood_group" class="form-input bg-transparent">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="B+">AB+</option>
                <option value="B-">AB-</option>
                <option value="B+">O+</option>
                <option value="B-">O-</option>
            </select>
        </div>
        <div class="form-group">
            <label for="" class="text-red-500 ">Grade:</label>
            <select name="grade" class="form-input bg-transparent">
                <?php foreach ($grades as $grade) : ?>
                    <option value="<?= $grade['id'] ?>"><?= $grade['grade_name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        </div>

                            <!--Guardian Information-->

        <p class="mb-4 ml-2 font-bold">Guardian Information</p>

        <div class="input-fields">
        <div class="form-group">
            <label for="" class="text-red-500  ">Guardian Type</label>
            <div class="form-group flex flex-row mb-0 bg-gray-100 w-100 p-2">
                <div>
                    <input required type="radio" name="guardian_type" value="mother" onclick="toggleInput('mother')"> Mother
                </div>
                <div>
                    <input required type="radio" name="guardian_type" value="father" onclick="toggleInput('father')"> Father
                </div>
                <div>
                    <input required type="radio" name="guardian_type" id="other-selector" onclick="toggleInput('other')"> Other
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="text-red-500  ">Other (Please Specify):</label>
            <input required type="text" placeholder="e.g GA-000-0000" name="other" id="other-input" class="form-input" id="other" disabled oninput="updateOther(this.value)">
        </div>

        <div class="form-group">
            <label for="" class="text-red-500  ">Guardian's Full Name:</label>
            <input required type="text" placeholder="e.g Azaglo Derrick Kwabena" name="guardian_name" class="form-input">
        </div>
        <div class="form-group">
            <label for="" class="text-red-500  ">Guardian's Email:</label>
            <input required type="text" placeholder="e.g derrick@gmail.com" name="guardian_email" class="form-input">
        </div>
        <div class="form-group">
            <label for="" class="text-red-500  ">Guardian's Contact:</label>
            <input required type="text" placeholder="e.g 0555555555" name="guardian_contact" class="form-input">
        </div>

        <div class="form-group">
            <label for="" class="text-red-500  ">Guardian's occupation:</label>
            <input required type="text" placeholder="e.g Doctor" name="guardian_occupation" class="form-input">
        </div>
        </div>

        <!-- <div class="form-group flex flex-col">
            <label for="" class="  text-red-500">Upload CV(PDF only)</label>
            <input class="form-control" type="file" name="cv" id="formFile" accept=".pdf">
        </div> -->

            <input required type="submit" value="Add Teacher" class="form-btn align-self-end mt-2">


    </form>

</main>
<script>
    function toggleInput(inputName) {
        let otherInput = document.getElementById("other-input");
        let otherSelector = document.getElementById("other-selector");


        if (inputName === "other") {
            otherInput.disabled = false;

        } else {
            otherInput.disabled = true;
        }
    }

    function updateOther(value) {
        lowercase_value = value.toLowerCase();
        document.getElementById("other-selector").value = lowercase_value;
    }
</script>

<script src="/../resource/script/admin/alert.js"></script>