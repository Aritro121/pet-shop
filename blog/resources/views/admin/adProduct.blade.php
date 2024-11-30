@extends("adminDash")
@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Add Product</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add Product</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Product</h3>
                </div>
                <!-- form start -->
                <form action="{{ route('productStore') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">                  
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Icon</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                        @error('image')
                          <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" value="{{ old('title') }}" name="title" id="exampleInputEmail1" placeholder="Enter title">
                      @error('title')
                          <p class="help-block text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sub Title</label>
                        <input type="text" class="form-control" value="{{ old('subtitle') }}" name="subtitle" id="exampleInputEmail1" placeholder="Enter subtitle">
                        @error('subtitle')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" class="form-control" value="{{ old('price') }}" name="price" id="exampleInputEmail1" placeholder="Enter price">
                        @error('price')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea class="form-control" rows="3" name="description" placeholder="Enter short description">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
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
