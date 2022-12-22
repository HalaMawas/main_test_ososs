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
                <div class="card-header">add image to {{$type}} {{$object->name}}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('images.store') }}" enctype="multipart/form-data">
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
                            <input type="text" name="o_type" value="{{$type}}" hidden>
                            <input type="text" name="o_id" value="{{$object->id}}" hidden>
                            
                             <div class="form-group">
                                <label >select image for : </label>
                                <input name="path" type="file" placeholder="add the image" class="form-control" required>
                                    
                            </div>
                             <div class="form-group">
                                <label class="description">description: </label>
                                <input name="description" placeholder="add the description" class="form-control" required>
                                    
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