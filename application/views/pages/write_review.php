<div class="card shadow mt-5 mb-3">
    <div class="card-header">
        <h3>Write Review</h3>
    </div>
    <div class="card-body">
    <?php echo form_open('product/add_review');?>
        <div class="form-inline justify-content-center mt-4 mb-4">
            <input value="<?php echo $item?>" <?php echo $default?>  name="item-name" type="text" class="form-control" id="search" aria-describedby="emailHelp" placeholder="Search for Item" />
            <?php if ( !$item ) : ?>
            <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#exampleModal">Add new item +</button>
            <?php endif ?>
        </div>
        <hr class="mt-5 mb-4" />
        <div class="form-group">
            <label for="comment">Your Review: </label>
            <textarea class="form-control" id="comment" rows="4" name="comment" placeholder="(Comments, Feedback, Critics, etc.)"></textarea>
        </div>
        <p class="mt-4">Your Rating:</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="1" value="1" />
            <label class="form-check-label" for="inlineRadio1">1</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="2" value="2" />
            <label class="form-check-label" for="inlineRadio2">2</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="3" value="3" />
            <label class="form-check-label" for="inlineRadio3">3</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="4" value="4" />
            <label class="form-check-label" for="inlineRadio3">4</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="5" value="5" />
            <label class="form-check-label" for="inlineRadio3">5</label>
        </div>
        <div class="mt-4">
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add New Item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open('product/add_product');?>
        <div class="form-group mt-4 mb-4">
            <input type="text" name="item-name" class="form-control" id="exampleInputPassword1" placeholder="Item Name">
        </div>
        <div class="form-group mt-4 mb-4">
        <select name="category" class="form-control" id="exampleFormControlSelect1">
            <option value="" selected disabled>Item Category</option>
            <option value="product">Products</option>
            <option value="business">Businesses</option>
            <option value="service">Services</option>
        </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit"class="btn btn-primary">Add Item</button>
      </div>
      </form>
    </div>
  </div>
</div>