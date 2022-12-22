@extends('master')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>User</h1>
           
             @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
             @if ($message = Session::get('successaddImage'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <th width="80px">Id</th>
                    <th>name</th>
                    <th>image</th>
                    <th width="150px">Action</th>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td><img src="{{asset("images/{$product->image->path}")}}" width="30" > {{ $product->image->path}}</td>
                   
                     <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST" style="display: flex;">
      
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-primary" href="{{ url("images/create?o_type=product&o_id={$product->id}") }}">Add Image</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection