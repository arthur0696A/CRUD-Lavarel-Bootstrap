@extends('templates.template')

@section('content')
    <h1 class="text-center">Flexy Challenge</h1> <hr>

    <div class="text-center mt-3 mb-4">
        <a href="{{url('products/create')}}">
            <button class="btn btn-success">Create</button>
        </a>
    </div>

    <div class="col-8 m-auto">
        @csrf
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Stock</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($product as $products)
                <tr>
                    <th scope="row">{{$products->id}}</th>
                    <td>{{$products->title}}</td>
                    <td>{{$products->description}}</td>
                    <td>{{$products->image}}</td>
                    <td>{{$products->stock}}</td>

                    <td>
                        <a href="{{url("products/$products->id")}}">
                            <button class="btn btn-dark">Read</button>
                        </a>

                        <a href="{{url("products/$products->id/edit")}}">
                            <button class="btn btn-primary">Update</button>
                        </a>

                        <a href="{{url("products/$products->id")}}" class="js-del">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        
        {{$product->links()}}
    </div>
@endsection
