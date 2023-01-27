@extends('admin.layouts.template')
@section('pagetitle')
  All Sub Category
@endsection
@section('content')
<h2>AllSubCategory</h2>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>All Sub Category</h4>
            </div>
            @if (session()->has('message'))
              <div class="alert alert-success">
                {{ session()->get('message') }}
              </div>
            @endif
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-md">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Category</th>
                      <th>Product</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($subcategories as $subcategory)
                      <tr>
                        <td>{{ $subcategory->id }}</td>
                        <td>{{ $subcategory->subcategory_name }}</td>
                        <td>{{ $subcategory->slug }}</td>
                        <td>{{ $subcategory->category_name }}</td>
                        <td>{{ $subcategory->product_count }}</td>
                        <td>
                          @if ($subcategory->status === 'active')
                            <div class="badge badge-success">Active</div>
                          @else
                            <div class="badge badge-danger">Not Active</div>
                          @endif
                        </td>
                        <td>
                          <a href="#" class="btn btn-warning">Edit</a>
                          <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>  
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1 <span
                        class="sr-only">(current)</span></a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
    </div>
</div>
@endsection