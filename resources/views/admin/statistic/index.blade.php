@extends('layouts.MasterAdmin')
@section('content')
<section class="invoice">
  <div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{$newOrder}}</h3>

                <p>Hoá Đơn Chưa Xử Lí</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
           
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{$totalOrder}}</h3>

                <p>Hoá Đơn Đã Xử Lí</p>
            </div>
            <div class="icon">
                <i class="ion ion-checkmark-circled"></i>
            </div>
            
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>$ {{$totalDay}}</h3>

                <p>Doang Thu Ngày</p>
            </div>
            <div class="icon">
                <i class="ion ion-cash"></i>
            </div>
            
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>$ {{$totalMonth}}</h3>

                <p>Tổng Doanh Thu Tháng</p>
            </div>
            <div class="icon">
                <i class="ion ion-cash"></i>
            </div>
            
        </div>
    </div>
    <!-- ./col -->
</div>  
<div class="row">
   
    <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Top 4 Sản Phẩm Đã Bán</h3>

              <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th>Product</th>
                </tr>

                @foreach($array as $product)
               
                <tr>
                  <td>{{$product['code']}}</td>
                  <td>{{$product['name']}}</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: {{$product['qtt']}}0%"></div>
                    </div>
                  </td>
                  <td><span style="background-color: #5da771;    margin-left: 15px;" class="badge">{{$product['qtt']}}</span></td>
                </tr>
                @endforeach

                {{-- <tr>
                  <td>2.</td>
                  <td>Clean database</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-yellow">70%</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Cron job running</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-light-blue">30%</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Fix and squish bugs</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">90%</span></td>
                </tr> --}}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
    
           
</div>
        
        
      
               
</section>
@endsection 
@section('footer')
<script>
  
</script>
@endsection