@extends('templates.default')

@section('body')
<div class="content">
  <div class="container-fluid">
    <form>
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
                <div class="form-group bmd-form-group is-filled">
                  <label class="bmd-label-floating">Username </label>
                  <input type="text" class="form-control" value="{{auth()->user()->username}}" disabled>
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-group bmd-form-group is-filled">
                  <label class="bmd-label-floating">Fullname</label>
                  <input type="text" class="form-control" value="{{auth()->user()->name}}">
                </div>
              </div>
              <div class="col-md-12">
              <div class="form-group bmd-form-group">
                    <label for="exampleEmail" class="bmd-label-floating"> Email Address *</label>
                    <input type="email" class="form-control" id="exampleEmail" required="true" aria-required="true">
                </div>
                <div class="form-group bmd-form-group is-filled">
                  <label class="bmd-label-floating">Email address</label>
                  <input type="email" class="form-control" required="true" value="{{auth()->user()->email}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">New Password</label>
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Confirm Password</label>
                  <input type="text" class="form-control">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="fileinput text-center fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="margin-top: 20px">
              @if(auth()->user()->photo==null)
              <img src="{{url('image/no_photo.png')}}">
              @else
              <img src="{{auth()->user()->photo}}">
              @endif
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="margin-top: 20px"></div>
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