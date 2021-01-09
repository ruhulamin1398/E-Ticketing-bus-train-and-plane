@extends('superAdmin.includes.app')


@section('content')



@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session()->has('success'))
<div class="alert alert-success">
    @if(is_array(session('success')))
    <ul>
        @foreach (session('success') as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
    @else
    {{ session('success') }}
    @endif
</div>
@endif



<!-- Begin Page Content -->
<div class="container-fluid m-0 p-0">
    <div class="card mb-4 shadow">


        <div class="card-header py-3 bg-abasas-dark">
            <nav class="navbar navbar-dark ">
                <a class="navbar-brand"> New user</a>

            </nav>
        </div>


        <div class="card-body">
            <form method="POST" action="{{ route('superAdmin.users.store') }}">
                @csrf


                <div class="form-row align-items-center">


                    <div class="form-group col-sm-12 col-md-4   pl-4 pr-4">
                        <span class="text-dark">Name</span>
                        <input type="text" name="name" class="form-control " id="inlineFormInput" required>
                    </div>
                    <div class="form-group col-sm-12 col-md-4   pl-4 pr-4">
                        <label for="company_type_id"> Company Type</label>
                        <select class="form-control " name="company_type_id" id="company_type_id" required>
                            <option disabled selected value> -- select a Company Type -- </option>
                            @foreach ($company_types as $type)
                            <option value="{{$type->id}}">  {{$type->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div id="companyDiv">

                    </div>
                    <div id="roleDiv">

                    </div>
                    <div id="counterDiv">

                    </div>
{{-- 

                    <div class="form-group col-sm-12 col-md-4   pl-4 pr-4" id="counterDiv" required>
                        <label for="counter_id"> Counter</label>
                        <select class="form-control " name="counter_id" id="AddTaskUserId" >
                            <option disabled selected value> -- select a Counter -- </option>
                            @foreach ($destinations as $destination)
                            <option value="{{$destination->id}}">  {{$destination->name}} </option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="form-group col-sm-12 col-md-4   pl-4 pr-4">
                        <span class="text-dark">Email</span>
                        <input type="email" name="email" class="form-control " id="inlineFormInput" required>
                    </div>
                    <div class="form-group col-sm-12 col-md-4   pl-4 pr-4">
                        <span class="text-dark">Password</span>
                        <input type="text" name="password" class="form-control " id="inlineFormInput" min="6" required>
                    </div>

                </div>
                <div class="col-12 pl-4">
                    <button type="submit" class="btn bg-abasas-dark mt-3">Submit</button>
                </div>

            </form>
        </div>


    </div>






    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-abasas-dark">
            <nav class="navbar navbar-dark ">
                <a class="navbar-brand">User list</a>
            </nav>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-abasas-dark">


                        <tr>
                            <th>User id</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>User Role </th>
                            <th>Counter </th>
                            <th> Email</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tfoot class="bg-abasas-dark">
                        <tr>
                            <th>User id</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>User Role </th>
                            <th>Counter </th>
                            <th> Email</th>
                            <th> Action</th>
                        </tr>

                    </tfoot>
                    <tbody>
                        <?php $id = 1 ?>
                        @foreach ($users as $user)
                        <?php $id = $user->id; ?>
                        <tr class="data-row">

                            <td id="viewName">{{$user->id}}</td>
                            <td id="viewName">{{$user->name}}</td>
                            <td id="viewName">{{$user->companies->name}}</td>
                            <td id="viewName">{{$user->roles->role}}</td>
                            <td id="viewName">@if ( ! is_null($user->counters))
                                {{$user->counters->name}}
                            @endif    </td>
                            <td id="viewSell">{{$user->email}}</td>



                            </td>

                            <td class="align-middle">
                                <button type="button" class="btn btn-success" id="user-edit-item"
                                    data-item-id={{$user->id}}> <i class="fa fa-edit" aria-hidden="false"> </i></button>

                                <form method="POST" action="{{route('superAdmin.users.destroy',$user->id)}}"
                                    id="delete-form-{{ $user->id }}" style="display:none; ">
                                    {{csrf_field() }}
                                    {{ method_field("delete") }}
                                </form>




                                <button title="Delete" class="dataDeleteItemClass btn btn-danger btn-sm" onclick="if(confirm('are you sure to delete this')){
                    document.getElementById('delete-form-{{ $user->id }}').submit();
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
<div class="modal fade" id="data-edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="edit-modal-label ">edit your password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="attachment-body-content">
                <form id="user-edit-form" class="form-horizontal" method="POST" action="">
                    @csrf
                    @method('put')

                    <!-- id -->
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-id">Id </label>
                        <input type="text" name="id" class="form-control" id="modal-input-id" required readonly>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-password">Enter your new password</label>
                        <input type="text" name="password" class="form-control" id="modal-input-password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="form-control btn btn-success">
                    </div>

                </form>
            </div>
            <!-- /description -->
        </div>

    </div>
</div>

<script>
    $(document).ready(function(){
        

        $(document).on('input','#company_type_id',function(){
           var company = @json($companies);
           var company_type_id = $('#company_type_id').val();
           console.log(company);
           var html = ''; 
           html += '<div class="form-group col-12">';
           html += '<label for="company_id"> Company</label>';
           html +=            ' <select class="form-control " name="company_id" id="company_id" required>';
           html +=               '  <option disabled selected value> -- select a Company -- </option>';

           $.each(company,function(i){
               if(company_type_id == company[i].company_type_id){

                html +=  '<option value="'+ company[i].id +'">'+ company[i].name +' </option>';
               }
           });
            html +=    '</select>';
            html +=       ' </div>';

           $('#companyDiv').html(html);


    
            

        });



        $(document).on('input','#company_id',function(){
            var company_type_id = $('#company_type_id').val();
            var role = @json($roles);
           var htmlrole = '';
           htmlrole += '<div class="form-group col-12">';
            htmlrole += '<label for="role_id"> Role</label>';
            htmlrole +=            ' <select class="form-control " name="role_id" id="role_id" required>';
                htmlrole +=               '  <option disabled selected value> -- select a Role -- </option>';

           $.each(role,function(i){
               if(company_type_id *2  == role[i].id || company_type_id *2+1  == role[i].id){

                htmlrole +=  '<option value="'+ role[i].id +'">'+ role[i].role +' </option>';
               }
           });
           htmlrole +=    '</select>';
           htmlrole +=       ' </div>';

           $('#roleDiv').html(htmlrole);
           console.log(htmlrole);

        });






        
         $(document).on('input','#role_id',function(){

            

             var role = $('#role_id').val();
             
             if(role % 2 == 1){
                
              var counters = @json($counters);
               var company_id = $('#company_id').val();
             
               var html = ''; 
                html += '<div class="form-group col-12">';
                html += '<label for="counter_id"> Counter</label>';
                html +=            ' <select class="form-control " name="counter_id" id="counter_id" required>';
                html +=               '  <option disabled selected value> -- select a Counter -- </option>';

                $.each(counters,function(i){
                    if(company_id == counters[i].company_id){

                        html +=  '<option value="'+ counters[i].id +'">'+ counters[i].name +' </option>';
                    }
                });
                    html +=    '</select>';
                    html +=       ' </div>';

                $('#counterDiv').html(html);
             }

          });






        $(document).on('click', "#user-edit-item", function () {
            $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            var options = {
                'backdrop': 'static'
            };
            $('#data-edit-modal').modal(options)

        });
        
        $('#data-edit-modal').on('show.bs.modal', function () {
            var el = $(".edit-item-trigger-clicked"); 
            var id = el.attr("data-item-id");
            var home = "{{route('home')}}";
            var action = home.trim() + '/super-admin/users/' + id;
            $("#user-edit-form").attr('action', action);
            $('#modal-input-id').val(id);

        });
        $('#data-edit-modal').on('hide.bs.modal', function () {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            $("#user-edit-form").trigger("reset");
        });


        
        $('#dataTable').DataTable({   
                    dom: 'lBfrtip',
                    buttons: [
                        'copy', 'csv', 'excel' , 'pdf' , 'print'
                    ]
                });

       
        

    });
</script>





@endsection
