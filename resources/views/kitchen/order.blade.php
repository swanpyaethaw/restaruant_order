@extends('layouts.master')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                  <h3 class="card-title">Order Listings</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                  <table id="dish" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Dish Name</th>
                        <th>Table Number</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->order_id}}</td>
                            <td>{{$order->dish->name}}</td>
                            <td>{{$order->table_id}}</td>
                            <td>{{$status[$order->status]}}</td>
                            <td>
                                <a href="{{route('order.approve',$order->id)}}" class="btn btn-warning">Approve</a>
                                <a href="/order/{{$order->id}}/cancel" class="btn btn-danger">Cancel</a>
                                <a href="/order/{{$order->id}}/ready" class="btn btn-success">Ready</a>
                            </td>
                          </tr>
                        @endforeach

                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>



<!-- Page specific script -->

@endsection
<script src="plugins/jquery/jquery.min.js"></script>
<script>
    $(function () {

      $('#dish').DataTable({
        "paging": true,
        "pageLength": 10,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
