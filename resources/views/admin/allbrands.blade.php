@extends('admin.layouts.template')
@section('pagetitle')
  All Brands
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>All Brands</h4>
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
                      <th>Products</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($brands as $brand)
                      <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->brand_name }}</td>
                        <td>{{ $brand->slug }}</td>
                        <td>{{ $brand->product_count }}</td>
                        <td>
                          @if ($brand->status === 'active')
                            <div class="badge badge-success">Active</div>
                          @else
                            <div class="badge badge-danger">Not Active</div>
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('admin.editbrand', $brand->id) }}" class="btn btn-sm btn-warning">Edit</a>
                          <a href="{{ route('admin.deletebrand', $brand->id) }}" class="btn btn-sm btn-danger">Delete</a>
                          @if ($brand->status === 'active')
                            <form action="{{ route('admin.deactivatebrand') }}" method="post">
                              @csrf
                              <input type="hidden" value="{{ $brand->id }}" name="brand_id">
                              <input type="submit" value="Deactivate" class="btn btn-info mt-2">
                            </form>
                          @else
                            <form action="{{ route('admin.activatebrand') }}" method="post">
                              @csrf
                              <input type="hidden" value="{{ $brand->id }}" name="brand_id">
                              <input type="submit" value="Activate" class="btn btn-success mt-2">
                            </form>
                          @endif
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