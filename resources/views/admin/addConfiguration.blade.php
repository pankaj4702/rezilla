@extends('admin.main.main')

@section('content-admin')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Property configuration</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Add Property configuration</li>
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
              <h3 class="card-title">Add Property configuration </h3>
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
            <form id="quickForm" action="{{route('store_configuration')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Configuration</label>
                  <input type="text" name="type" autocomplete="off" class="form-control" id="type"  placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">No. of configuration</label>
                  <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    <button type="button" class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                      <i class="fas fa-minus"></i>
                    </button>

                    <input id="form1" min="0" name="quantity" value="1" type="number"
                      class="form-control form-control-sm" style="text-align: center;" />

                    <button type="button" class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                      <i class="fas fa-plus"></i>
                    </button>
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
