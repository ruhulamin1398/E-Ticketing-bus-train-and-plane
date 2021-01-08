@extends('superAdmin.includes.app')


@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card mb-4 shadow">

    
        <div class="card-header py-3 bg-abasas-dark">
            <nav class="navbar navbar-dark ">
                <a class="navbar-brand"> New Company</a>
               
            </nav>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('companies.store') }}">
                @csrf
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <span class="text-dark pl-2"> Company Name</span>
                        <input type="text" name="name" class="form-control mb-2" id="inlineFormInput" required >
                    </div>


                    <div class="col-auto">

                        <span class="text-dark pl-2">Type</span>

                        <select class="form-control form-control" name="company_type_id"  required>
                            <option value="1">Select Type </option>
                            @foreach ($company_types as $type)
                            <option value={{$type->id}}> {{$type->type}}</option>
                            @endforeach
                        </select>

                    </div>

 

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>

                </div>

            </form>
        </div>
    </div>

<!-- DataTales Example -->



<!-- DataTales Example -->
<div class="card shadow mb-4">
        
    <div class="card-header py-3 bg-abasas-dark">
        <nav class="navbar navbar-dark ">
            <a class="navbar-brand"> Counter List</a>
           
        </nav>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable1" width="100%" cellspacing="0">
                <thead class="bg-abasas-dark">


                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot class="bg-abasas-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>

                </tfoot>
                <tbody>

                
                    <?php $i = 1; ?>
                    @foreach ($companies as $company)
                    <?php $id = $company->id; ?>
                    <tr class="data-row">
                        <td class="iteration">{{$i++}}</td>
                        <td class="  word-break name">{{$company->name}}</td>
                        <td class=" word-break type ">{{$company->type->type}}</td>



                        <td class="align-middle">
                            <button type="button" class="btn btn-success" id="data-edit-item" data-item-id={{$id}}> <i class="fa fa-edit" aria-hidden="false"> </i></button>


                            <form method="POST" action="{{ route('companies.destroy',  $company->id )}} " id="delete-form-{{ $company->id }}" style="display:none; ">
                                {{csrf_field() }}
                                {{ method_field("delete") }}
                            </form>




                            <button onclick="if(confirm('are you sure to delete this')){
            document.getElementById('delete-form-{{ $company->id }}').submit();
        }
        else{
            event.preventDefault();
        }
        " class="btn btn-danger btn-sm btn-raised">
                                <i class="fa fa-trash" aria-hidden="false">

                                </i>
                            </button>



                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>



</div>







<!-- Attachment Modal -->
<div class="modal fade" id="data-edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="edit-modal-label ">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="attachment-body-content">
                <form id="data-edit-form" class="form-horizontal" method="POST" >
                    @method('patch')
                    @csrf


                    <!-- id -->
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-id">Id </label>
                        <input type="text" name="id" class="form-control" id="modal-input-id" required readonly>
                    </div>
                    <!-- /id -->
                    <!-- name -->
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-name"> Name</label>
                        <input type="text" name="name" class="form-control" id="modal-input-name" required autofocus>
                    </div>
                    <!-- /name -->
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-type"> Type</label>
                        <select class="form-control " name="company_type_id" id="company_type_id"></select>
                         </div>
                    <!-- /name -->
                  
                    <div class="form-group">

                        <input type="submit" value="submit" class="form-control btn btn-success">
                    </div>
                    <!-- /description -->




                </form>
            </div>

        </div>
    </div>
</div>
</div>


@endsection
@section('js')
<script>

    


  $(document).ready(function () {
    
    $(document).on('click', "#data-edit-item", function() {

    
        $(this).addClass('edit-item-trigger-clicked'); 
    
        var options = {
          'backdrop': 'static'
        };
        $('#data-edit-modal').modal(options)
      });
    
    //   // on modal show
      $('#data-edit-modal').on('show.bs.modal', function() {
        var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
     
    
    //     // get the data
        var id =el.data('item-id');
        var action = "{{ route("superAdminHome") }}"+"/companies/"+id;
        console.log(action)
        $("#data-edit-form").attr("action",action)
 
  
  var dataArray= @json($dataArray);
  $.each(dataArray,function(i){
      if(dataArray[i].id == id){

       
    //     // fill the data in the input fields
         $("#modal-input-id").val(id);
        $("#modal-input-name").val(dataArray[i].name);
        var html = "";
        var types= @json($company_types);
        
        types.forEach(function (item) {
                if (item.id == dataArray[i].company_type_id) {
        html += '<option  selected="selected"  value="'+ item.id +'"> ' + item.type + '    </option>';
    } else {
        
        html += '<option    value="' + item.id + '">  '+ item.type +'    </option>';
    }
        })
      $("#company_type_id").html(html);

      }
  })
  console.log(dataArray)
    


        
//         $.get($("#productCategoryLink").val().trim(), function (categories, status) {

// console.log(categories);

// var categories = @json($company_types)
// console.log(categories);
// categories.forEach(function (category, item) {
//     //   alert(viewCategoryId+'   '+i.name);
//     if (product.category_id == category.id) {
//         catagoryhtml += '   <option  selected="selected"  value="  ' + category.id + ' ">  ' + category.name + '    </option>';
//     } else {
//         catagoryhtml += '   <option value="  ' + category.id + ' "> ' + category.name + '</option>';
//     }

// });


// $("#editProductCatagoryId").html(catagoryhtml);
// });


    
    });
    
      // on modal hide
      $('#data-edit-modal').on('hide.bs.modal', function() {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#edit-form").trigger("reset");
      });
    
   });




</script>

@endsection
