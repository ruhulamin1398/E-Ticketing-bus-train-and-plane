


$(document).ready(function () {


  var cartArray = {};
  var ticketCost = 0;;

  function showCart() {
    var html = "";
    var totalCost = 0;
    var cartArrayLenth = 0;
    jQuery.each(cartArray, function (data) {
      totalCost += ticketCost;
      cartArrayLenth++;

      html += ' <tr class=" text-light ">';
      html += ' <td>' + cartArray[data].name + '</td>';
      html += ' <td>' + ticketCost + '</td>';
      html += ' <td>    <button type="button" class="btn btn-danger" id="delete-cart-seat" data-id="' + data + '" > <i class="fa fa-trash" aria-hidden="false"> </i></button></td>';
      html += ' </tr>';
    });
    html += ' <tr >';
    html += ' <td></td>';
    html += ' <th> Total</th>';
    html += ' <td> ' + totalCost + '  </td>';
    html += ' </tr>';

    html += ' <tr >';
    html += ' <td></td>';
    html += ' <th> </th>';
    html += ' <td>  <button type="button" class="btn btn-success" id="submit-cart-seat"  > Submit </button>  </td>';
    html += ' </tr>';


    if (cartArrayLenth > 0)
      $('#cartBody').html(html);
    else

      $('#cartBody').html("<tr><td rowspan='5'>No Ticket Selected </td> </tr>");


  }




  $("#ticketCartPassengerName").change(function () {

    $("#ticketCartPassengerNameInput").val($("#ticketCartPassengerName").val());

  });

  $("#ticketCartPassengerPhone").change(function () {

    $("#ticketCartPassengerPhoneInput").val($("#ticketCartPassengerPhone").val());

  });




  $("#homepageSelectRoad").change(function () {


    var link = $("#road-view-api").val().trim() + "?id=" + $("#homepageSelectRoad").val();
    $.get(link, function (data, status) {
      ticketCost = data.cost;
      cartArray = {};

      $("#busBody").html('');
      showCart();
    });



    var link = $("#road-schedule-api").val().trim() + "?id=" + $("#homepageSelectRoad").val();


    $.get(link, function (data, status) {

      var html = '<option selected>Select Schedule </option>'


      jQuery.each(data, function (row) {
        console.log(data[row])
        html += '<option value=' + data[row].id + '>' + data[row].date_time + ' </option>';
      });
      $('#homepageSelectSchedule').html(html);


    });


  });

















  $("#homepageSelectSchedule").change(function () {
    var link = $("#seat-schedule-api").val().trim() + "?id=" + $("#homepageSelectSchedule").val();


    $.get(link, function (data, status) {
      console.log(data);
      var html = "";
      html += '<tr>';
      html += '<td></td>';
      html += '<td></td>';
      html += '<td></td>';
      html += '<td></td>';
      html += '<td> </td>';
      html += ' <td style="height: 60px;"> <span class="h3">Driver</span> </td>';
      html += '</tr>';

      var j = 0;
      for (var i = 1; i <= 9; i++) {
        html += '  <tr>'


        html += '  <td><button class="btn btn-success seat"';
        if (data[j].status_id != 1) {
          html += 'disabled ';
        };
        html += 'schedule_id= "' + data[j].schedule_id + '"';
        html += 'id="' + data[j].id + '"';
        html += '>' + data[j++].seat_name + ' </button></td>';



        html += '  <td><button class="btn btn-success seat"';
        if (data[j].status_id != 1) {
          html += 'disabled ';
        };

        html += 'schedule_id= "' + data[j].schedule_id + '"';
        html += 'id="' + data[j].id + '"';

        html += '>' + data[j++].seat_name + '</button></td>';



        html += '  <td></td>';
        html += '  <td></td>';


        html += '  <td><button class="btn btn-success seat"';
        if (data[j].status_id != 1) {
          html += 'disabled ';
        };

        html += 'schedule_id= "' + data[j].schedule_id + '"';
        html += 'id="' + data[j].id + '"';

        html += '> ' + data[j++].seat_name + ' </button></td>';



        html += '  <td><button class="btn btn-success seat"';
        if (data[j].status_id != 1) {
          html += 'disabled ';
        };


        html += 'schedule_id= "' + data[j].schedule_id + '"';
        html += 'id="' + data[j].id + '"';

        html += '> ' + data[j++].seat_name + ' </button></td>';



        html += '</tr>';
      }

      $("#busBody").html(html);

    });


  });







  $("body").on("click", ".seat", function () {

    var id = $(this).attr('id');
    var schedule_id = $(this).attr('schedule_id');
    var name = $(this).text();

    cartArray[id] = {
      schedule_id: schedule_id,
      name: name,
      bus_set_id: id,

    };
    showCart();
  });


  $("body").on("click", "#delete-cart-seat", function () {

    var id = $(this).attr('data-id');

    delete cartArray[id];
    showCart();
  });

  function buy() {

  }
  $("body").on("click", "#submit-cart-seat", function () {
    jQuery.each(cartArray, function (i) {
      $('#cart_bus_seat_id').val(cartArray[i].bus_set_id);
      $('#cart_schedule_id').val(cartArray[i].schedule_id);



      var OPfrm = $('#ticketSubmitForm');
      var act = OPfrm.attr('action');
      $.ajax({
        type: OPfrm.attr('method'),
        url: act,
        data: OPfrm.serialize(),
        success: function (successData) {
          console.log(successData);
        },
        error: function (data) {
          console.log("can not add ticket ");
          console.log(data);
        },
      });


    });


    $("#create-ticket-reload-modal").modal();
  });




});

