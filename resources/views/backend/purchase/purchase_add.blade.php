@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">

                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="card-title">Add Purchase Page </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Happy Haat</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Add Purchase</li>
                        </ol>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label">Date</label>
                                    <input class="form-control example-date-input" name="date" type="date" id="date">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label">Purchase No</label>
                                    <input class="form-control example-date-input" name="purchase_no" type="text" id="purchase_no">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label">Farmer Name </label>
                                    <select id="farmer_id" name="farmer_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                        @foreach($farmer as $f)
                                        <option value="{{ $f->id }}">{{ $f->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label">Category Name </label>
                                    <select name="category_id" id="category_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>

                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label">Product Name </label>
                                    <select name="product_id" id="product_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label" style="margin-top:43px;"> </label>


                                    <i class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore"> Add</i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                    <form method="post" action="{{ route('purchase.store') }}">
                            @csrf
                            <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Product Name </th>
                                        <th>PCS/KG</th>
                                        <th>Unit Price </th>
                                        <th>Description</th>
                                        <th>Total Price</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody id="addRow" class="addRow">

                                </tbody>

                                <tbody>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td>
                                            <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount" readonly style="background-color: #ddd;">
                                        </td>
                                        <td></td>
                                    </tr>

                                </tbody>
                            </table><br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" id="storeButton"> Purchase Store</button>

                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>



    </div>
</div>

<script id="document-template" type="text/x-handlebars-template">

    <tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date[]" value="@{{date}}">
        <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
        <input type="hidden" name="farmer_id[]" value="@{{farmer_id}}">

    <td>
        <input type="hidden" name="category_id[]" value="@{{category_id}}">
        @{{ category_name }}
    </td>

     <td>
        <input type="hidden" name="product_id[]" value="@{{product_id}}">
        @{{ product_name }}
    </td>

     <td>
        <input type="number" min="1" class="form-control buying_qty text-right" name="buying_qty[]" value=""> 
    </td>

    <td>
        <input type="number" class="form-control unit_price text-right" name="unit_price[]" value=""> 
    </td>

 <td>
        <input type="text" class="form-control" name="description[]"> 
    </td>

     <td>
        <input type="number" class="form-control buying_price text-right" name="buying_price[]" value="0" readonly> 
    </td>

     <td>
        <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
    </td>

    </tr>

</script>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click",".addeventmore", function(){
            var date = $('#date').val();
            var purchase_no = $('#purchase_no').val();
            var farmer_id = $('#farmer_id').val();
            var category_id  = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();
            if(date == ''){
                $.notify("Date is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(purchase_no == ''){
                $.notify("Purchase No is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(farmer_id == ''){
                $.notify("Farmer is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(category_id == ''){
                $.notify("Category is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(product_id == ''){
                $.notify("Product Field is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                 var source = $("#document-template").html();
                 var tamplate = Handlebars.compile(source);

                 var data = {
                    date:date,
                    purchase_no:purchase_no,
                    farmer_id:farmer_id,
                    category_id:category_id,
                    category_name:category_name,
                    product_id:product_id,
                    product_name:product_name
                 };
                 var html = tamplate(data);
                 $("#addRow").append(html); 
        });
        $(document).on("click",".removeeventmore",function(event){
            $(this).closest(".delete_add_more_item").remove();
            totalAmountPrice();
        });
        $(document).on('keyup click','.unit_price,.buying_qty', function(){
            var unit_price = $(this).closest("tr").find("input.unit_price").val();
            var qty = $(this).closest("tr").find("input.buying_qty").val();
            var total = unit_price * qty;
            $(this).closest("tr").find("input.buying_price").val(total);
            totalAmountPrice();
        });
        // Calculate sum of amout in invoice 
        function totalAmountPrice(){
            var sum = 0;
            $(".buying_price").each(function(){
                var value = $(this).val();
                if(!isNaN(value) && value.length != 0){
                    sum += parseFloat(value);
                }
            });
            $('#estimated_amount').val(sum);
        }
        })


</script>



<script type="text/javascript">
    $(function() {
        $(document).on('change', '#farmer_id', function() {
            var farmer_id = $(this).val();
            $.ajax({
                url: "{{ route('get-category') }}",
                type: "GET",
                data: {
                    farmer_id: farmer_id
                },
                success: function(data) {
                    var html = '<option value="">Select Category</option>';
                    $.each(data, function(key, v) {
                        html += '<option value=" ' + v.category_id + ' "> ' + v.category.name + '</option>';
                    });
                    $('#category_id').html(html);
                }
            })
        });
    });
</script>

<script type="text/javascript">
    $(function() {
        $(document).on('change', '#category_id', function() {
            var category_id = $(this).val();
            $.ajax({
                url: "{{ route('get-product') }}",
                type: "GET",
                data: {
                    category_id: category_id
                },
                success: function(data) {
                    var html = '<option value="">Select Category</option>';
                    $.each(data, function(key, v) {
                        html += '<option value=" ' + v.id + ' "> ' + v.name + '</option>';
                    });
                    $('#product_id').html(html);
                }
            })
        });
    });
</script>


@endsection