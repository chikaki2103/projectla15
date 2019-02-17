@extends('layouts.MasterAdmin')
@section('content')
<section class="invoice">

        <h2 class="text-center">Bill Detail</h2>
      <div class="table-responsive" style="margin-top: 20px;">
         <table class="table table-hover" >
            <thead>
               <tr>
                  <th style="padding: 15px 0px; text-align: center;">Order Code</th>
                            <th style="text-align: center;">Name</td>
                            <th style="text-align: center;">Color</th>
                            <th style="text-align: center;">Size</th>
                            <th style="text-align: center;">Quantity</th>
                            <th style="text-align: center;">Price</th>
                            
               </tr>
            </thead>
            <tbody>
              @foreach($orDetails as $detail)
                        <tr>
                            <td style="padding: 15px 0px;text-align: center;">{{$detail->order_code}}</td>
                            <td style="text-align: center;">
                                @foreach($products as $prod)
                                    @if($detail->product_id == $prod->id)
                                        {{$prod->name}}
                                    @endif 
                                @endforeach
                            </td>       
                            <td style="text-align: center;">
                                @foreach($tDetails as $td)
                                    @if($pDetails[$detail->product_detail_id] == $td->id )
                                        @foreach($colors as $color)
                                            @if($color->id == $td->color_id)
                                                {{$color->color}}
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </td>
                            <td style="text-align: center;">
                                @foreach($tDetails as $td)
                                    @if($pDetails[$detail->product_detail_id] == $td->id )
                                        @foreach($sizes as $size)
                                            @if($size->id == $td->size_id)
                                                {{$size->size}}
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </td>
                            <td style="text-align: center;">{{$detail->quantity}}</td>
                            <td style="text-align: center;">{{$detail->price}}</td>

                        </tr> 

                        @endforeach
                   
            </tbody>
            
         </table> 
         <form action="/admin/process/{{$order->bill_code}}" method="GET">
            @csrf
             <div style="text-align: center;">
                <button class="btn btn-success">Process</button>
            </div> 
         </form>
         
                
               
</section>
@endsection 
@section('footer')
<script>
  
</script>
@endsection