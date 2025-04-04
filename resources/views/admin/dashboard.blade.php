@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        
    @endif
    <p>Chào mừng bạn đến với trang quản trị.</p>
@endsection
