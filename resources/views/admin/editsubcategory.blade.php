@extends('admin.layouts.template')
@section('pagetitle')
  Edit Sub Category
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Sub Category</h4>
            </div>
            <form action="{{ route('admin.updatesubcategory') }}" method="POST">
                @csrf
                <div class="card-body">
                    <input type="hidden" value="{{ $subcategory->id }}" name="subcategory_id">
                  <div class="form-group">
                    <label for="subcategory_name">Sub Category Name</label>
                    <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" value="{{ $subcategory->subcategory_name }}">
                  </div>
                  @php
                    $categories = App\Models\Category::where('status','active')->get();
                  @endphp
                  <div class="form-group">
                    <label for="category_name">Select Category</label>
                    <select name="category_id" class="form-control">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($subcategory->category_id == $category->id) selected @endif>{{ $category->category_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <input type="submit" value="Update Sub Category" class="btn btn-primary">
                </div>
            </form>
          </div>
    </div>
</div>
@endsection