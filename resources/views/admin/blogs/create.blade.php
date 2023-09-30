@extends('admin.layout.master')
@section('main-content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Blog form</h4>
          <p class="card-description">
            make your own blog
          </p>
         <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input name="title" type="title" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="formFileSm" class="form-label">Image</label>
                <input name="image" class="form-control form-control-sm " id="formFileSm" type="file">
              </div>
            <div class="form-group">
              <label for="short-description">Short Description</label>
              <input name="short_desciption" type="short_desciption" class="form-control" id="short-description" placeholder="Short Description">
            </div>
            <div class="form-group">
                <label for="long-description">Long Description</label>
                <input name="long_description" type="long-description" class="form-control" id="long-description" placeholder="Long Description">
              </div>
              <div class="form-group">
                <label for="added-by">Added By</label>
                <input name="added_by" type="added-by" class="form-control" id="added-by" placeholder="Title">
              </div>

            <button type="submit" class="btn btn-primary me-2">Submit</button>
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
