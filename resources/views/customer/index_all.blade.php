@extends('customer.includes.app')

@section('content')

<div class="card ">
    <div class="card-body">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="card-header  bg-dark-color ">
                    <nav class="navbar navbar-dark">
                        <a class="navbar-brand text-light">  Search Vahicle</a>
                    </nav>
                </div>
                
                <form id="searchForm" action="{{ route('search') }}" method="get">
                    
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
                        <input type="text" name="company_type_id" id="company_type_id" value="1" hidden >
                        <div class="col-3 p-2" >
                                <button class=" btn btn-success btn-lg btn-block p-2 " id="SubmitBtn" type="button" onclick="setCompanyType(1)"  >Bus</button >
                        </div>  
                        <div class="col-3 p-2" >
                                <button class=" btn btn-success btn-lg btn-block p-2 " id="SubmitBtn" type="button" onclick="setCompanyType(2)"  >Train</button >
                        </div> 
                         <div class="col-3 p-2" >
                                <button class=" btn btn-success btn-lg btn-block p-2 " id="SubmitBtn" type="button" onclick="setCompanyType(4)"  >AirPlane</button >
                        </div> 
                         <div class="col-3 p-2" >
                                <button class=" btn btn-success btn-lg btn-block p-2 " id="SubmitBtn" type="button" onclick="setCompanyType(3)"  >Launch</button >
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


<script>

    
    function setCompanyType(companyType){
        $("#company_type_id").val(companyType);
        $("#searchForm").submit();
    }

</script>

@endsection
