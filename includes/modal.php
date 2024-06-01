<?php
        echo '<!-- Overlay For Popup -->
        <div id="modal-close-overlay"></div>
        <!-- Login Signup Modal -->
        <div id="modal">
            <!-- Modal Image -->
            <div id="modal-image">
                <img src="./assets/images/Modal/modal.png" alt="Modal Image">
            </div>
            <!-- Modal Close Button -->
            <div id="modal-close-btn">
                <i class="fa-solid fa-x" id="closeModal"></i>
            </div>
            <!-- Login Form -->
            <div id="modal-login-form">
                <h3>Login</h3>
                <form action="./Auth/_login.php" id="login-form" method="post">
                <div class="modal-input-box">
                        <input type="email" placeholder="Email Address" id="login-email-input" name="login_email" autocomplete="off" autofocus>
                        <i id="login-email-icon" class="fa-regular fa-envelope" style="color: #a0a4ac;"></i>
                    </div>
                    <div class="modal-input-box">
                        <input type="password" placeholder="Password" id="login-password-input" name="login_password" minlength="8">
                        <i class="fa-regular fa-eye-slash eye-icon" id="login-eye-icon"></i>
                    </div>
                    <div class="modal-input-box">
                        <a id="toAdminPage">Login as Admin</a>
                    </div>
                    <div class="modal-input-box">
                        <button type="submit" name="login">Login</button>
                    </div>
                    <div class="modal-input-box">
                        <p>Don\'t have an Account ? <a id="toSignupPage">Register</a></p>
                    </div>
                </form>
            </div>
            <!-- Signup Form -->
            <div id="modal-signup-form">
                <h3>Signup</h3>
                <form action="./Auth/_signup.php" method="post" id="signup-form">
                    <div class="modal-input-box">
                        <input type="text" placeholder="Full Name" id="signup-username-input" name="signup_username" autocomplete="off" autofocus>
                    </div>
                    <div class="modal-input-box">
                        <input type="email" placeholder="Email Address" id="signup-email-input" name="signup_email" autocomplete="off">
                        <i id="signup-email-icon" class="fa-regular fa-envelope" style="color: #a0a4ac;"></i>
                    </div>
                    <div class="modal-input-box">
                        <input type="password" placeholder="Password" id="signup-password-input" name="signup_password" minlength="8">
                        <i class="fa-regular fa-eye-slash eye-icon" id="signup-eye-icon1"></i>
                    </div>
                    <div class="modal-input-box">
                        <input type="password" placeholder="Confirm Password" id="signup-cpassword-input" name="signup_cpassword" minlength="8">
                        <i class="fa-regular fa-eye-slash eye-icon" id="signup-eye-icon2"></i>
                    </div>
                    <div class="modal-input-box">
                        <button type="submit" name="signup">Sign up</button>
                    </div>
                    <div class="modal-input-box">
                        <p>Already have an Account ? <a id="toLoginPage">Login</a></p>
                    </div>
                </form>
            </div>
            <div id="modal-admin-form">
                <h3>Admin Login</h3>
                <form action="./Auth/_admin.php" method="post" id="admin-form">
                    <div class="modal-input-box">
                        <input type="text" placeholder="Username" id="admin-username" name="admin-username" autocomplete="off" autofocus>
                    </div>
                    <div class="modal-input-box">
                        <input type="password" placeholder="Password" id="admin-password" name="admin-password" minlength="8">
                        <i class="fa-regular fa-eye-slash eye-icon" id="admin-eye-icon"></i>
                    </div>
                    <div class="modal-input-box">
                        <button type="submit" name="admin-signup">Login</button>
                    </div>
                    <div class="modal-input-box">
                        <p>Login as a Customer ? <a id="toLoginPage2">Login</a></p>
                    </div>
                </form>
            </div>
        </div>';
?>