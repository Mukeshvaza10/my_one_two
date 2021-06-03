@extends('layouts')              
@section('content')

    <!-- Content Container -->
    <div class="container mb-5">
    	<h2 class="text-center text-primary mt-2">{{strtoupper('Fill Subject Data')}}</h2>
    	<p class="text-primary text-center"><span class="text-danger">*Note: </span> The total hours of subject must be equal to "Total hours for Week: Here total Hours of Week is :: <span class="text-danger"><b> {{$basicDataOfTimeTable->total_hours_for_week}} Hours </b></span></p>
    	
        <!-- Form -->
        <form class="" id="" method="post" action="{!! url('/subjectFormData/store')!!}" enctype="multipart/form-data">
    		@if(!empty($basicDataOfTimeTable))
                @php
                    $counter=0;
                @endphp
	    		@for($i = 0; $i < $basicDataOfTimeTable->total_subject; $i++)
			  	<!-- Input fields -->
                <div class="form-row">
				    <div class="form-group col-md-4 offset-2">
				      	<label for="subjectName">Subject Name : </label>
				      	<input type="text" name="subjectName[]" class="form-control subjectName subjectName_{{$i}} {{ $errors->has('subjectName') ? ' is-invalid' : '' }}" id="subjectName" placeholder="Enter subject name" rows="{{$i}}" required>

				      	<span class="subjectName_{{$i}}-error invalid-feedback"></span>
	                    @if ($errors->has('subjectName'))
	                        <span class="invalid-feedback">{{ $errors->first('subjectName') }}</span>
	                    @endif
				    </div>
				    <div class="form-group col-md-4">
				      	<label for="numberOfTime">Number Of Time : </label>
				      	<input type="text" name="numberOfTime[]" class="form-control numberOfTime numberOfTime_{{$i}} {{ $errors->has('numberOfTime') ? ' is-invalid' : '' }}" id="numberOfTime" placeholder="Enter number of time subject" rows="{{$i}}" required>

				      	<span class="numberOfTime_{{$i}}-error invalid-feedback"></span>
	                    @if ($errors->has('numberOfTime'))
	                        <span class="invalid-feedback">{{ $errors->first('numberOfTime') }}</span>
	                    @endif
				    </div>
			  	</div>
                @php
                    $counter++;
                @endphp
                <!-- Input fields end -->
			  	@endfor
		  	@endif

            <input type="hidden" name="user_id" value="{{$id}}">
            <input type="hidden" name="countTotalHours" class="countTotalHours" isCount="{{$counter}}" value="{{$basicDataOfTimeTable->total_hours_for_week}}" totalHourIsDB="{{$basicDataOfTimeTable->total_hours_for_week}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
		  	<button type="submit" class="btn btn-success offset-2 col-md-8 mb-5 isSubmit">{{strtoupper('generate time table')}}</button>
		</form>
        <!-- Form end -->            
    </div>
    <!-- Content Container end-->
    
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>    

    <script>
        $(document).ready(function()
        {
            /*Validate Number of working days field*/
            $('body').on('keyup', '.subjectName', function(){

                var row_id = $(this).attr('rows');
                var values = $('.subjectName_'+row_id).val();

                if (!values.replace(/\s/g, '').length) {
                    $('.subjectName_'+row_id).val("");
                    $('.subjectName_'+row_id+'-error').text("This field is required.");
                    $('.subjectName_'+row_id).addClass('is-invalid');
                }
                else if(!values.match(/^[a-zA-z][a-zA-z ]*$/))
                {
                    $('.subjectName_'+row_id).val("");
                    $('.subjectName_'+row_id+'-error').text("Only alphabets allowed.");
                    $('.subjectName_'+row_id).addClass('is-invalid');
                }
                else{
                    $('.subjectName_'+row_id+'-error').val();
                    $('.subjectName_'+row_id).removeClass('is-invalid');
                }
            });


            /*Validate Number of working hours per day field*/
            $('body').on('keyup', '.numberOfTime', function(){

                var row_id = $(this).attr('rows');
                var values = $('.numberOfTime_'+row_id).val();

                if (!values.replace(/\s/g, '').length) {
                    $('.numberOfTime_'+row_id).val("");
                    $('.numberOfTime_'+row_id+'-error').text("This field is required.");
                    $('.numberOfTime_'+row_id).addClass('is-invalid');
                }
                else if(!values.match(/^[1-9][0-9]*$/)) 
                {                        
                    if(values == 0) {
                        $('.numberOfTime_'+row_id).val("");
                        $('.numberOfTime_'+row_id+'-error').text("At first position zero not allowed.");
                        $('.numberOfTime_'+row_id).addClass('is-invalid');
                    }
                    else{
                        $('.numberOfTime_'+row_id).val("");
                        $('.numberOfTime_'+row_id+'-error').text("Only numeric data allowed.");
                        $('.numberOfTime_'+row_id).addClass('is-invalid');
                    }                                       
                }
                else if(!values.match(/^[0-9]{1,2}$/)) {
                    $('.numberOfTime_'+row_id).val("");
                    $('.numberOfTime_'+row_id+'-error').text("Only two digit are allowed.");
                    $('.numberOfTime_'+row_id).addClass('is-invalid');
                }
                else{
                    $('.numberOfTime_'+row_id+'-error').val();
                    $('.numberOfTime_'+row_id).removeClass('is-invalid');
                }
            });


            /*Form submit time check if total hours value is equal to DB's total hours value, if is it not match then do not submit data*/
            $('.isSubmit').on('click', function(e) {

                var isCountVal = $('.countTotalHours').attr('isCount');
                var isTotalHours = $('.countTotalHours').val();
                var isTotal = 0;

                for (var i = 0; i < isCountVal; i++) {
                    isTotal += Number($('.numberOfTime_'+i).val());
                }

                if (isTotalHours != isTotal) {
                    e.preventDefault();
                    alert("Total hours is " + isTotalHours + ". Please enter number of time subject sum is an equal to : " + isTotalHours);
                }
            });
                        
        });
    </script>
    <!-- Script end -->
@endsection
