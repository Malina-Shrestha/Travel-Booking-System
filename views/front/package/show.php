<?php
view('front/includes/header');
view('front/includes/nav');

?>

<div class="row">
    <div class="col-12 py-3 bg-white">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <h3><?php echo $package->name; ?></h3>
                    <?php if(!empty($package->image)): ?>
                    <div class="col-12 text-center">
                        <img src="<?php echo url('/assets/images/'.$package->image); ?>" class="img-fluid border border-secondary">
                    </div>
                    <?php endif; ?>
                    <div class="col-12 my-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="home" aria-selected="true">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="false">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                                <ul>
                                    <li><strong>Name:</strong> <?php echo $package->name; ?></li>
                                    <li><strong>Price: </strong>Rs. <?php echo number_format($package->price); ?></li>

                                    <?php $category = $package->related(\App\Models\Category::class, 'category_id','parent')->single(); ?>
                                    <li><strong>Category: </strong><?php echo $category->name; ?></li>

                                    <li><strong>Address:</strong> <?php echo $package->address; ?></li>

                                    <?php $district = $package->related(\App\Models\District::class, 'district_id','parent')->single(); ?>
                                    <li><strong>District: </strong><?php echo $district->name; ?></li>

                                    <?php $state = $district->related(\App\Models\State::class, 'state_id','parent')->single(); ?>
                                    <li><strong>State: </strong><?php echo $state->name; ?></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab"><?php echo nl2br($package->description); ?></div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">...</div>
                        </div>
                    </div>
                </div>
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