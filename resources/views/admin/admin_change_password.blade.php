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
        <form method="post" novalidate="" action="{{route('admin.new.password')}}" >
            @csrf
            <div class="row">
            <div class="col-12">
               
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5><span class="text-danger">Existing Password*</span></h5>
                            <div class="controls">
                                <input type="password" class="form-control"   name="oldPassword"  placeholder="******">     
                                @error('oldPassword')
                                    <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5><span class="text-danger">New Password*</span></h5>
                            <div class="controls">
                            <input type="password" class="form-control" required=""  name="newPassword"  placeholder="******">     
                            @error('newPassword')
                            <span class="text-danger">{{$message}} </span>
                            @enderror
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5><span class="text-danger">Confirm New Password*</span></h5>
                            <div class="controls">
                                <input type="password" class="form-control"   name="confirmPassword"  placeholder="******">     
                                @error('confirmPassword')
                                    <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @if(Session::has('error'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>{{Session::get('error')}}</strong>  
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif       
               
              
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
@endsection