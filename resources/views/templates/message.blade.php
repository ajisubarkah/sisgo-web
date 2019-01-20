@if(count($errors) > 0)
    @foreach($errors->all() as $error)
<div data-notify="container" class="col-11 col-md-4 alert alert-danger" alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;">
    <button type="button" aria-hidden="true" data-dismiss="alert" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
        <i class="material-icons">close</i>
    </button>
    <span data-notify="message">
        <b>Error -</b> {{$error}}
    </span>
</div>
    @endforeach
@endif

@if(session('success'))
<div data-notify="container" class="col-11 col-md-4 alert alert-success alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;">
    <button type="button" aria-hidden="true" data-dismiss="alert" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
        <i class="material-icons">close</i>
    </button>
    <i data-notify="icon" class="material-icons">add_alert</i>
    <span data-notify="title"></span>
    <span data-notify="message">
        Success - {{Session::get('success')}}
    </span>
    <a href="#" target="_blank" data-notify="url"></a>
</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif