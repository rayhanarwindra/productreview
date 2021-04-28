<div class="card shadow mt-5">
    <div class="card-body">

        <h2><?php echo $item['name']?></h2>
        <h4 class="mt-3"><?php echo ucfirst($item['category'])?></h4>
        <?php if (!$isFavorite): ?>
        <a class="btn btn-primary mt-2" href="<?php echo site_url('product/add_favorite/'.$item['Id'])?>">Add to Favorites</a>
        <?php endif ?>
        <a class="btn btn-primary mt-2" href="<?php echo site_url('product/write_review/'.$item['Id'])?>">Write Review</a>
        </div>
</div>

        <div class="card mt-4">
            <div class="card-header"><h2>Reviews</h2></div>
            <div class="card-body">
                <?php foreach ($reviews as $review): ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>
                                <a class="username-review" href="<?php echo site_url('profile/profile_view/'.$review['username']) ?>">
                                     <?php echo $review['username']?>
                                </a>
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <h6>Rating: <?php echo $review['rating']?>/5</h6>
                            </div>
                        </div>
                        <p class="mt-3">
                            "<?php echo $review['comment']?>"
                        </p>
                        
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>

