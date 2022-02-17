@extends('frontend.main_master')
@section('content')


<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <img class="card-img-top" style="border-radius: 50%; width: 100px;height:100px;margin-left: 30px;" src="{{(!empty($user->profile_image))?url(asset('images/user_images/'.$user->profile_image)) : url(asset('backend/images/avatar/avatar-1.png'))}}">
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
                <h3 class="test-center">
                <strong> Update Your Password</strong>
            </h3>
            <div class="card-body">
                <form method="post" action="{{route('user.password.update')}}" enctype="multipart/form-data" accept="" >
                    @csrf
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Current Password<span></span></label>
		        	    <input type="password" id="current_password" name="current_password" placeholder="******"  class="form-control"  >
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">New Password<span></span></label>
		        	    <input type="password" id="newPassword" name="newPassword" placeholder="******"  class="form-control" >
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Confirm Password <span></span></label>
		        	    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="******"  class="form-control"  >
                    </div>

                   
                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button> <br><br>
                </form>

            </div>





           
        </div> <!-- end of col md 6 -->
        </div>  <!-- end of row -->
    </div>  <!-- end of container -->
</div>   <!-- end of body container -->




@endsection