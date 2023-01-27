@extends('admin.layouts.template')
@section('pagetitle')
  Create Sub Category
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Create Sub Category</h4>
            </div>
            <form action="{{ route('admin.storesubcategory') }}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="subcategory_name">Sub Category Name</label>
                    <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Ex: Phone,...">
                  </div>
                  @php
                    $categories = App\Models\Category::where('status','active')->get();
                  @endphp
                  <div class="form-group">
                    <label for="category_name">Select Category</label>
                    <select name="category_id" class="form-control">
                      <option selected>Select Category</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <input type="submit" value="Create Sub Category" class="btn btn-primary">
                </div>
            </form>
          </div>
    </div>
</div>
@endsection