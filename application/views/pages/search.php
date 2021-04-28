<div class="form-inline justify-content-center mt-5 mb-4">
    <?php echo form_open('product/search', array('method'=>'get'));?>
        <input type="text" name="search-item" class="form-control mb-2 mr-sm-2" id="search" placeholder="Search for an item">
        <button type="submit" class="btn btn-primary mb-2 ml-3 searchBtn">Search</button>
    </form>
</div>
<div class="card shadow">
        <div class="card-header">
            <h4><?php echo $count.' results for '.$query?></h4>
        </div>
        <div class="card-body">
            <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-3 text-center">
                <a class ="item-link" href="<?php echo site_url('product/detail_view/'.$product['name']) ?>">
                <div class="card card-body shadow">
                    <h4><?php echo $product['name']?></h4>
                    <h6><?php echo ucfirst($product['category'])?></h6>
                </div>
                </a>
                </div>
                <?php endforeach?>
            </div>
        </div>
    </div>