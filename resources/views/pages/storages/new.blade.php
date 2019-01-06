@extends('templates.default')

@section('body')
<div class="content">
    <a href="{{url('storages')}}" class="btn btn-primary btn-round" style="margin: 0px 30px 30px">Back</a>
    <div class="container-fluid">
        <form method="POST" action="{{URL::route('newgoods')}}" enctype="multipart/form-data" id="FormValidation">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">New Goods</h4>
                            <p class="card-category">Added new goods to storage.</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group ">
                                    <label class="bmd-label-floating">Name</label>
                                    <input name="name" type="text" class="form-control" id="name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label class="bmd-label-floating">Barcode</label>
                                    <input name="barcode" type="text" class="form-control" id="barcode" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="bmd-label-floating">Selling Price</label>
                                    <input name="selling" type="text" class="form-control" id="selling" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="bmd-label-floating">Purchase Price</label>
                                    <input name="purchase" type="text" class="form-control" id="purchase" required>
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-primary pull-right">Update Goods</button>
                            <div class="clearfix"></div>
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
    var selling = document.getElementById("selling");
        selling.addEventListener("keyup", function(e) {
        selling.value = formatRupiah(this.value, "Rp. ");
    });

    var purchase = document.getElementById("purchase");
        purchase.addEventListener("keyup", function(e) {
        purchase.value = formatRupiah(this.value, "Rp. ");
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
</script>
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