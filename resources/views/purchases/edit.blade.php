@extends('master')

@section('content')
	<section class="content-header">
  		<h1>Edit Purchase</h1>
  	</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Purchase</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/purchases/{{$purchase->id}}">
              @method('PATCH')
              @csrf
              <div class="box-body">
                @include('inc.error')
              	<div class="col-md-6">	
					<div class="form-group">
	                  <label>Name</label>
	                  <input name="name" type="text" class="form-control" placeholder="Name" value="{{$purchase->name}}">
	                </div>
              	</div>

                <div class="col-md-6">  
          <div class="form-group">
                    <label>Color</label>
                    <input name="color" type="text" class="form-control" placeholder="Color" value="{{$purchase->color}}">
                  </div>
                </div>

                <div class="col-md-6">  
          <div class="form-group">
                    <label for="exampleInputPassword1">Brand</label>
                    <select name="brand_id" class="form-control select2" style="width: 100%;">
                      <option  value="">Select</option>
                      @if(count($brands)>0)
                        @foreach($brands as $brand)
                          <option value="{{$brand->id}}" @if($purchase->brand_id==$brand->id) selected="selected" @endif>{{$brand->name}}</option>  
                        @endforeach
                      @endif
                  </select>
                  </div>
                </div>
                <div class="col-md-6">  
          <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select name="category_id" class="form-control select2" style="width: 100%;">
                      <option  value="">Select</option>
                      @if(count($categories)>0)
                        @foreach($categories as $category)
                          <option value="{{$category->id}}" @if($purchase->category_id==$category->id) selected="selected" @endif>{{$category->name}}</option>  
                        @endforeach
                      @endif
                  </select>
                  </div>
                </div>
                
                <div class="col-md-6">	
					<div class="form-group">
	                  <label for="exampleInputPassword1">Is Active</label>
	                  <select name="is_active" class="form-control select2" style="width: 100%;">
		                  <option  value="">Select</option>
		                  <option value="1" @if ($purchase->is_active=='1') selected="selected" @endif>Yes</option>
		                  <option value="0" @if ($purchase->is_active=='0') selected="selected" @endif>No</option>
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