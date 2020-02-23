$(document).on('click', "#edit-schedule-item", function() {


    $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

    var options = {
      'backdrop': 'static'
    };
    $('#edit-schedule-modal').modal(options)
  });

  // on modal show
  $('#edit-schedule-modal').on('show.bs.modal', function() {
    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
    var row = el.closest(".data-row");

    // get the data
    var id = el.data('item-id');
    var date = row.children(".date").text().trim();
    var time = row.children(".time").text().trim();
    var road = row.children(".road").text().trim();

    // fill the data in the input fields
    $("#modal-input-id").val(id);
    $("#modal-input-date").val(date);
    $("#modal-input-time").val(time);
    $("#modal-input-road").val(road);

  });

  // on modal hide
  $('#edit-schedule-modal').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#edit-form").trigger("reset");
  });