<input type="text" id="road-schedule-api" size="10" value="{{route('road-schedule-api')}} " class="form-control  mb-2" hidden>
<input type="text" id="seat-schedule-api" size="10" value="{{route('seat-schedule-api')}} " class="form-control  mb-2" hidden>
<input type="text" id="road-view-api" size="10" value="{{route('road-view-api')}} " class="form-control  mb-2" hidden>
<input type="text" id="schedule-passenger-api" size="10" value="{{route('schedule-passenger-api')}} " class="form-control  mb-2" hidden>






<form action="{{route('tickets.store')}}" method="post" id="ticketSubmitForm">

    @csrf
    <input type="number" name="bus_seat_id" id="cart_bus_seat_id"  hidden  >
    <input type="number" name="schedule_id" id="cart_schedule_id"  hidden  >

    <input type="text" value=" @if(!Auth::guest()){{Auth::user()->name}} @endif " name="name" id="ticketCartPassengerNameInput"  hidden  >
    <input type="text"  value=" @if(!Auth::guest()) {{Auth::user()->phone}} @endif "  name="phone" id="ticketCartPassengerPhoneInput"  hidden  >

</form>