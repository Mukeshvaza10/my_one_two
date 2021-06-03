@extends('layouts')              
@section('content')

    <!-- Content Container -->
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<h2 class="text-center mt-4 text-primary">{{strtoupper('generated time table')}}</h2>

    			<!-- Table -->
                <table id="" class="table table-hover mt-5 table-responsive-sm table-responsive-md">
                	<thead class="thead-dark text-secondary">
                    	<tr>
	                    	@for($i=1; $i <= $basicDataOfTimeTable->working_day; $i++)               
	                        	@if($i == 1)
	                        		<th> # </th>
	                        	@endif
	                        	<th> {{$i}} </th>
	                        @endfor
                        </tr>
                    </thead>

                    <tbody>
                    	@php
                    		$counter = 1;
                    		$no_is = 1;
                    	@endphp

                    	@foreach($generateTimeTables as $key => $timeTableData)
                    		@if($counter == 1)
                    		<tr>
                    			<th> {{$no_is}} </th>
                    		@endif
                    			
                    			<td> {{$timeTableData}} </td>              
                              		
                    		@if($basicDataOfTimeTable->working_day == $counter)
                    		</tr>
                    			@php
			                		$counter = 0;
			                		$no_is++;
			                	@endphp
                    		@endif

                    		@php
		                		$counter++;
		                	@endphp
                    	@endforeach
                    </tbody>
                </table>
                <!-- Table end-->
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
