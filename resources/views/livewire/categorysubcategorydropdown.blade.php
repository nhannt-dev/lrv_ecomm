<div>
    <div class="form-group">
        <label for="product_category_id">Category</label>
        <select wire:model="selectcategory" class="form-control" name="product_category_id" id="product_category_id">
          <option selected>Category</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>  
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="product_subcategory_id">Sub Category</label>
        <select class="form-control" name="product_subcategory_id" id="product_subcategory_id">
          <option selected>Sub Category</option>
          @foreach ($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
          @endforeach
        </select>
      </div>
</div>
