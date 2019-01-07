@extends('templates.default')

@section('body')
@include('templates.message')
<div class="content">
    <a href="{{url('account')}}" class="btn btn-primary btn-round" style="margin: 0px 30px 30px">Back</a>
    <div class="container-fluid">
        <form method="POST" action="{{URL::route('newaccount')}}" enctype="multipart/form-data" id="FormValidation">
            {{csrf_field()}}  
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">New Profile</h4>
                            <p class="card-category">Added new account.</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group ">
                                        <label class="bmd-label-floating">Username </label>
                                        <input name="username" type="text" class="form-control" id="username" required>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fullname</label>
                                        <input name="fullname" type="text" class="form-control" id="fullname" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email address</label>
                                        <input name="email" type="email" class="form-control" id="email" required>
                                    </div>
                                </div>
                            
                         
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Password</label>
                                    <input name="password" type="password" id="password" class="form-control" minLength="6" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Confirm Password</label>
                                    <input name="password_confirmation" type="password" id="password_confirmation" equalTo="#password" class="form-control" minLength="6" required>
                                </div>
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary pull-right">New Account</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="margin-top: 20px; margin-bottom: 50px">
                            <img src="{{url('image/no_photo.png')}}">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="margin-top: 20px; margin-bottom: 50px;"></div>
                            <div>
                                <span class="btn btn-primary btn-round btn-file">
                                    <span class="fileinput-new">Add Photo</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="hidden">
                                    <input type="file" name="photo">
                                </span>
                                <br>
                                <a class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                                    <i class="fa fa-times"></i>Remove                            
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