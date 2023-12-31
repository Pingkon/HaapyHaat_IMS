@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Purchases</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Happy Haat</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">All Purchases</li>
                        </ol>
                    </div>



                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{route('purchase.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">Add Purchase</a> <br><br>

                        <h4 class="card-title">All Purchase Data </h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th>Purchase No</th>
                                    <th>Date</th>
                                    <th>Farmer</th>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>

                            </thead>


                            <tbody>

                                @foreach($allData as $key => $item)
                                <tr>
                                    <td> {{ $key+1}} </td>
                                    <td> {{ $item->purchase_no }} </td>
                                    <td> {{ date('d-m-Y',strtotime($item->date)) }} </td>
                                    <td> {{ $item['farmer']['name'] }} </td>
                                    <td> {{ $item['category']['name'] }} </td>
                                    <td> {{ $item['product']['name'] }} </td>
                                    <td> {{ $item->buying_qty }} </td>
                                    <td> {{ $item->unit_price }} </td>
                                    <td> {{ $item->buying_price }} </td>
                                    <td>
                                        @if($item->status == '0')
                                        <span class="btn btn-warning">Pending</span>
                                        @elseif($item->status == '1')
                                        <span class="btn btn-success">Approved</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status == '0')
                                        <a href="{{ route('purchase.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i> </a>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



    </div> <!-- container-fluid -->
</div>


@endsection