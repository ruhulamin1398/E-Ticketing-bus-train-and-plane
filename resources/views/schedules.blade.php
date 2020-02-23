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
            <form method="POST" action="{{ route('schedules.store') }}">
                @csrf
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <span class="text-dark pl-2"> Date</span>
                        <input type="date" min="{{'20'.now()->format('y-m-d')}}" name="date" class="form-control mb-2" required>


                    </div>

                    <div class="col-auto">
                        <span class="text-dark pl-2"> Time</span>
                        <input type="time" name="time" class="form-control mb-2" required>


                    </div>

                    <div class="col-auto">


                        <span class="text-dark pl-2">Road</span>

                        <select class="form-control form-control" name="road_id" required>
                            <option>Select Road </option>
                            @foreach ($roads as $road)
                            <option value={{$road->id}}> {{$road->from->name}} - {{$road->to->name}} </option>
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
                            <th>Date</th>
                            <th>Time</th>
                            <th>Road</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot class="bg-abasas-dark">


                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Road</th>
                            <th>Action</th>
                        </tr>

                    </tfoot>
                    <tbody>

                        <?php $i = 1; ?>
                        @foreach ($schedules as $schedule)
                        <?php $id = $schedule->id; ?>
                        <tr class="data-row">
                            <td class="iteration">{{$i++}}</td>
                            <td class=" word-break date " >{{$schedule->date}} </td>
                            <td class=" word-break time ">{{$schedule->time}}</td>
                            <td class=" word-break road ">{{$schedule->road->from->name}} - {{$schedule->road->to->name}} </td>



                            <td class="align-middle">
                                <button type="button" class="btn btn-success" id="edit-schedule-item" data-item-id={{$id}}> <i class="fa fa-edit" aria-hidden="false"> </i></button>







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
<div class="modal fade" id="edit-schedule-modal" tabindex="-1" role="dialog" aria-labelledby="edit-schedule-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="edit-schedule-modal-label ">Schedule Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="attachment-body-content">
                <form id="edit-form" class="form-horizontal" method="POST" action="{{route('schedule-update')}}">
                    @csrf



                    <!-- id -->
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-id">Id </label>
                        <input type="text" name="id" class="form-control" id="modal-input-id" required readonly>
                    </div>
                    <!-- /id -->
                    <!-- name -->
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-road">Road</label>
                        <input type="text" name="road" class="form-control" id="modal-input-road" required autofocus readonly>
                    </div>
                    <!-- name -->
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-date">date</label>
                        <input type="date" name="date"  min="{{'20'.now()->format('y-m-d')}}" class="form-control" id="modal-input-date" required autofocus>
                    </div>
                    <!-- /name -->
                    <!-- description -->
                    <div class="form-group">
                        <label class="col-form-label" for="modal-input-time">Time</label>
                        <input type="time" name="time" class="form-control" id="modal-input-time" required>
                    </div>

                    <!-- /name -->
                    <!-- description -->


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