@extends('admin.layouts.template')
@section('pagetitle')
  Create Product
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Create Product</h4>
            </div>
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
                </ul>
              </div>
            @endif
            <form action="" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Ex: Iphone 14 Promax,...">
                  </div>

                  <div class="form-group">
                    <label for="product_price">Price</label>
                    <input type="number" class="form-control" id="product_price" name="product_price">
                  </div>

                  <div class="form-group">
                    <label for="product_short_des">Short Description</label>
                    <textarea name="product_short_des" class="form-control" id="product_short_des" cols="30" rows="10"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="product_long_des">Long Description</label>
                    <textarea name="product_long_des" id="product_long_des" class="form-control" cols="30" rows="10"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="product_img">Image</label>
                    <input type="file" class="form-control" id="product_img" name="product_img">
                  </div>

                  <livewire:categorysubcategorydropdown>

                  @php
                    $brands = App\Models\Brand::get();
                  @endphp

                  <div class="form-group">
                    <label for="product_brand_id">Brand</label>
                    <select class="form-control" name="product_brand_id" id="product_brand_id">
                      <option selected>Brand</option>
                      @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="product_size">Size</label>
                    <input type="text" class="form-control" id="product_size" name="product_size" placeholder="Ex: X, M, L,...">
                  </div>

                  <div class="form-group">
                    <label for="product_color">Color</label>
                    <input type="color" id="product_color" name="product_color">
                  </div>

                  <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity">
                  </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create Product</button>
                </div>
            </form>
          </div>
    </div>
</div>
@endsection
