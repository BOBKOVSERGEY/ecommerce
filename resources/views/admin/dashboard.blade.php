@extends('admin.layout.base')
@section('title', 'Dashboard')

@section('content')
  <h1>Dashboard</h1>
  <form action="/admin" method="post" enctype="multipart/form-data">
    <input type="text" name="product" value="testing product">
    <br>
    <input type="file" name="file">
    <br>
    <input type="submit" name="submit" value="Go">
  </form>

  {{ \App\Classes\Request::all()  }}

@endsection
