@extends('admin.layouts.master')

@section('title' , 'Home')


@section('content')
    @if (\Session::has('success'))
        <li class = "list-group-item list-group-item-success">{!! \Session::get('success') !!}</li>
    @endif
@endsection
