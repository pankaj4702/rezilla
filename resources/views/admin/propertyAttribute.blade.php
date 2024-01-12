@extends('admin.main.main')

@section('content-admin')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Property Attribute</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Add Property Attribute</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Property Attribute </h3>
            </div>
            @if (count($errors) > 0)
       <div class = "alert alert-danger">
          <ul class="title_count1">
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
             @endforeach
          </ul>
       </div>
    @endif
    @if (session('success'))
  <div class="alert alert-danger">
          <ul>
              <li> {{ session('success') }}</li>
          </ul>
  </div>
    @endif
            <form id="quickForm" action="{{route('store_attribute')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Property Type</label>
                  <input type="text" name="type" autocomplete="off" class="form-control" id="type"  placeholder="Enter product">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Property Status</label>
                  <input type="text" id="status" autocomplete="off" name="status" class="form-control"  placeholder="Enter Price">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Property Source</label>
                  <input type="text" id="source" autocomplete="off" name="source" class="form-control"  placeholder="Enter address">
                </div>
                <div class="form-group" >
                    <label>Category</label><br>
                    <input type="radio" id="sell" name="category" value="1">
                    <label for="sell">For Sell</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="rent" name="category" value="2">
                    <label for="rent">For Rent</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input type="radio" id="both" name="category" value="0" checked>
                    <label for="both">Both</label><br>
                </div>
                <div class="form-group" id="configuration" >
                    <label>Other Configuration</label><br>
                   <div class="check-flex-container">
                    @foreach($configurations as $configuration)
                    <div class="form-check check-flex-item">
                        <input class="form-check-input" name="config[]" type="checkbox" value="{{ $configuration->id }}" id="{{ $configuration->name }}">
                        <label class="form-check-label" for="{{ $configuration->name }}">
                       {{ $configuration->name }}
                        </label>
                    </div>
                    @endforeach

                   </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
          </div>
          </div>
        <div class="col-md-6">
        </div>
      </div>
    </div>
  </section>
@endsection
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<script>
     $(document).ready(function() {
        $('#configuration').hide();
      $('#type').keyup(function(){
        if($(this).val().length)
        $('#configuration').show();
    else
    $('#configuration').hide();
      });
   });
</script>
