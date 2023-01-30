@extends('admin.layouts.template')
@section('pagetitle')
  Edit Brand
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Brand</h4>
            </div>
            <form action="{{ route('admin.updatebrand') }}" method="POST">
              @csrf
                <div class="card-body">
                  <input type="hidden" value="{{ $brand_info->id }}" name="brand_id">
                  <div class="form-group">
                    <label for="brand_name">Brand Name</label>
                    <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{ $brand_info->brand_name }}">
                  </div>
                </div>
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Edit Brand">
                </div>
            </form>
          </div>
    </div>
</div>
@endsection