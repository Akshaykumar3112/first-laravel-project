@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                <h3 class="test-center"> <span class="text-danger">Hi....</span>
                <strong>{{Auth::user()->name}} Update Your Profile</strong>
            </h3>
            <div class="card-body">
                <form method="post" action="{{route('user.profile.update')}}" enctype="multipart/form-data" accept="" >
                    @csrf
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Name<span></span></label>
		        	    <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control"  >
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Email Address<span></span></label>
		        	    <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Contact Number<span></span></label>
		        	    <input type="text" id="phone" name="phone" value="{{$user->phone}}" class="form-control"  >
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Profile Picture <span></span></label>
		        	    <input type="file" id="profilePhoto" name="profilePhoto" class="form-control"  >
                    </div>
                    <div class="widget-user-image">
					  <img  style="width: 100px;height:100px;" id="showProfilePhoto" src="{{(!empty($user->profile_image))?url(asset('images/user_images/'.$user->profile_image)) : url(asset('backend/images/avatar/avatar-1.png'))}}" alt="User Avatar">
					</div><br>
                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button> <br><br>
                </form>

            </div>





           
        </div> <!-- end of col md 6 -->
        </div>  <!-- end of row -->
    </div>  <!-- end of container -->
</div>   <!-- end of body container -->

<script type="text/javascript" >
$(document).ready(function(){
    $('#profilePhoto').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showProfilePhoto').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    }); 
});   
</script>






@endsection