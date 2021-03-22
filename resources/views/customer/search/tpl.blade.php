@extends('customer.includes.app')

@section('content')



<div class="card      p-2">
    <div class="card-header bg-dark-color">


        <h3 class="text-white ">Available {{$company_type_name}}</h3>
    </div>
    <div class="card-body">

        <table class="table   table-striped  " width="100%">

            <thead class=" text-dark ">
                <th>Company</th>
                <th>Name</th>
                <th>Dep. Time</th>
                <th>Action</th>
            </thead>

            <tbody class="text-dark">
                @foreach ($tpl_schedules as $schedule)
                @if ($schedule->tpls->to_destination_id == $to_destination_id)

                <tr>
                    <td>{{ $schedule->company->name }}</td>
                    <td>{{ $schedule->tpls->name }}</td>
                    <td>{{ Carbon\Carbon::parse($schedule->schedule)->format('h:i:a') }}</td>
                    <form action="{{ route('book-ticket') }}" method="GET" >
                        <input type="text" name="company_type_id" value="{{ $company_type_id }}" hidden>
                        <input type="text" name="schedule_id" value="{{ $schedule->id }}" hidden>
                    <td><button type="submit" class="btn btn-primary">Book Ticket</button></td>
                    </form>



                </tr>

                @endif

                @endforeach


            </tbody>
        </table>
    </div>




</div>






@endsection
