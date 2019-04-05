<?php
view('front/includes/header');
view('front/includes/nav');

?>

<div class="row">
    <div class="col-12 py-3 bg-white">
        <div class="row">
            <div class="col-5 mx-auto">
                <div class="row">
                    <div class="col-12">
                        <h4>Register</h4>
                    </div>
                    <div class="col-12">
                        <form action="<?php echo url('/register/store'); ?>" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">ConfirmPassword</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control" required>
                            </div>
                            <div>
                                <label for="address">Address</label>
                                <textarea name="address" id="address" rows="2"></textarea>
                            </div>
                        </form>
                    </div>

        </div>
    </div>
</div>
<div class="row">
    <footer class="col-12 bg-dark py-4 text-white text-center">
        &copy; Booking System, <?php echo date('Y'); ?>.
    </footer>
</div>
<?php view('front/includes/footer'); ?>