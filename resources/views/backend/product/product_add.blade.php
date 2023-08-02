@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">

                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="card-title">Add Product Page </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Happy Haat</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{ route('product.store') }}" id="myForm">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-1 col-form-label">Product Name</label>
                                <div class="form-group col-sm-11">
                                    <input name="name" class="form-control" type="text">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label class="col-sm-1 col-form-label">Farmer Name</label>
                                <div class="col-sm-11">
                                    <select name="farmer_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Choose Farmer</option>
                                        @foreach($farmer as $f)
                                        <option value="{{$f->id}}">{{$f->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label class="col-sm-1 col-form-label">Unit</label>
                                <div class="col-sm-11">
                                    <select name="unit_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Choose Unit</option>
                                        @foreach($unit as $u)
                                        <option value="{{$u->id}}">{{$u->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label class="col-sm-1 col-form-label">Category</label>
                                <div class="col-sm-11">
                                    <select name="category_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Choose Category</option>
                                        @foreach($category as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Product">
                        </form>



                    </div>
                </div>
            </div> <!-- end col -->
        </div>



    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                name: {
                    required: true,
                },
                farmer_id: {
                    required: true,
                },
                unit_id: {
                    required: true,
                },
                category_id: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: 'Please Enter Product\'s Name',
                },
                farmer_id: {
                    required: 'Please Select Farmer',
                },
                unit_id: {
                    required: 'Please Select Unit',
                },
                category_id: {
                    required: 'Please Select Category',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>



@endsection