@extends('tpl.includes.app')

@section('content')
    
<x-data-table
:dataArray="$dataArray"

/>


<script>
    $(document).ready(function(){
        
        var html = ''; 
        html += '<div class="form-group col-sm-12 col-md-4   pl-4 pr-4">';
        html += '<label for="tpl_id"> Vehicle</label>';
        html +=            ' <select class="form-control " name="tpl_id" id="tpl_id" required>';
        html +=               '  <option disabled selected value> -- select a Vehicle -- </option>';

        @foreach ( $tpls as $tpl)
            html +=  '<option value="{{ $tpl->id }}"> {{ $tpl->name }} ( {{ $tpl->fromDestinations->name }} to {{ $tpl->toDestinations->name }} )  </option>';
        @endforeach

        html +=    '</select>';
        html +=       ' </div>';

        $("#createFormFieldList").append(html); 


        var html2 = ''; 
        html2 += '<div class="form-group col-sm-12 col-md-4   pl-4 pr-4">';
        html2 += '<label for="schedule"> Schedule</label>';
        html2 +=           '<input type="datetime-local" name="schedule" class="form-control " id="schedule" required>';
        html2 +=       ' </div>';

        $("#createFormFieldList").append(html2);


    });


</script>


@endsection
