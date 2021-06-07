@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($product))Edit @else Create @endif </h1> <hr>

    <div class="col-8 m-auto">

        @if(isset($product))
          <form name="formEdit" id="formEdit" method="post" action="{{url("products/$product->id")}}" enctype="multipart/form-data">
            @method('PUT')
        @else
          <form name="formCreate" id="formCreate" method="post" action="{{url('products')}}" enctype="multipart/form-data">
        @endif


            @csrf
            <input class="form-control" type="text" name="title" id="title" placeholder="Title:" value="{{$product->title ?? ''}}" required><br>
            <input class="form-control" type="text" name="description" id="description" placeholder="Description:" value="{{$product->description ?? ''}}"><br>
            @if(!isset($product))
              <input type="file" name="image" value="{{$product->image ?? ''}}" required>
              <br></br>
            @endif
            <input class="form-control" type="number" name="stock" id="stock" placeholder="Stock:" value="{{$product->stock ?? ''}}" required><br>
            <input class="btn btn-primary" type="submit" value="@if(isset($product))Edit @else Create @endif">
        </form>
        <br>
        @if ($errors->any())
        <div class="alert alert-secondary" role="alert">
            <div class="alert-icon">
                <i class="flaticon-warning "></i>
            </div>
            <div class="alert-text">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div><br />
        @endif
    </div>
@endsection
