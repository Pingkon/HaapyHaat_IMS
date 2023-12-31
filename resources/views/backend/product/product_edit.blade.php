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

                        <form method="post" action="{{ route('product.update') }}" id="myForm">
                            @csrf

                            <input type="hidden" name="id" value="{{ $product->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Product Name </label>
                                <div class="form-group col-sm-10">
                                    <input name="name" value="{{ $product->name }}" class="form-control" type="text">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Farmer Name </label>
                                <div class="col-sm-10">
                                    <select name="farmer_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                        @foreach($farmer as $f)
                                        <option value="{{ $f->id }}" {{ $f->id == $product->farmer_id ? 'selected' : '' }}>{{ $f->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Unit Name </label>
                                <div class="col-sm-10">
                                    <select name="unit_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                        @foreach($unit as $u)
                                        <option value="{{ $u->id }}" {{ $u->id == $product->unit_id ? 'selected' : '' }}>{{ $u->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->



                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Category Name </label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                        @foreach($category as $c)
                                        <option value="{{ $c->id }}" {{ $c->id == $product->category_id ? 'selected' : '' }}>{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->


                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Product">
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
                supplier_id: {
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
                    required: 'Please Enter Your Product Name',
                },
                supplier_id: {
                    required: 'Please Select One Supplier',
                },
                unit_id: {
                    required: 'Please Select One Unit',
                },
                category_id: {
                    required: 'Please Select One Category',
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