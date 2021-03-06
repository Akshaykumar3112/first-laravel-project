@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
<!-- Main content -->
<section class="content">
<!-- Basic Forms -->
<div class="box">
<div class="box-header with-border">
    <h4 class="box-title">Edit Admin Profile</h4>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div class="row">
    <div class="col">
        <form method="post" novalidate="" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>Admin Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="name" class="form-control" value="{{$editAdminData->name}}" data-validation-required-message="This field is required"> <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>Email <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="email" name="email" value="{{$editAdminData->email}}" class="form-control" data-validation-required-message="This field is required"> <div class="help-block"></div>
                            </div>
                        </div>
                    </div>        
                </div>
                <div class="form-group">
                    <h5>Profile Photo <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="file" name="profilePhoto" id="profilePhoto" class="form-control" required="">
                    </div>
                    <div class="widget-user-image">
					  <img  style="width: 100px;height:100px;" id="showProfilePhoto" src="{{(!empty($editAdminData->profile_photo))?url(asset('images/admin_images/'.$editAdminData->profile_photo)) : url(asset('backend/images/avatar/avatar-1.png'))}}" alt="User Avatar">
					</div>
                </div>
              
            <div class="text-xs-right">
                <input type="submit" class="btn btn-rounded btn-primary mb-5" value= "Update">
            </div>
        </form>

    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>
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