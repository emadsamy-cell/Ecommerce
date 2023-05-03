@extends('admin.layouts.master')

@section('title' , 'Edit Product')

@section('content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Product</h4>
      <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Product</h5>
              </div>
              <div class="card-body">
                <form action="{{ route('AdminProduct.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Product Name" name="name" value="{{$product->name }}" />
                        @if ($errors->has('name'))

                             <li class="list-group-item list-group-item-danger"> {{ $errors->first('name') }} </li>

                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="Category" class="form-label">Category</label>
                        <select class="form-select" id="Category" name="category" aria-label="Default select example">

                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}" name="category" @if ($category->id == $product->category_id)
                                selected
                            @endif>{{ $category['name'] }}</option>
                        @endforeach
                        @if ($errors->has('categroy'))

                             <li class="list-group-item list-group-item-danger"> {{ $errors->first('categroy') }} </li>

                        @endif

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
                                value="{{ $product->OldPrice }}"
                            />
                        </div>
                        @if ($errors->has('price'))

                            <li class="list-group-item list-group-item-danger"> {{ $errors->first('price') }} </li>

                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">Discription</label>
                        <textarea
                          id="basic-default-message"
                          class="form-control"
                          placeholder="Discription about the Product"
                          name="discription"
                        >{{ $product->discription }}</textarea>
                        @if ($errors->has('discription'))

                            <li class="list-group-item list-group-item-danger"> {{ $errors->first('discription') }} </li>

                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="Image" class="form-label">Upload New Image</label>
                        <input class="form-control" type="file" id="Image" name="image" value="{{ $product->image }}"/>
                        @if ($errors->has('image'))

                            <li class="list-group-item list-group-item-danger"> {{ $errors->first('image') }} </li>

                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-email">Discount</label>
                        <div class="input-group input-group-merge">
                        <input
                            type="text"
                            id="basic-default-email"
                            class="form-control"
                            placeholder="Amount"
                            aria-label="john.doe"
                            aria-describedby="basic-default-email2"
                            name="discount"
                            value="{{ $product->discount }}"
                            value="0"
                        />
                        <span class="input-group-text" id="basic-default-email2" style="color: #666afe;">%</span>
                        </div>
                        @if ($errors->has('discount'))

                            <li class="list-group-item list-group-item-danger"> {{ $errors->first('discount') }} </li>

                         @endif
                    </div>

                    <div class="mb-3 row">
                        <label class="form-label" for="avaliable">Avliable</label>
                        <div class="input-group input-group-merge">
                          <input class="form-control" type="number" value="1" id="avaliable" name ="avaliable" value="{{ $product->avaliable }}" />
                        </div>
                        @if ($errors->has('avaliable'))

                             <li class="list-group-item list-group-item-danger"> {{ $errors->first('avaliable') }} </li>

                        @endif
                    </div>

                    <div class="row mt-3">
                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                          <button class="btn btn-primary btn-lg" type="submit">Update</button>
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
