@extends('templates.template')

@section('content')
    <h1 class="text-center">View</h1> <hr>

    <div class="col-8 m-auto">
        Id: {{$product->id}}<br>
        Title: {{$product->title}}<br>
        Description: {{$product->description}}<br>
        Image: {{$product->image}}<br>
        <img src="{{asset('storage/images/'.$product->image)}}" width="240" height="240"><br>
        Stock: {{$product->stock}}<br>
    </div>
@endsection
