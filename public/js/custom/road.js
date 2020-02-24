

  $(document).ready(function () {
    

$(document).on('click', "#edit-road-item", function() {


    $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

    var options = {
      'backdrop': 'static'
    };
    $('#edit-road-modal').modal(options)
  });

  // on modal show
  $('#edit-road-modal').on('show.bs.modal', function() {
    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
    var row = el.closest(".data-row");

    // get the data
    var id = el.data('item-id');
    var from = row.children(".from").text();
    var to = row.children(".to").text();
    var distance = row.children(".distance").text();
    var cost = row.children(".cost").text();

    // fill the data in the input fields
    $("#modal-input-id").val(id);
    $("#modal-input-from").val(from);
    $("#modal-input-to").val(to);
    $("#modal-input-distance").val(distance);
    $("#modal-input-cost").val(cost);

  });

  // on modal hide
  $('#edit-road-modal').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#edit-form").trigger("reset");
  });
});