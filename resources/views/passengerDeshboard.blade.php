@extends('layout.app')

@section('sidebar')
@include('layout.passengerSidebar')
@endsection

@section('content')






<div class="card shadow mb-4 col-9">

<div class="card-header py-3 bg-abasas-dark">
    <nav class="navbar navbar-dark ">
        <a class="navbar-brand"> Ticket List</a>

    </nav>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="dataTable1" width="100%" cellspacing="0">
            <thead class="bg-abasas-dark">


                <tr>
                    <th>#</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Seat</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot class="bg-abasas-dark">
                <tr>
                    
                <th>#</th>
                
                <th>#</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Seat</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>


                </tr>

            </tfoot>
            <tbody>

                <?php $i = 1; ?>
                @foreach ($tickets as $ticket)
        
                <tr class="data-row">
                    <td class="iteration">{{$i++}}</td>
                    <td class="  word-break ">{{$ticket->schedule->road->from->name}}</td>
                    <td class="  word-break ">{{$ticket->schedule->road->to->name}}</td>
                    <td class="  word-break ">{{$ticket->bus_seat->seat_name}}</td>
                    <td class="  word-break ">{{$ticket->schedule->date}}</td>
                    <td class=" word-break  ">{{$ticket->schedule->time}}</td>
                    <td class=" word-break  ">{{$ticket->bus_seat->status->name}}</td>



                    <td class="align-middle">
                     
                  <button class="btn btn-success">Payment</button>
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
</div>







@endsection
