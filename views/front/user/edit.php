<?php
    view('front/includes/header');
    view('front/includes/nav');
    view('front/includes/messages');
?>

<div class="row">
    <div class="col-12 py-3 bg-white">
        <div class="row">
            <div class="col-5 mx-auto">
                <div class="row">
                    <div class="col-12">
                        <h4>Edit User</h4>
                    </div>
                    <div class="col-12">
                        <form action="<?php echo url('/user/update'); ?>" method="post">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $user->name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="<?php echo $user->email; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $user->phone; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" rows="5" class="form-control" required><?php echo $user->address; ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php view('front/includes/footer'); ?>