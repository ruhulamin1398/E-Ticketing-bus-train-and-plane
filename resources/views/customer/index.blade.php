@extends('customer.includes.app')

@section('content')

<div class="card ">
    <div class="card-body">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="card-header  bg-dark-color ">
                    <nav class="navbar navbar-dark">
                        <a class="navbar-brand text-light">  Search {{ $company_type->name }}</a>
                    </nav>
                </div>
                
                <form  action="{{ route('search') }}" method="get">
                    
                    <div class="form-row align-items-center">
                        <div class="col-12 p-2">
                            <label for="from_destination_id"> From</label>
                          
                            <select class="form-control form-control" name="from_destination_id" id='from_destination_id' required>
                                <option selected disabled>Select Destination  </option>
                                @foreach ($destinations as $destination)
                                <option value={{$destination->id}}> {{$destination->name }}  </option>
                                @endforeach
                             
                            </select>
                        
                        </div>
                        <div class="col-12 p-2">

                            <label for="to_destination_id"> To</label>
                            <select class="form-control form-control" name="to_destination_id" id='to_destination_id' required>
                                 <option selected disabled>Select Destination  </option>
                                 @foreach ($destinations as $destination)
                                 <option value={{$destination->id}}> {{$destination->name }}  </option>
                                 @endforeach
                            </select>
                        </div>


                        <div class="col-12 p-2"  >
                           
                            <label for="to_destination_id">Date of Journey</label>

                            <input type="date" class="form-control form-control" name="date" id="date" required >
                              
                        </div>
                        <input type="text" name="company_type_id" value="{{ $company_type->id }}" hidden>
                        <div class="col-12 p-4" >
                                <button class=" btn btn-success btn-lg btn-block p-2 " id="SubmitBtn" type="submit" >Search</button >
                        </div>
                      



                    </div>

                </form>


            </div>
            
            <div class="col-12 col-md-6">
                <img src="{{ asset('img/customerTicket.jpg') }}" alt="ticket" width="100%">
                
            </div>


        </div>
    </div>
</div>


@endsection
