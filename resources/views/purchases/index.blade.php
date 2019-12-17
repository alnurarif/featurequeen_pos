@extends('master')
@section('additional_css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')
<!-- Content Header (Page header) -->
    <style type="text/css">
      .action_delete{
        display: block;background: none;border: none;padding: 3px 20px;color: #777;width: 100%;text-align: left;
      }
      .action_delete:hover{
        background-color: #e1e3e9;
        color: #333;
      }
      .show_purchase_detail_button{
        cursor:pointer;
      }
      .bold{
        font-weight:bold;
      }
      .normal_text{
        font-weight:normal;
      }
    </style>
    <section class="content-header">
        <div class="row">
          <div class="col-md-3">
              <h2 class="top-left-header" style="margin: 0px 0px 0px 0px;">Purchases </h2>
          </div>
          <div class="col-md-3">
          </div>
          <div class="hidden-lg">&nbsp;</div>
          <div class="col-md-1">
              
          </div>
          <div class="hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div class="col-md-5 text-right">
              <ul class="list-inline text-right">
                  <li>
                      <a href="/purchases/create"><button type="button" class="btn btn-block btn-primary pull-right">Add</button></a>
                  </li>
                  
              </ul>
          </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchases</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sn.</th>
                  <th>Bill No.</th>
                  <th>Amount</th>
                  <th>Paid</th>
                  <th>Due</th>
                  <th>Description</th>
                  <th>Supplier</th>
                  <th>Added By</th>
                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($purchases as $key=>$purchase)
                      <tr>
                        <td>{{$key+1}}</td>
                          <td>{{$purchase->bill_no}}</td>
                          <td>{{$purchase->amount}}</td>
                          <td>{{$purchase->paid_amount}}</td>
                          <td>{{$purchase->due_amount}}</td>
                          <td>{{$purchase->description}}</td>
                          <td>{{$purchase->supplier->name}}</td>
                          <td>{{$purchase->user_added->name}}</td>
                          
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-default">Action</button>
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <!-- <li><a href="/purchases/{{$purchase->id}}/edit">Edit</a></li>
                                

                                <li>
                                  <form action="/purchases/{{$purchase->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="action_delete">Delete</button>
                                  </form>
                                </li> -->
                                <li><a class="show_purchase_detail_button" id="show_purchase_detail_button_{{$purchase->id}}">Details</a></li>
                              </ul>
                            </div>
                          </td>
                      </tr>
                  @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Sn.</th>
                  <th>Bill No.</th>
                  <th>Amount</th>
                  <th>Paid</th>
                  <th>Due</th>
                  <th>Description</th>
                  <th>Supplier</th>
                  <th>Added By</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <!-- Modal -->
    <div id="purchaseProductDetail" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Purchase Details</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <p class="bold">Bill No: <span class="normal_text" id="purchase_detail_bil_no"></span></p>
              </div>
              <div class="col-md-6">
                <p class="bold">Total Amount: <span class="normal_text" id="purchase_detail_total_amount"></span></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <p class="bold">Paid Amount: <span class="normal_text" id="purchase_detail_paid_amount"></span></p>
              </div>
              <div class="col-md-6">
                <p class="bold">Due Amount: <span class="normal_text" id="purchase_detail_due_amount"></span></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <p class="bold">Description: <span class="normal_text" id="purchase_detail_description"></span></p>
              </div>
              <div class="col-md-6">
                <p class="bold">Supplier: <span class="normal_text" id="purchase_detail_supplier"></span></p>
              </div>
            </div><div class="row">
              <div class="col-md-6"><p class="bold">Added By: <span class="normal_text" id="purchase_detail_added_by"></span></p></div>
              <div class="col-md-6"><p class="bold">Purchased At: <span class="normal_text" id="purchase_detail_purchased_at"></span></p></div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                  </tr>  
                </thead>
                <tbody id="purchase_product_detail_show">
                  
                </tbody>

              </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
@endsection


@section('additional_script')
  <!-- DataTables -->
  <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}">"></script>
  <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}">"></script>
  <script>
  $(function () {
      $('#example1').DataTable();
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      });
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('.show_purchase_detail_button').on('click',function(){
        var purchase_id = $(this).attr('id').substr(28);
        $.ajax({
          url:"/purchases/getPurchaseProductDetails",
          method:"POST",
          data:{
            purchase_id : purchase_id
          },
          success:function(response) {
            var product_purchase_details = response.product_purchase_details;
            console.log(response);
            $('#purchase_detail_bil_no').html(response.bill_no);
            $('#purchase_detail_total_amount').html(response.amount);
            $('#purchase_detail_paid_amount').html(response.paid_amount);
            $('#purchase_detail_due_amount').html(response.due_amount);
            $('#purchase_detail_description').html(response.description);
            $('#purchase_detail_supplier').html(response.supplier.name);
            $('#purchase_detail_added_by').html(response.user_added.name);
            $('#purchase_detail_purchased_at').html(response.purchase_date);
            var purchase_product_detail_show = '';
            product_purchase_details.forEach(function(single_product){
              purchase_product_detail_show += '<tr>';
                purchase_product_detail_show += '<td>'+single_product.product.name+'</td>';
                purchase_product_detail_show += '<td>'+single_product.description+'</td>';
                purchase_product_detail_show += '<td>'+single_product.quantity+'</td>';
                purchase_product_detail_show += '<td>'+single_product.unit_price+'</td>';
                purchase_product_detail_show += '<td>'+single_product.total_price+'</td>';
              purchase_product_detail_show += '</tr>';
            });
            $('#purchase_product_detail_show').html(purchase_product_detail_show);
            $('#purchaseProductDetail').modal('show');
          },
          error:function(){
            console.log("Something went wrong");
          }
        });
      });
    })
  </script>
@endsection