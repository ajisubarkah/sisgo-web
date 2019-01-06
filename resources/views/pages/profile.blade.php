@extends('templates.default')

@section('body')
<div class="content">
  <div class="container-fluid">
    <form id="FormValidation">
    {{csrf_field()}}  
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Profile</h4>
            <p class="card-category">Complete your profile</p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-5">
                <div class="form-group ">
                  <label class="bmd-label-floating">Username </label>
                  <input type="text" class="form-control" id="username" value="{{$profile->username}}" disabled>
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-group">
                  <label class="bmd-label-floating">Fullname</label>
                  <input name="fullname" type="text" class="form-control" id="fullname" required="true" value="{{$profile->name}}">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Email address</label>
                  <input name="email" type="email" class="form-control" id="email" required="true" value="{{$profile->email}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">New Password</label>
                  <input name="password" type="password" id="password" class="form-control" minLength="6">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Confirm Password</label>
                  <input name="confirmPassword" type="password" id="confirmPassword" equalTo="#password" class="form-control">
                </div>
              </div>
            </div>
            <button type="submit" href="storages/edit" class="btn btn-primary pull-right">Update Profile</button>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="fileinput text-center fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="margin-top: 20px; margin-bottom: 50px">
              @if($profile->photo==null)
              <img src="{{url('image/no_photo.png')}}">
              @else
              <img src="{{auth()->user()->photo}}">
              @endif
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="margin-top: 20px; margin-bottom: 50px;"></div>
              <div>
                <span class="btn btn-primary btn-round btn-file">
                  <span class="fileinput-new">Add Photo</span>
                  <span class="fileinput-exists">Change</span>
                  <input type="hidden">
                  <input type="file" name="photo">
                  <div class="ripple-container">
                    <div class="ripple-decorator ripple-on ripple-out" style="left: 89.6719px; top: 8px; background-color: rgb(255, 255, 255); transform: scale(15.75);"></div>
                    <div class="ripple-decorator ripple-on ripple-out" style="left: 89.6719px; top: 8px; background-color: rgb(255, 255, 255); transform: scale(15.75);"></div>
                  </div>
                </span>
                <br>
                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                  <i class="fa fa-times"></i>Remove
                  <div class="ripple-container">
                    <div class="ripple-decorator ripple-on ripple-out" style="left: 66.6719px; top: 23px; background-color: rgb(255, 255, 255); transform: scale(15.5098);"></div>
                    <div class="ripple-decorator ripple-on ripple-out" style="left: 66.6719px; top: 23px; background-color: rgb(255, 255, 255); transform: scale(15.5098);"></div>
                    <div class="ripple-decorator ripple-on ripple-out" style="left: 66.6719px; top: 23px; background-color: rgb(255, 255, 255); transform: scale(15.5098);"></div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
  <script>
    function setFormValidation(id) {
      $(id).validate({
        highlight: function(element) {
          $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
          $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
        },
        success: function(element) {
          $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
          $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
        },
        errorPlacement: function(error, element) {
          $(element).closest('.form-group').append(error);
        },
      });
    }

    $(document).ready(function() {
      setFormValidation('#FormValidation');
    });
  </script>
@endpush