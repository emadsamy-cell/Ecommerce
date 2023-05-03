@extends('admin.layouts.master')

@section('title' , 'Edit User')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Users</h4>
      <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit User</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('AdminUser.update' , $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="name">Full Name</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                            ><i class="bx bx-user"></i
                            ></span>
                            <x-text-input id="name" class="form-control" type="text" placeholder="3omda" name="name" :value="$user->name" required autofocus autocomplete="name" />

                            @if ($errors->has('name'))

                                <li class="list-group-item list-group-item-danger"> {{ $errors->first('name') }} </li>

                            @endif

                        </div>

                    </div>
                    <!-- Email Address -->
                    <div class="row mb-3">
                        <label class="form-label" for="email" :value="__('Email')">Email</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <x-text-input id="email" class="form-control" placeholder="3omda@example.com" type="email" name="email" :value="$user->email" required autocomplete="username" />
                          </div>
                          @if ($errors->has('email'))

                                <li class="list-group-item list-group-item-danger"> {{ $errors->first('email') }} </li>

                           @endif
                    </div>
                    <!-- Password -->
                    <div class="row mb-3 form-password-toggle">
                        <label class="form-label" for="password" :value="__('Password')">Password</label>
                        <div class="input-group input-group-merge">

                            <x-text-input id="password" class="form-control"
                            type="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            name="password"
                            required autocomplete="new-password" />

                            <span class="input-group-text cursor-pointer" id="basic-default-password"
                                ><i class="bx bx-hide"></i
                            ></span>
                        </div>
                        @if ($errors->has('password'))

                            <li class="list-group-item list-group-item-danger"> {{ $errors->first('password') }} </li>

                        @endif
                    </div>


                    <!-- confirm Password -->
                    <div class="row mb-3 form-password-toggle">
                        <label class="form-label" for="password_confirmation" :value="__('Confirm Password')">Confirm Password</label>
                        <div class="input-group input-group-merge">

                            <x-text-input id="password_confirmation" class="form-control"
                            type="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            name="password_confirmation"
                            required autocomplete="new-password" />

                            <span class="input-group-text cursor-pointer" id="basic-default-password"
                                ><i class="bx bx-hide"></i
                            ></span>
                        </div>
                        @if ($errors->has('password_confirmation'))

                            <li class="list-group-item list-group-item-danger"> {{ $errors->first('password_confirmation') }} </li>

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
