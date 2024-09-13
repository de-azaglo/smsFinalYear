<main class="home-section items-start bg-gray-200 rounded py-5 h-100">
    <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-md">
        <h2 class="mb-6 text-2xl font-semibold text-center text-gray-800">Change Password</h2>
        <p class="mb-2 text-center text-gray-600">Enter your new password for your account.</p>
        <p class="mb-4 text-center text-green-600 text-sm" id="alert-message"><?= $alert ?></p>

        <form action="/settings/save" method="POST" class="space-y-4">
            <!-- New Password -->
            <div>
                <label for="new-password" class="block mb-2 text-sm font-medium text-gray-700">New Password</label>
                <div class="relative">
                    <input id="new-password" type="password" class="w-full px-4 py-2 pr-10 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" placeholder="New Password" name="password">
                </div>
            </div>

            <!-- Confirm New Password -->
            <div>
                <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-700">Confirm New Password</label>
                <div class="relative">
                    <input id="confirm-password" type="password" class="w-full px-4 py-2 pr-10 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" placeholder="Confirm New Password">
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 cursor-not-allowed opacity-50" id="submit-btn">Change my password</button>
            </div>
        </form>
    </div>
</main>

<script>
    const newPasswordInput = document.getElementById('new-password');
    const confirmPasswordInput = document.getElementById('confirm-password');
    const submitButton = document.getElementById('submit-btn');

    function validatePasswords() {
        const newPassword = newPasswordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        // Check if both passwords are not empty and match
        if (newPassword && confirmPassword && newPassword === confirmPassword) {
            submitButton.disabled = false;
            submitButton.classList.remove('cursor-not-allowed', 'opacity-50');
        } else {
            submitButton.disabled = true;
            submitButton.classList.add('cursor-not-allowed', 'opacity-50');
        }
    }

    // Add event listeners to check passwords on input
    newPasswordInput.addEventListener('input', validatePasswords);
    confirmPasswordInput.addEventListener('input', validatePasswords);

    
        setTimeout(function() {
            const alertMessage = document.getElementById('alert-message');
            console.log(alertMessage)
            if (alertMessage) {
                alertMessage.style.display = 'none'; // Hide the element
                console.log('done')
            }
        }, 3000); // 2000 milliseconds = 2 seconds
    
</script>
