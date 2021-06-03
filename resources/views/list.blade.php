@extends('layouts')              
@section('content')

    <!-- Content Container -->
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<h2 class="text-center mt-4 text-primary">{{strtoupper('list of generated time table')}}</h2>

    			<!-- Table -->
                <table id="" class="table table-hover mt-5 table-responsive-sm table-responsive-md">
                	<thead class="thead-dark text-secondary">
                    	<tr>
                    		<th> # </th>	                        	
	                        <th> Working Days </th>
	                        <th> Working Hours </th>
	                        <th> Total Subject </th>
	                        <th> Number of Subject Per Day </th>
	                        <th> Total Hours For Week </th>
	                        <th> Action </th>	                    	
                        </tr>
                    </thead>

                    <tbody>
                    	@if(!empty($generatedTimeTableDatas))
                    	@foreach($generatedTimeTableDatas as $key => $timeTableData)
                    		<tr>
                    		<th> {{$key+1}} </th>
	                        <td> {{$timeTableData->working_day}} </td>
	                        <td> {{$timeTableData->working_hours}} </td>
	                        <td> {{$timeTableData->total_subject}} </td>
	                        <td> {{$timeTableData->num_sub_per_day}} </td>
	                        <td> {{$timeTableData->total_hours_for_week}} </td>
	                        <td> 
	                        	<a href="{!! url('/generatedTimeTable/view/'.$timeTableData->id) !!}"><button type="button" class="btn btn-info">View</button></a>
	                        </td>
	                       </tr>
	                    @endforeach
	                    @else
	                    	<p class="text-center texr-danger">Data Not Available</p>
	                    @endif
                    </tbody>
                </table>
                <!-- Table end-->

                <!-- Pagination -->
                {{$generatedTimeTableDatas->links('pagination::bootstrap-4')}}

            </div>
        </div>    
    </div>
    <!-- Content Container end-->
    
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>    

    <script>
        $(document).ready(function()
        {        
                        
        });
    </script>
    <!-- Script end -->

@endsection
