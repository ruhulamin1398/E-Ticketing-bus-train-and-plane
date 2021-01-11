@extends('customer.includes.app')

@section('content')



<div class="card      p-2">
    <div class="card-header bg-dark-color">


        <h3 class="text-white ">Search Results</h3>
    </div>
    <div class="card-body" >
            
    <table class="table   table-striped  " width="100%">
        
        <thead class=" text-dark ">
            <th>Company</th>
            <th>Dep. Time</th>
            <th>Seats Available</th>
            <th>Ticket Price</th>
            <th>Action</th>
        </thead>

        <tbody class="text-dark">
            @foreach ($bus_schedules as $schedule)
            <tr>
                <td>{{ $schedule->companies->name }}</td>
                <td>{{ Carbon\Carbon::parse($schedule->schedule)->format('h:i:a') }}</td>
                <td> {{ $schedule->available }}</td>
                <td>{{ $schedule->cost }}</td>
                <td><button type="button" class="btn btn-primary">Book Ticket</button></td>
                


            </tr>
                
            @endforeach
            

        </tbody>
    </table>
    </div>




</div>






@endsection