@extends('master')
@section('content')
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <form action="login" method="POST" >
                <div class="form-group">
                    @csrf
                    <label for="Email">Email Address</label>
                    <input type="email" id="Email" name="email" placeholder="Email Address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" id="Password" name="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection