@extends('master')
@section('content')

<div class="container custom-product">
    <h4>History Order</h4>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">Images</th>
            <th class="text-center">Products</th>
            <th class="text-center">Description</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($orders as $product)
          <tr>
            <td class="text-center"><img src={{$product->gallery}} alt="china" class="trending-image"></td>
            <td class="text-center">{{$product->name}}</td>
            <td>
                <ul>
                    <h5>Delivery Status : {{$product->status}}</h5>
                    <h5>Address : {{$product->address}}</h5>
                    <h5>Payment Status : {{$product->payment_status}}</h5>
                    <h5>Payment Method : {{$product->payment_method}}</h5>
                </ul>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection