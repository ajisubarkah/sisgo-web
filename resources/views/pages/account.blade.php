@extends('templates.default')

@section('body')
<div class="content">
    <a href="{{url('account/new')}}" class="btn btn-primary btn-round" style="margin: 0px 30px 30px">
        <i class="material-icons">add</i>New
    </a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Table Account</h4>
                        <p class="card-category">List of all account</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <th><strong>ID</strong></th>
                                    <th><strong>Username</strong></th>
                                    <th><strong>Fullname</strong></th>
                                    <th><strong>Email</strong></th>
                                    <th><strong>Date Create</strong></th>
                                    <th><strong>Last Update</strong></th>
                                </thead>
                                @foreach($users as $data)
                                <tbody>
                                    <tr>
                                        <td name="id">{{$data->id}}</td>
                                        <td>{{$data->username}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->created_at->format('d M y H:i')}}</td>
                                        <td>{{$data->updated_at->format('d M y H:i')}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                                {{$users->links()}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection