@extends('admin.layout.master')
@section('main-content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">brand Edit form</h4>
          <p class="card-description">
            make your own brand
          </p>
         <form action="{{ route('admin.brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="title">Name</label>
              <input name="name" type="name" class="form-control" id="name" placeholder="name" value="{{ $brand->name }}">
            </div>
            <div class="form-group">
                <label for="formFileSm" class="form-label">Image</label>
                <input name="image" class="form-control form-control-sm " id="formFileSm" type="file">
                <br>
                <img src="{{asset('uploads/brand').'/'.$brand->image}}" alt="" height='50' weight='50'>

              </div>

              <div class="form-group">
                <label for="status">status</label>
                <select name="status" class="form-control form-control-sm " id="status" aria-placeholder="status">
                    <option value="0" {{ $brand->status == 0 ? 'selected' : '' }} >In Active</option>
                    <option value="1" {{ $brand->status == 1 ? 'selected' : '' }} > Active</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary me-2">Update</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>
    <!-- <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Horizontal Form</h4>
          <p class="card-description">
            Horizontal form layout
          </p>
          <form class="forms-sample">
            <div class="form-group row">
              <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">
              </div>
            </div>
            <div class="form-check form-check-flat form-check-primary">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input">
                Remember me
              </label>
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div> -->
  </div>
@endsection()
