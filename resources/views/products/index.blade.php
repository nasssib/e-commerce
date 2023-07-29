@extends('layouts.app')

@section('content')

<div  class="container">  
<table class="table table-hover">

    <thead>

        <th>image</th>

        <th>name</th>

        <th>edit</th>

        <th>delete</th>

    </thead>

    <tbody>

        @foreach ($products as $p )

        <tr>
            <td><img src="{{$p->image}}" alt="{{$p->name}}" width="50px" height="20px"></td>
            <td>
                {{$p->name}}
            </td>
            <td>
                <a href="{{route('products.edit',['id' => $p->id ])}}" class="btn btn-info">edit</a>
            </td>

            <td>
                <form action="{{route('products.destroy',['id' => $p->id ])}}" method="POST">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                 <button class="btn btn-danger">x</button>
                </form>
            </td>

        </tr>
            
        @endforeach
    </tbody>
</table>
</div>
@endsection