@extends('master')
@section('content')

<div class="container custom-product">
    <h4>Result for Products</h4>
    <a href="ordernow" class="btn btn-success" style="margin-bottom: 10px">Order Now</a>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">Images</th>
            <th class="text-center">Products</th>
            <th class="text-center">Description</th>
            <th class="text-center" colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
          <tr>
            <td class="text-center"><img src={{$product->gallery}} alt="china" class="trending-image"></td>
            <td class="text-center">{{$product->name}}</td>
            <td class="text-center">{{$product->description}}</td>
            <td class="text-center"><a href="/detail/{{$product->id}}" class="btn btn-primary">Product</a></td>
            <td class="text-center"><a href="/removecart/{{$product->cart_id}}" class="btn btn-danger">Remove From Chart</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection