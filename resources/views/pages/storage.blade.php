@extends('templates.default')

@section('body')
<div class="content" style="min-height: 100vh">
    <div style="margin-left: 30px; margin-bottom: 20px">
        <a href="#pablo" class="btn btn-primary btn-round" style="background: #26c6da"><i class="material-icons">add</i>New<div class="ripple-container"></div></a>
    </div>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card" >
            <div class="card-header card-header-primary" style="background: #00bcd4;">
                <h4 class="card-title ">Table Goods</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th><strong>ID</strong></th>
                        <th><strong>Name</strong></th>
                        <th><strong>Barcode</strong></th>
                        <th><strong>Selling Price</strong></th>
                        <th><strong>Purchase Price</strong></th>
                        <th><strong>Stock</strong></th>
                    </thead>
                    @foreach($goods as $data)
                    <tbody>
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->barcode}}</td>
                            <td>{{App\Goods::convertToRupiah($data->selling)}}</td>
                            <td>{{App\Goods::convertToRupiah($data->purchase)}}</td>
                            <td>{{$data->stock}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection