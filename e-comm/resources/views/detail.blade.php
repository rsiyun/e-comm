@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-image" src="{{$data->gallery}}" alt="">
        </div>
        <div class="col-sm-6">
            <a href="/">Go Back</a>
            <h2>{{$data->name}}</h2>
            <h3>Price: {{$data->price}}</h3>
            <h4>Details: {{$data->description}}</h4>
            <h4>Category: {{$data->category}}</h4>
            <br/>
            <form action="/add_to_cart" method="post">
                @csrf
                <input type="hidden" value={{$data->id}} name="product_id">
                <button class="btn btn-primary">Add to Cart</button>
            </form>
            
            <br>
            <br>
            <button class="btn btn-success">Buy Now</button>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection