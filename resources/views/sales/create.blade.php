@extends('master')
@section('additional_css')
<link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('bower_components/jquery-ui/themes/base/jquery-ui.css')}}">

<style type="text/css">
  .remove_product_row{
    margin: 0px;
    padding: 0px;
    font-size: 23px;
    text-align: right;
    cursor: pointer;
  }
</style>
@endsection
@section('content')

  <section class="content-header">
  		<h1>Add Sale</h1>
  	</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Sale</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/sales" id="add_sale_form">
              @csrf
              
              <div class="box-body">
              	@include('inc.error')
                <div class="col-md-6">	
					<div class="form-group">
	                  <label>Sale Number</label>
	                  <input name="sale_no" id="sale_no" type="text" class="form-control" placeholder="Sale Number" value="{{old('sale_no')}}">
	                </div>
              	</div>
                <div class="col-md-6">  
          <div class="form-group">
                    <label>Sale Date</label>
                    <input name="sale_date" id="sale_date" type="text" class="form-control" placeholder="Sale Date" value="{{old('sale_date')}}" readonly>
                  </div>
                </div>
                <div class="col-md-6">  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Customer</label>
                    <select name="customer_id" class="form-control select2" style="width: 100%;">
                      <option  value="">Select</option>
                        @if(count($customers)>0)
                        @foreach($customers as $customer)
                        <option value="{{$customer->id}}" @if(old('customer_id')==$customer->id) selected="selected" @endif>{{$customer->name}}</option>  
                        @endforeach
                        @endif
                    </select>
                  </div>
                </div>
                <div class="col-md-6">  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product</label>
                    <select name="product_id" id="product_id" class="form-control select2" style="width: 100%;">
                      <option  value="">Select</option>
                        @if(count($products)>0)
                        @foreach($products as $product)
                        <option value="{{$product->id}}|{{$product->name}}|{{$product->color}}|{{$product->brand->name}}|{{$product->category->name}}" @if(old('product_id')==$product->id) selected="selected" @endif>{{$product->name}}</option>  
                        @endforeach
                        @endif
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Color</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Remove</th>
                        
                      </tr>
                    </thead>
                    <tbody id="products_row_container">
                      @if(count(old('product_quantity'))>0)
                        @foreach(old('product_quantity') as $key => $quantity)
                          <tr id="product_row_{{$key+1}}" data-product-id="{{old('detail_product_id')[$key]}}">
                            <th scope="row">{{$key+1}}</th>
                            @php 
                              $foundProduct = getProductFromProductObjects($products, old('detail_product_id')[$key])
                            @endphp
                            <td>{{$foundProduct->name}}</td>
                            <td>{{$foundProduct->color}}</td>
                            <td>{{$foundProduct->brand->name}}</td>
                            <td>{{$foundProduct->category->name}}</td>
                            <td>
                              <input name="detail_product_id[]" id="detail_product_id_{{$key+1}}" type="hidden" value="{{old('detail_product_id')[$key]}}"/>
                              <input name="product_description[]" class="form-control product_description" type="text" id="product_description_{{$key+1}}" value="{{old('product_description')[$key]}}"/>
                            </td>
                            <td><input name="product_quantity[]" class="form-control product_quantity" type="text" id="product_quantity_{{$key+1}}" class="product_quantity" value="{{old('product_quantity')[$key]}}"/></td>
                            <td><input name="product_unit_price[]" class="form-control product_unit_price" type="text" id="product_unit_price_{{$key+1}}" class="product_quan" value="{{old('product_unit_price')[$key]}}"/></td>
                            <td><input name="product_total_price[]" class="form-control product_total_price" type="text" id="product_total_price_{{$key+1}}" value="{{old('product_total_price')[$key]}}"/></td>
                            <td><p id="remove_row_{{$key+1}}" class="remove_product_row"><i class="fas fa-minus-circle"></i></p></td>
                          </tr>

                        @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">  
          <div class="form-group">
                    <label>Amount</label>
                    <input id="amount" name="amount" type="text" class="form-control" placeholder="Amount" value="{{old('amount')}}" readonly>
                  </div>
                </div>

                <div class="col-md-6">  
          <div class="form-group">
                    <label>Paid Amount</label>
                    <input id="paid_amount" name="paid_amount" type="text" class="form-control" placeholder="Paid Amount" value="{{old('paid_amount')}}">
                  </div>
                </div>

                <div class="col-md-6">  
                  <div class="form-group">
                    <label>Due Amount</label>
                    <input id="due_amount" name="due_amount" type="text" class="form-control" placeholder="Due Amount" value="{{old('due_amount')}}" readonly>
                  </div>
                </div>

                <div class="col-md-6">  
                  <div class="form-group">
                    <label>Description</label>
                    <input id="description" name="description" type="text" class="form-control" placeholder="Description" value="{{old('description')}}">
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
  }
