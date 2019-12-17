@extends('master')

@section('content')
	<section class="content-header">
  		<h1>Add Supplier</h1>
  	</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Supplier</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/suppliers">
              @csrf
              
              <div class="box-body">
              	@include('inc.error')
                <div class="col-md-6">	
					<div class="form-group">
	                  <label>Name</label>
	                  <input name="name" type="text" class="form-control" placeholder="Name" value="{{old('name')}}">
	                </div>
              	</div>
                <div class="col-md-6">  
          <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                  </div>
                </div>
                <div class="col-md-6">  
          <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" type="text" class="form-control" placeholder="Phone" value="{{old('phone')}}">
                  </div>
                </div>
                <div class="col-md-6">  
          <div class="form-group">
                    <label>Address</label>
                    <input name="address" type="text" class="form-control" placeholder="Address" value="{{old('address')}}">
                  </div>
                </div>
                <div class="col-md-6">  
          <div class="form-group">
                    <label>Contact Person</label>
                    <input name="contact_person" type="text" class="form-control" placeholder="Address" value="{{old('contact_person')}}">
                  </div>
                </div>
                
                <div class="col-md-6">	
					<div class="form-group">
	                  <label for="exampleInputPassword1">Is Active</label>
	                  <select name="is_active" class="form-control select2" style="width: 100%;">
		                  <option  value="">Select</option>
                      <option value="1" @if(old('is_active')=='1') selected="selected" @endif>Yes</option>
                      <option value="0" @if(old('is_active')=='0') selected="selected" @endif>No</option>
	                </select>
	                </div>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('additional_script')
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
@endsection