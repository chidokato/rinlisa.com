@extends('layout.index')

@section('title') Người dùng @endsection
@section('description') Người dùng @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')

@if(Auth::check())
Đã đăng nhập
@else
chưa đăng nhập
@endif


@endsection

@section('script')
@endsection