@endsection

@section('additional_script')
<script src="{{asset('bower_components/jquery-ui/jquery-ui.js')}}"></script>
<script>

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
    $('#sale_date').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#product_id').on('change',function(){
      var product_information = $(this).val();
      var product_information_array = product_information.split("|");
      var product_id = product_information_array[0];
      var product_name = product_information_array[1];
      var product_color = product_information_array[2];
      var product_brand = product_information_array[3];
      var product_category = product_information_array[4];
      var current_row = $('#products_row_container tr').length;
      
      var add_product = true;      
      if(current_row>0){
        $('#products_row_container tr').each(function(i, obj) {
          if(product_id == $(this).attr('data-product-id')){
            swal({
              title:"Warning",
              text: "Already in list!!",
              confirmButtonText:"Ok",
              confirmButtonColor: '#b6d6f6' 
            });
            add_product = false;
          }
        });  
      }
      
      if(add_product==false){
        return false;
      }

      current_row++;

      var single_row = '<tr id="product_row_'+current_row+'" data-product-id="'+product_id+'">';
      single_row += '<th scope="row">'+current_row+'</th>';
      single_row += '<td>'+product_name+'</td>';
      single_row += '<td>'+product_color+'</td>';
      single_row += '<td>'+product_brand+'</td>';
      single_row += '<td>'+product_category+'</td>';
      single_row += '<td>';
        single_row += '<input name="detail_product_id[]" id="detail_product_id_'+current_row+'" type="hidden" value="'+product_id+'"/>';
        single_row += '<input name="product_description[]" class="form-control product_description" type="text" id="product_description_'+current_row+'"/>';
      single_row += '</td>';
      single_row += '<td><input name="product_quantity[]" class="form-control product_quantity" type="text" id="product_quantity_'+current_row+'" class="product_quantity"/></td>';
      single_row += '<td><input name="product_unit_price[]" class="form-control product_unit_price" type="text" id="product_unit_price_'+current_row+'" class="product_quan"/></td>';
      single_row += '<td><input name="product_total_price[]" class="form-control product_total_price" type="text" id="product_total_price_'+current_row+'"/></td>';
      single_row += '<td><p id="remove_row_'+current_row+'" class="remove_product_row"><i class="fas fa-minus-circle"></i></p></td>';
      single_row += '</tr>';

      $('#products_row_container').append(single_row);


    });
    $(document).on('click','.remove_product_row',function(){
      var row_number = $(this).attr('id').substr(11);
      $('#product_row_'+row_number).remove();
      if($('#products_row_container tr').length>0){
        $('#products_row_container tr').each(function(i, obj) {
          var single_product_row = $(this);
          var row_number = i+1;
          single_product_row.find('th').html(row_number);
          single_product_row.attr('id','product_row_'+row_number);
          single_product_row.find('.product_description').attr('id','product_description_'+row_number);
          single_product_row.find('.product_quantity').attr('id','product_quantity_'+row_number);
          single_product_row.find('.product_unit_price').attr('id','product_unit_price_'+row_number);
          single_product_row.find('.product_total_price').attr('id','product_total_price_'+row_number);
          single_product_row.find('.remove_product_row').attr('id','remove_row_'+row_number);
        });  
      }


      
    });

    $('#add_sale_form').on('submit',function(){

    });

    $(document).on('keyup','.product_total_price',function(){
      var amount = 0;
      $('.product_total_price').each(function(index, elem) {
        var this_value = ($(this).val()=='')?0:$(this).val();
        amount = (parseFloat(amount)+parseFloat(this_value)).toFixed(2);
        
      });
      $('#amount').val(amount);     

    });
    $('#paid_amount').on('keyup',function(){
      var amount = $('#amount').val();
      var paid_amount = $(this).val();
      var due_amount = (parseFloat(amount)-parseFloat(paid_amount)).toFixed(2);
      $('#due_amount').val(due_amount);
    });

  });

  function calculate_individual_row(){

  }
</script>
@endsection