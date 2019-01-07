@extends('templates.default')

@section('body')
<div class="content">
    <a href="{{url('storages')}}" class="btn btn-primary btn-round" style="margin: 0px 30px 30px">Back</a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Table History</h4>
                        <p class="card-category">Look your history stock.</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <th><strong>ID</strong></th>
                                    <th><strong>Username</strong></th>
                                    <th><strong>Added Stock</strong></th>
                                    <th><strong>Date</strong></th>
                                </thead>
                                @foreach($stocks as $data)
                                <tbody>
                                    <tr>
                                        <td name="id">{{$data->id}}</td>
                                        <td>{{App\User::find(App\Restock::find($data->restock_id)->user_id)->username}}</td>
                                        <td>{{$data->add_stock}}</td>
                                        <td>{{App\Restock::find($data->restock_id)->created_at->format('d M y H:i')}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                                {{$stocks->links()}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection