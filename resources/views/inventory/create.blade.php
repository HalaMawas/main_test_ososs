@extends('master')
   @section('style')
   <style type="text/css">
       input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
   </style>
   @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create inventories</div>
                <div class="card-body">
                    <form method="post" action="{{ route('inventories.store') }}" enctype="multipart/form-data">
                            @csrf
                             @if (session('error'))
                                    <div class="row">
                                        <div class="form-group col-md-12 ">
                                            <div class="alert alert-danger" style="text-align: center;">
                                                {!! session('error') !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="row">
                                        <div class="form-group col-md-12 " style="text-align: center;">

                                            <div class="alert alert-success">
                                                {!! session('success') !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                             <div class="form-group">
                                <label class="Product">Product: </label>
                                <select name="product_id"  class="form-control" required>
                                    <option value="" selected>please select the product</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="unit">Unit: </label>
                                <select name="unit_id"  class="form-control" required>
                                    <option value="" selected>please select the unit</option>
                                    @foreach($units as $unit)
                                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                <label class="amount">amount: </label>
                                <input name="amount" placeholder="add the amount" class="form-control" required>
                                    
                            </div>
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection