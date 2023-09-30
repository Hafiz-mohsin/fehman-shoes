@extends('admin.layout.master')
@section('main-content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Striped Table</h4>
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary text-white me-0"><i class="fa fa-plus"></i> Create</a>

            <p class="card-description">
              Add class <code>.table-striped</code>
            </p>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>  Title </th>
                    <th>  slug </th>
                    <th>  Image </th>
                    <th>  Status </th>
                    <th>  Mannage  </th>


                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category )
                  <tr>
                    <td class="py-1">  {{ $category->title }} </td>
                    <td> {{ $category->slug }} </td>
                    <td>
                        <img src="{{asset('uploads/').'/'.$category->image}}" alt="" height='50' weight='50'>
                    </td>

                    <td>
                      {{ $category->status == 1 ? 'Active' : 'In Active' }}
                    </td>
                    <td>
                      <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-info btn-flat btn-sm"> <i class="fas fa-edit"></i></a>
                     <form action="{{ route('admin.category.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                      <button class="btn btn-danger btn-flat btn-sm"> <i class="fas fa-trash"></i></button>
                    </form>
                    </td>
                  </tr>
                  @endforeach
                  <!-- <tr>
                    <td class="py-1">
                      <img src="../../images/faces/face3.jpg" alt="image"/>
                    </td>
                    <td>
                      John Richards
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $138.00
                    </td>
                    <td>
                      Apr 12, 2015
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../images/faces/face4.jpg" alt="image"/>
                    </td>
                    <td>
                      Peter Meggik
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 77.99
                    </td>
                    <td>
                      May 15, 2015
                    </td>
                    <td>
                      <button type="button" class="btn btn-square btn-primary m-2"><i class="fa fa-home"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../images/faces/face5.jpg" alt="image"/>
                    </td>
                    <td>
                      Edward
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 160.25
                    </td>
                    <td>
                      May 03, 2015
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../images/faces/face6.jpg" alt="image"/>
                    </td>
                    <td>
                      John Doe
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 123.21
                    </td>
                    <td>
                      April 05, 2015
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../images/faces/face7.jpg" alt="image"/>
                    </td>
                    <td>
                      Henry Tom
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      $ 150.00
                    </td>
                    <td>
                      June 16, 2015
                    </td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection()
