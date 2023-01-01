<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Form</title>

    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Data Tables -->
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}
</style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                  <h4>Order Form</h4>
                </div>
                <div class="col-4">
                    <form action="/search" method="post">
                        @csrf
                        <div class="input-group">
                          <input type="text" name="search" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-default btn-sm" type="submit">
                                <span class="material-symbols-outlined">
                                    search
                                </span>
                            </button>
                          </div>
                        </div>
                      </form>
                </div>
              </div>
              <!-- ./row -->

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-12">
                  <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                      <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">New Order</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Order List</a>
                        </li>

                      </ul>
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            <form action="{{route('order.submit')}}" method="post">
                                @csrf
                                <div class="row">
                                    @foreach ($dishes as $dish)
                                    <div class="col-sm-3">
                                        <div class="card">
                                          <div class="card-body">
                                              <img src="{{url('/images/'.$dish->image)}}" alt="" width="100" height="100"><br>
                                              <label for="">{{$dish->name}}</label><br>
                                              <input type="number" name="{{$dish->id}}" min="0">
                                          </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <select name="table" id="">
                                        <option value="">Select Table</option>
                                    @foreach ($tables as $table)
                                        <option value="{{$table->id}}">{{$table->number}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                            <table  class="table table-bordered table-striped">
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
                                            <a href="{{route('order.serve',$order->id)}}" class="btn btn-warning">Serve</a>

                                        </td>
                                      </tr>
                                    @endforeach

                              </table>
                        </div>

                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                </div>

              </div>
        </div>
    </div>







<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>

<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

</body>
</html>






