@extends('layouts.master')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">

                  <h3 class="card-title">Create Dishes</h3>
                  <a href="/dish" class="btn btn-default" style="float: right">Back</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="/dish" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
                          </div>
                          <div class="form-group">
                            <label for="category">Category</label>
                            <select  class="form-control" name="category"  id="category">
                                <option value="">Select Category</option>
                                @foreach ($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="dish_image">Dish Image</label>
                            <input type="file" name="dish_image" id="dish_image"><br>
                          </div>

                          <button type="submit" class="btn btn-success">Submit</button>
                    </form>

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


