@extends('master')
@section('content')
    <div class="container custom-product">
        <div class="col-sm-10">
            <table class="table">
                <tbody>
                  <tr>
                    <td class="text-center">Amount</td>
                    <td class="text-center">{{$total}}</td>
                  </tr>
                  <tr>
                    <td class="text-center">Tax</td>
                    <td class="text-center">$ 0</td>
                  </tr>
                  <tr>
                    <td class="text-center">Delivery</td>
                    <td class="text-center">$ 10</td>
                  </tr>
                  <tr>
                    <td class="text-center">Total Amount</td>
                    <td class="text-center">{{$total+10}}</td>
                  </tr>
                </tbody>
              </table>
        </div>
        <form action="/orderplace" method="POST" >
            @csrf
              <div class="form-group">
                <textarea name="address" placeholder="enter your address" class="form-control" ></textarea>
              </div>
              <div class="form-group">
                <label for="pwd">Payment Method</label> <br> <br>
                <input type="radio" value="cash" name="payment"> <span>online payment</span> <br> <br>
                <input type="radio" value="cash" name="payment"> <span>EMI payment</span> <br><br>
                <input type="radio" value="cash" name="payment"> <span>Payment on Delivery</span> <br> <br>

              </div>
              <button type="submit" class="btn btn-default">Order Now</button>
            </form>
    </div>
@endsection