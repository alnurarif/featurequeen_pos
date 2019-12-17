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
    </style>
    <section class="content-header">
        <div class="row">
          <div class="col-md-3">
              <h2 class="top-left-header" style="margin: 0px 0px 0px 0px;">Brands </h2>
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
                      <a href="/brands/create"><button type="button" class="btn btn-block btn-primary pull-right">Add</button></a>
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
              <h3 class="box-title">Brands</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sn.</th>
                  <th>Name</th>
                  <th>Is Active</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($brands as $key=>$brand)
                      <tr>
                        <td>{{$key+1}}</td>
                          <td>{{$brand->name}}</td>
                          <td>
                            @if($brand->is_active==1)
                                Active
                            @else
                                Inactive
                            @endif
                          </td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-default">Action</button>
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="/brands/{{$brand->id}}/edit">Edit</a></li>
                                

                                <li>
                                  <form action="/brands/{{$brand->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="action_delete">Delete</button>
                                  </form></li>
                              </ul>
                            </div>
                          </td>
                      </tr>
                  @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Sn.</th>
                  <th>Name</th>
                  <th>Is Active</th>
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
@endsection


@section('additional_script')
  <!-- DataTables -->
  <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}">"></script>
  <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}">"></script>
  <script>
  $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
@endsection