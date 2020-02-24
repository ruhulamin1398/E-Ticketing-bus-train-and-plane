<input type="text" id="road-schedule-api" size="10" value="{{route('road-schedule-api')}} " class="form-control  mb-2" hidden>
<input type="text" id="seat-schedule-api" size="10" value="{{route('seat-schedule-api')}} " class="form-control  mb-2" hidden>
<input type="text" id="road-view-api" size="10" value="{{route('road-view-api')}} " class="form-control  mb-2" hidden>






<form action="{{route('tickets.store')}}" method="post" id="ticketSubmitForm">

    @csrf
    <input type="number" name="bus_seat_id" id="cart_bus_seat_id">
    <input type="number" name="schedule_id" id="cart_schedule_id">

    <input type="text" name="name" id="name">
    <input type="text" name="phone" id="phone">

</form>