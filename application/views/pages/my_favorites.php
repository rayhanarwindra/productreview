<div class="card mt-5 shadow">

    <div class="card-header">
        <h2>My Favorites</h2>
    </div>
    <div class="card-body">
    <div class="row mt-3">
    <?php foreach ($favorites as $product): ?>
    <div class="col-md-6">
        <div class="mb-4">
        <a class ="item-link" href="<?php echo site_url('product/detail_view/'.$product['name']) ?>">
        <div class="card card-body shadow">
            <h4><?php echo $product['name']?></h4>
            <h6><?php echo ucfirst($product['category'])?></h6>
                
        </div>
        </a>
        <a class="btn btn-danger mt-2" href="<?php echo site_url('profile/remove_favorite/'.$product['Id']) ?>">Remove</a>
        </div>
        </div>
    <?php endforeach?>
    </div>
    </div>

    </div>

</div>