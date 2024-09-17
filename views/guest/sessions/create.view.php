<?php
view('partials/head.php', [
    'title' => 'Login'
]);

view('partials/guest-nav.php');

?>
<main class="login">
    <section class="login-left">
        <form action="/sessions" class="signForm" method="POST">
            <div class="upper">
                <h2>Log In</h2>
            </div>
            <div class="form-group">
                <!-- <label for="loginid">Login ID</label> -->
                <input type="text" placeholder="Enter Email..." name="email" id="email" class="form-input" autofocus autocomplete="email">
                <?php if (isset($errors['email'])) : ?>
                    <p class="error-message">
                        <?= $errors['email'] ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <!-- <label for="password">Password</label> -->
                <input type="password" placeholder="Enter Your Password..." name="password" id="password" class="form-input">
                <!-- <?php if (isset($errors['password'])) : ?>
                    <p class="error-message">
                        <?= $errors['password'] ?>
                    </p>
                <?php endif; ?> -->
            </div>
            <div class="checkbox">
                <input type="checkbox" name="remember-me" id="remember-me">
                <p>Remember Me</p>
            </div>

            <?php if (isset($errors['auth'])) : ?>
                <p class="error-message">
                    <?= $errors['auth'] ?>
                </p>
            <?php endif; ?>

            <input type="submit" value="Login" class="form-btn">
            <!--
            <div class="divider">
                <hr>
                <p>Or</p>
                <hr>
            </div>
 
            <div class="google-login">
                <i class="bi bi-google" aria-hidden="true"></i>
                <p>Login With Google</p>
            </div> -->
        </form>
    </section>
    <section class="right">
        <img src="resource/vector.png" alt="">
    </section>

</main>

<?php view('partials/footer.php'); ?>