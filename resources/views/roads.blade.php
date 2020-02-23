@extends('layout.app')

@section('sidebar')
@include('layout.adminSidebar')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card mb-4 shadow">


        <div class="card-header py-3 bg-abasas-dark">
            <nav class="navbar navbar-dark ">
                <a class="navbar-brand"> New Road</a>

            </nav>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('roads.store') }}">
                @csrf
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <span class="text-dark pl-2"> From</span>
                        
                        <select class="form-control form-control" name="from_counter_id"  required>
                            <option value="1">Select Counter </option>
                            @foreach ($counters as $counter)
                            <option value={{$counter->id}}> {{$counter->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">

                        <span class="text-dark pl-2">To</span>

                        <select class="form-control form-control" name="to_counter_id"  required>
                            <option value="1">Select Counter </option>
                            @foreach ($counters as $counter)
                            <option value={{$counter->id}}> {{$counter->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-auto">

                        <span class="text-dark pl-2">Distance</span>
                        <input type="number" name="distance" class="form-control mb-2" id="inlineFormInput" required>
                    </div>
                    <div class="col-auto">

                        <span class="text-dark pl-2">Cost</span>
                        <input type="number" name="cost" class="form-control mb-2" id="inlineFormInput" required>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3 bg-abasas-dark">
            <nav class="navbar navbar-dark ">
                <a class="navbar-brand"> Road List</a>

            </nav>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable1" width="100%" cellspacing="0">
                    <thead class="bg-abasas-dark">


                        <tr>
                            <th>#</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Distance</th>
                            <th>Cost</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot class="bg-abasas-dark">
                        <tr>
                            
                        <th>#</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Distance</th>
                            <th>Cost</th>
                            <th>Action</th>

                        </tr>

                    </tfoot>
                    <tbody>

                        <?php $i = 1; ?>
                        @foreach ($roads as $road)
                        <?php $id = $road->id; ?>
                        <tr class="data-row">
                            <td class="iteration">{{$i++}}</td>
                            <td class="  word-break from">{{$road->from->name}}</td>
                            <td class="  word-break to">{{$road->to->name}}</td>
                            <td class=" word-break distance ">{{$road->distance}}</td>
                            <td class=" word-break cost ">{{$road->cost}}</td>



                            <td class="align-middle">
                                <button type="button" class="btn btn-success" id="edit-road-item" data-item-id={{$id}}> <i class="fa fa-edit" aria-hidden="false"> </i></button>


                                <form method="POST" action="{{ route('roads.destroy',  $road->id )}} " id="delete-form-{{ $road->id }}" style="display:none; ">
                                    {{csrf_field() }}
                                    {{ method_field("delete") }}
                                </form>




                                <button onclick="if(confirm('are you sure to delete this')){
				document.getElementById('delete-form-{{ $road->id }}').submit();
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
<div class="modal fade" id="edit-road-modal" tabindex="-1" role="dialog" aria-labelledby="edit-road-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="edit-road-modal-label ">Edit Road</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="attachment-body-content">
                <form id="edit-form" class="form-horizontal" method="POST" action="{{route('road-update')}}">
                    @csrf



                    <!-- id -->
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-id">Id </label>
                        <input type="text" name="id" class="form-control" id="modal-input-id" required readonly>
                    </div>
                    <!-- /id -->
                    <!-- name -->
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-from">From</label>
                        <input type="text" name="from-counter-id" class="form-control" id="modal-input-from" required autofocus readonly>
                    </div>
                    <!-- /name -->
                    <!-- description -->
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-to">To</label>
                        <input type="text" name="to-counter-id" class="form-control" id="modal-input-to" required readonly>
                    </div>
                    <!-- name -->
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-distance">Distance</label>
                        <input type="text" name="distance" class="form-control" id="modal-input-distance" required autofocus>
                    </div>
                    <!-- /name -->
                    <!-- description -->
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-cost">Cost</label>
                        <input type="text" name="cost" class="form-control" id="modal-input-cost" required>
                    </div>

                    <div class="form-group">

                        <input type="submit" value=" submit" class="form-control btn btn-success">
                    </div>
                    <!-- /description -->




                </form>
            </div>

        </div>
    </div>
</div>
</div>



@endsection