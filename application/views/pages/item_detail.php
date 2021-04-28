<div class="card shadow mt-5">
    <div class="card-body">

        <h2><?php echo $item['name']?></h2>
        <h4 class="mt-3"><?php echo ucfirst($item['category'])?></h4>
        <a class="btn btn-primary mt-2" href="<?php echo site_url('product/add_favorite/'.$item['Id'])?>">Add to Favorites</a>
        <a class="btn btn-primary mt-2" href="<?php echo site_url('product/write_review/'.$item['Id'])?>">Write Review</a>

    </div>
</div>