@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">

                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="card-title">Add Farmer Page </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Happy Haat</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Add Farmer</li>
                        </ol>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{ route('farmer.store') }}" id="myForm">
                            @csrf

                            <div class="row mb-4">
                                <label for="example-text-input" class="col-sm-1 col-form-label">Farmer Name</label>
                                <div class="form-group col-sm-11">
                                    <input name="name" class="form-control" type="text">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-1 col-form-label">Farmer Mobile</label>
                                <div class="form-group col-sm-11">
                                    <input name="mobile_no" class="form-control" type="text">
                                </div>
                            </div>
                            <!-- end row -->



                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-1 col-form-label">Farmer Email</label>
                                <div class="form-group col-sm-11">
                                    <input name="email" class="form-control" type="email">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-1 col-form-label">Farmer Address</label>
                                <div class="form-group col-sm-11">
                                    <input name="address" class="form-control" type="text">
                                </div>
                            </div>
                            <!-- end row -->




                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Farmer">
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
                mobile_no: {
                    required: true,
                },
                email: {
                    required: true,
                },
                address: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: 'Please Enter Farmer\'s Name',
                },
                mobile_no: {
                    required: 'Please Enter Farmer\'s Mobile Number',
                },
                email: {
                    required: 'Please Enter Farmer\'s Email',
                },
                address: {
                    required: 'Please Enter Farmer\'s Address',
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