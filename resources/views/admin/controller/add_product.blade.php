@extends('admin.layouts.master')

@section('title' , 'Add-Product')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Controller /</span> Add Product</h4>
      <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">New Product</h5>
              </div>
              <div class="card-body">
                <form action="{{ route('AdminProduct.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Product Name" name="name" />
                    </div>

                    <div class="mb-3">
                        <label for="Category" class="form-label">Category</label>
                        <select class="form-select" id="Category" aria-label="Default select example">

                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}" name='category'>{{ $category['name'] }}</option>
                        @endforeach
                    </select>

                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="price">Price</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="price2" style="color: #666afe;">$</span>
                            <input
                                type="text"
                                id="price"
                                class="form-control"
                                placeholder="Amount"
                                aria-label="john.doe"
                                aria-describedby="price2"
                                name ="price"
                            />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">Discription</label>
                        <textarea
                          id="basic-default-message"
                          class="form-control"
                          placeholder="Discription about the Product"
                          name="discription"
                        ></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="Image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="Image" name="image"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-email">Discount</label>
                        <div class="input-group input-group-merge">
                        <input
                            type="text"
                            id="basic-default-email"
                            class="form-control"
                            placeholder="Amount"
                            value="0"
                            aria-label="john.doe"
                            aria-describedby="basic-default-email2"
                            name="discount"
                        />
                        <span class="input-group-text" id="basic-default-email2" style="color: #666afe;">%</span>
                        </div>
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
