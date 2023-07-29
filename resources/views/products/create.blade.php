@extends('layouts.app')
@section('content')

@include('includes.errors')

<div class= "panel panel-default">
    <div class= " panel-heading">
      new products
    </div>
</div>

<div class= "panel-body">
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
    
        {{ csrf_field() }}

       <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" >
       </div>

       <div class="form-group">
        <label for="price">price</label>
        <input type="text" name="price" class="form-control" >
       </div>

       <div class="form-group">
        <label for="image">Featured Image</label>
        <input type="file" name="image" class="form-control">
       </div>

       <div class="form-group">
        <label for="description">description</label>
        <textarea name="description" id="" cols="5" rows="5 " class="form-control"></textarea>
       </div>

       <div class="form-group">
           <div class="text-center">
               <button class="btn btn-success" type="submit"> create product </button>
           </div>
       </div>

    </form>
    
</div>

@endsection 