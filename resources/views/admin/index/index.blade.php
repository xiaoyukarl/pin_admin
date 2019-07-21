
@extends('admin.layout.app')
@section('title')
    首页
@endsection
@section('content')
    <iframe src='{{route('back.index.env')}}' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
@endsection