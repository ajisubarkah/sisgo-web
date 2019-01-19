@extends('templates.default')

@section('body')
<div class="content">
    <a href="{{url('storages/new')}}" class="btn btn-primary btn-round" style="margin: 0px 30px 30px">
        <i class="material-icons">add</i>New
    </a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Table Goods</h4>
                        <p class="card-category">List of all goods item</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <th><strong>ID</strong></th>
                                    <th><strong>Name</strong></th>
                                    <th><strong>QRCode</strong></th>
                                    <th><strong>Barcode</strong></th>
                                    <th><strong>Selling Price</strong></th>
                                    <th><strong>Purchase Price</strong></th>
                                    <th><strong>Stock</strong></th>
                                    <th><strong>Action</strong></th>
                                </thead>
                                @foreach($goods as $data)
                                <tbody>
                                    @if($data->stock == 0)
                                    <tr style="color: red">
                                    @else
                                    <tr>
                                    @endif
                                        <td name="id">{{$data->id}}</td>
                                        <td>{{$data->name}}</td>
                                        <td><img src='data:image/png;base64,{!!base64_encode(QrCode::format("png")->size(100)->generate($data->barcode))!!}'></td>
                                        <td>{{$data->barcode}}</td>
                                        <td>{{App\Goods::convertToRupiah($data->selling)}}</td>
                                        <td>{{App\Goods::convertToRupiah($data->purchase)}}</td>                                        
                                        <td>{{$data->stock}}</td>
                                        <td class="td-actions text-left">
                                            <a style="background: none; border: none" href="{{url('storages/'.$data->id.'/edit')}}" rel="tooltip" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Good">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                            <a style="background: none; border: none" href="{{url('storages/'.$data->id.'/view')}}" rel="tooltip" class="btn btn-primary btn-link btn-sm" data-original-title="Detail Good">
                                                <i class="material-icons">visibility</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                {{$goods->links()}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection