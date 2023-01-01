@extends('layouts.master')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                  <h3 class="card-title">Dishes</h3>
                  <a href="/dish/create" class="btn btn-success" style="float: right">Create</a>
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
                      <th>Name</th>
                      <th>Category</th>
                      <th>Created</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($dishes as $dish)
                        <tr>
                            <td>{{$dish->name}}</td>
                            <td>{{$dish->category->name}}</td>
                            <td>{{$dish->created_at}}</td>
                            <td>
                                <a href="/dish/{{$dish->id}}/edit" class="btn btn-warning">Edit</a>
                                <form action="/dish/{{$dish->id}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this item?')">Delete</button>
                                </form>
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
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
