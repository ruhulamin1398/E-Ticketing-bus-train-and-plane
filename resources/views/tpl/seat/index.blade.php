@extends('tpl.includes.app')

@section('content')



@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session()->has('success'))
<div class="alert alert-success">
    @if(is_array(session('success')))
    <ul>
        @foreach (session('success') as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
    @else
    {{ session('success') }}
    @endif
</div>
@endif







<!-- Begin Page Content -->
<div class="container-fluid m-0 p-0">
    <div class="card mb-4 shadow">


        <div class="card-header py-3 bg-abasas-dark">
            <nav class="navbar navbar-dark ">
                <a class="navbar-brand"> Select A Vahicle</a>
                <div class="form-group col-4">
                    <select class="form-control "  id="tplId" required>
                        <option disabled selected value> -- Select a Vehicle -- </option>
                        @foreach ($tpls as $tpl)
                        <option value="{{$tpl->id}}"> {{$tpl->name}} ( {{ $tpl->fromDestinations->name }} to
                            {{ $tpl->toDestinations->name }} ) </option>
                        @endforeach
                    </select>
                </div>
            </nav>
        </div>




        <div class="card-body">

            <div class="row">
                <div class="col-md-6 col-sm-12">

                    <div class="card-header py-3 bg-abasas-dark">
                        <nav class="navbar navbar-dark ">
                            <a class="navbar-brand"> Current Seats</a>
                        </nav>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-abasas-dark">
        
        
                                <tr>
                                    <th>#</th>
                                    <th>Seat Type</th>
                                    <th>Total Seats</th>
                                    <th>Ticket Price </th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tfoot class="bg-abasas-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Seat Type</th>
                                    <th>Total Seats</th>
                                    <th>Ticket Price</th>
                                    <th> Action</th>
                                </tr>
        
                            </tfoot>
                            <tbody id="tbody">
                               
        
                            </tbody> 
                        </table>
        
        
        
                    </div>


                </div>



                <div class="col-md-6 col-sm-12">

                    <div class="card-header py-3 bg-abasas-dark">
                        <nav class="navbar navbar-dark ">
                            <a class="navbar-brand"> Add Seats</a>
                        </nav>
                    </div>


                    <form method="POST" action="{{ route('tpl-seats.store') }}" id="newSeatForm">
                        @csrf

                        <input type="number" step="any" name="tpl_id" class="form-control " id="tpl_id" hidden>

                        <div class="form-group col-12  pl-4 tplNewSeat" style="display: none;" >
                            <span class="text-dark">Seat Type*</span>
                            <input type="text" name="seat_type" class="form-control " id="seat_type" >
                        </div>

                        <div class="form-group col-12  pl-4 tplNewSeat"  style="display: none;">
                            <span class="text-dark">Total Seats*</span>
                            <input type="number" name="total_seat" class="form-control " id="total_seat" >
                        </div>

                        <div class="form-group col-12  pl-4 tplNewSeat"  style="display: none;">
                            <span class="text-dark">Ticket Price*</span>
                            <input type="number" name="cost" class="form-control " id="cost" >
                        </div>
                        <div class="col-12 pl-4 tplNewSeat"  style="display: none;">
                            <button type="button" id="submitBtn" class="btn bg-abasas-dark mt-3">Submit</button>
                        </div>

                    </form>


                </div>



            </div>

        </div>






    </div>


</div>



<script>
    $(document).ready(function(){
        $(document).on('input','#tplId',function(){
            $('.tplNewSeat').show();
            var tplId = $('#tplId').val();
            $('#tpl_id').val(tplId);


    
            var home = "{{route('home')}}";
            var url = home.trim() + '/tpl-seat-api/'+ tplId ;
            tableData();
            function tableData(){
                $.ajax({
                    url: url,
                    type: 'get',
                    success: function (data) {

                        var itr =0;
                        var html = '';
                        $.each(data,function(i){
                            
                             
                            itr +=1;
                            html += '<tr class="data-row">';
                            html+=    '<td id="viewName">'+ itr +'</td>';
                            html+=    '<td id="viewName"> '+ data[i].seat_type +'</td>';
                            html+=    '<td id="viewName"> '+ data[i].total_seat +'</td>';
                            html+=    '<td id="viewName"> '+ data[i].cost +'</td>';



                            
                            html+=    '<td class="align-middle">';



                            html+=           '<button class="dataDeleteItemClass btn btn-danger btn-sm" itemId="'+data[i].id+'" class="btn btn-danger btn-sm btn-raised">';
                            html+=           '<i class="fa fa-trash" aria-hidden="false"> </i> </button>';

                            html+=           '</td>';
                            

                            html+=    '</tr>'
                        })
                        
                        $('#tbody').html(html);
                    },
                    error:function (data) {
                        alert('Table Print Erorr');
                        console.log(data);
                    }
                });

            }


            
            $(document).on('click','.dataDeleteItemClass',function(){
                $(this).prop("disabled",true);
                var itemId = $(this).attr('itemId');
                var link = home.trim() + '/tpl-seat-delete-api/'+ itemId ;
                console.log(link)
                $.ajax({
                    url: link,
                    type: 'get',
                    success: function (data) {
                        console.log(data);
                        tableData();
                    },
                    error:function () {
                        alert('Delete Erorr');
                    }
                });




                tableData();
            });
            



            $(document).on('click','#submitBtn',function(){

                $('#submitBtn').prop("disabled",true);
                var inputSeatType = $('#seat_type').val();
                var inputTotalSeat = $('#total_seat').val();
                var inputCost = $('#cost').val();
                if(inputSeatType == '')
                {
                    alert('Enter Seat Type');
                }
                if(inputTotalSeat == '')
                {
                    alert('Enter Total Seat');
                }
                if(inputCost == '')
                {
                    alert('Enter Ticket Price');
                }




                var data = $('#newSeatForm').serialize();
                var urlLink = $('#newSeatForm').attr('action');


                $.ajax({
                    url: urlLink,
                    data: data,
                    type: 'POST',
                    success: function (data) {
                        $('#seat_type').val('');
                        $('#total_seat').val('');
                        $('#cost').val('');
                        tableData();
                        $('#submitBtn').prop("disabled",false);
                    },
                    error:function (data) {
                        alert('Store Erorr');
                        console.log(data);
                    }
                });
                    

            });






            





    
        });






    });

</script>



@endsection
