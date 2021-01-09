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
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tfoot class="bg-abasas-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Seat Type</th>
                                    <th>Total Seats</th>
                                    <th> Action</th>
                                </tr>
        
                            </tfoot>
                            <tbody id="tbody">
                                {{-- <?php $id = 1 ?>
                                @foreach ($users as $user)
                                <?php $id = $user->id; ?>
                                <tr class="data-row">
        
                                    <td id="viewName">{{$user->id}}</td>
                                    <td id="viewName">{{$user->name}}</td>
                                    <td id="viewName">{{$user->companies->name}}</td>
                                    <td id="viewName">{{$user->roles->role}}</td>
                                    <td id="viewName">@if ( ! is_null($user->counters))
                                        {{$user->counters->name}}
                                    @endif    </td>
                                    <td id="viewSell">{{$user->email}}</td>
        
        
        
                                    </td>
        
                                    <td class="align-middle">
                                        <button type="button" class="btn btn-success" id="user-edit-item"
                                            data-item-id={{$user->id}}> <i class="fa fa-edit" aria-hidden="false"> </i></button>
        
                                        <form method="POST" action="{{route('superAdmin.users.destroy',$user->id)}}"
                                            id="delete-form-{{ $user->id }}" style="display:none; ">
                                            {{csrf_field() }}
                                            {{ method_field("delete") }}
                                        </form>
        
        
        
        
                                        <button title="Delete" class="dataDeleteItemClass btn btn-danger btn-sm" onclick="if(confirm('are you sure to delete this')){
                            document.getElementById('delete-form-{{ $user->id }}').submit();
                        }
                        else{
                            event.preventDefault();
                        }
                        " class="btn btn-danger btn-sm btn-raised">
                                            <i class="fa fa-trash" aria-hidden="false">
        
                                            </i>
                                        </button>
        
        
        
                                    </td>
        
                                </tr>
        
                                @endforeach --}}
        
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
                            <span class="text-dark">Seat Type</span>
                            <input type="text" name="seat_type" class="form-control " id="seat_type" required>
                        </div>

                        <div class="form-group col-12  pl-4 tplNewSeat"  style="display: none;">
                            <span class="text-dark">Total Seats</span>
                            <input type="number" name="total_seat" class="form-control " id="total_seat" required>
                        </div>
                        <div class="col-12 pl-4 tplNewSeat"  style="display: none;">
                            <button type="submit" class="btn bg-abasas-dark mt-3">Submit</button>
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


    
            var data = [ ['id', tplId] ];
            var home = "{{route('home')}}";
            var url = home.trim() + '/tpl-seat-api/'+ tplId ;
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
                        

                        html+=    '</tr>'
                        $('#tbody').html(html);
                    })
                },
                error:function (data) {
                    alert('Erorr');
                    console.log(data);
                }
                });

            





    
        });






    });

</script>



@endsection
