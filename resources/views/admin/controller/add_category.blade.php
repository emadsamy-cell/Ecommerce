@extends('admin.layouts.master')

@section('title' , 'Add-Category')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Controller /</span> Add Category</h4>
      <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">New Category</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('AdminCategory.store') }}"  >
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Category Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Category Name" name ="name" value="{{ old('name') }}"/>
                        @if ($errors->has('name'))

                            <li class="list-group-item list-group-item-danger"> {{ $errors->first('name') }} </li>

                        @endif
                    </div>

                    <div class="row mt-3">
                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                          <button class="btn btn-primary btn-lg" type="submit">Add</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>

      </div>
    </div>
    <!-- / Content -->


    <div class="content-backdrop fade"></div>
  </div>
@endsection
