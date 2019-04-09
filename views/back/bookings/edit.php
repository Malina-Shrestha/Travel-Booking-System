 <?php
    view('back/includes/header');
    view('back/includes/nav');
    view('back/includes/messages');
?>
<div class="row">
    <div class="col-12 bg-white">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1>Edit Booking</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="<?php echo url('/bookings/update/'.$booking->id); ?>" method="post">
                    <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="number" name="quantity" id="qty" class="form-control" value="<?php echo $booking->qty; ?>" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="text" name="start_date" id="start_date" class="form-control" value="<?php echo $booking->start_date; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="text" name="end_date" id="start_date" class="form-control" value="<?php echo $booking->end_date; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" id="status" class="form-control" value="<?php echo $booking->status; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea name="remarks" id="remarks" class="form-control" rows="5"><?php echo $booking->remarks; ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php view('back/includes/footer'); ?>

