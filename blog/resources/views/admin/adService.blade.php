@extends("adminDash")
@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Add Service</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add Service</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
    <div class="content ">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Service</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Icon</label>
                      <div class="input-group">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" name='image' id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                                @error('image')
                                  <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                          </div>
                      </div>
                      
                  </div>
                  
                  <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" value="{{ old('title') }}" name='title' id="exampleInputEmail1" placeholder="Enter title">
                      @error('title')
                          <p class="help-block text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  
                  <div class="form-group">
                      <label for="exampleInputEmail1">Price</label>
                      <input type="text" class="form-control" value="{{ old('price') }}" name='price' id="exampleInputEmail1" placeholder="Enter price">
                      @error('price')
                          <p class="help-block text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  
                    
                    <h5>We provide -</h5>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="feeding" type="checkbox" id="customCheckbox1" value="1" {{ old('feeding') ? 'checked' : '' }}>
                        <label for="customCheckbox1" class="custom-control-label">Feeding</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="boarding" type="checkbox" id="customCheckbox2" value="1" {{ old('Boarding') ? 'checked' : '' }}>
                        <label for="customCheckbox2" class="custom-control-label">Boarding</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="spa" type="checkbox" id="customCheckbox3" value="1" {{ old('spa') ? 'checked' : '' }}>
                        <label for="customCheckbox3" class="custom-control-label">Spa & Grooming</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="medicine" type="checkbox" id="customCheckbox4" value="1" {{ old('medicine') ? 'checked' : '' }}>
                        <label for="customCheckbox4" class="custom-control-label">Veterinary Medicine</label>
                    </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
        </div>
    </div>
</div>
@endsection