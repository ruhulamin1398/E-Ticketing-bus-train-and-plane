


$(document).ready(function () {


    var cartArray = {};
    var ticketCost = 0;;

  
  
  
  
  
  
  
    $("#schedulePassengerPageSelectRoad").change(function () {
  
  
      var link = $("#road-view-api").val().trim() + "?id=" + $("#schedulePassengerPageSelectRoad").val();
      $.get(link, function (data, status) {
        ticketCost = data.cost;
        cartArray = {};
  
        $("#busBody").html('');
      });
  
  
  
      var link = $("#road-schedule-api").val().trim() + "?id=" + $("#schedulePassengerPageSelectRoad").val();
  
  
      $.get(link, function (data, status) {
  
        var html = '<option selected>Select Schedule </option>'
  
  
        jQuery.each(data, function (row) {
          console.log(data[row])
          html += '<option value=' + data[row].id + '>' + data[row].date_time + ' </option>';
        });
        $('#schedulePassengerPageSelectSchedule').html(html);
  
  
      });
  
  
    });
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    $("#schedulePassengerPageSelectSchedule").change(function () {
      var link = $("#schedule-passenger-api").val().trim() + "?id=" + $("#schedulePassengerPageSelectSchedule").val();
  
  
      $.get(link, function (data, status) {
        console.log("data");
        console.log(data);
    html='';
        jQuery.each(data,function(i){
            html +=' <tr>' ;
            html += '<td class="  word-break ">'+ data[i].bus_seat_id+'</td>';
            html += '<td class="  word-break ">'+ data[i].name+'</td>';
            html += '<td class="  word-break ">'+ data[i].phone+'</td>';
            html += '</tr>';

        });
       
      
  
        $("#scheduleTicketList").html(html);
  
      });
  
  
    });
  
  
  
  
  
  
  
  
  
   
  
  
  
  });
  
  