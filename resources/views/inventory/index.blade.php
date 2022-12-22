@extends('master')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Inventory</h1>
            <a href="{{ route('inventories.create') }}" class="btn btn-success" style="float: right">Create New Inventory</a>
             @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <th width="80px">Id</th>
                    <th>Product</th>
                    <th>Unit</th>
                    <th>amount</th>
                    <th width="150px">Action</th>
                </thead>
                <tbody>
                @foreach($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->id }}</td>
                    <td>{{ $inventory->product->name }}</td>
                    <td>{{ $inventory->unit->name }}</td>
                    <td>{{ $inventory->amount }}</td>
                   
                     <td>
                <form action="{{ route('inventories.destroy',$inventory->id) }}" method="POST" style="display: flex;">
   
    
   
                    @csrf
                    @method('DELETE')
      
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