@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <img class="card-img-top" style="border-radius: 50%; width: 100px;height:100px;margin-left: 30px;" src="{{(!empty(Auth::user()->profile_image))?url(asset('images/user_images/'.Auth::user()->profile_image)) : url(asset('backend/images/avatar/avatar-1.png'))}}">
                <br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block"> Home </a>
                    <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block"> Profile Update </a>
                    <a href="{{route('user.change.password')}}" class="btn btn-primary btn-sm btn-block"> Change Password </a>
                    <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block"> Logout </a>
                </ul>
            </div> <!-- end of col md 2 -->

            <div class="col-md-2">

            </div> <!-- end of col md 2 -->

            <div class="col-md-6">
                <h3 class="test-center"> <span class="text-danger">Hi....</span>
                <strong>{{Auth::user()->name}} Welcome to Amart Shop</strong>
            </h3>

            </div> <!-- end of col md 2 -->
        </div>  <!-- end of row -->
    </div>  <!-- end of container -->
</div>   <!-- end of body container -->








@endsection