@extends('layouts')              
@section('content')

    <!-- Content Container -->
    <div class="container h-100 mb-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6 pt-2">               
                <h2 class="text-center text-primary mt-4">{{strtoupper('generate time table')}}</h2>
                <!-- Form -->
                <form class="form-example mt-5" id="mainFormTimeTable" action="{!! url('/formData/store')!!}" method="post" enctype="multipart/form-data">                     
                    <!-- Input fields -->
                    <div class="form-group">
                        <label for="working_days">Working Days :</label>
                        <input type="text" name="working_days" id="working_days" class="form-control  working_days  {{ $errors->has('working_days') ? ' is-invalid' : '' }}" placeholder="Enter number of working days in number"  minlength="1">
                        <span class="working_days-error invalid-feedback"></span>
                        @if ($errors->has('working_days'))
                            <span class="invalid-feedback">{{ $errors->first('working_days') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="noOfWorkingHorsPerDay">No of Working Hours Per Day :</label>
                        <input type="text" name="noOfWorkingHorsPerDay" class="form-control noOfWorkingHorsPerDay" id="noOfWorkingHorsPerDay" placeholder="Enter number of working hours per day in number">
                        <span class="noOfWorkingHorsPerDay-error invalid-feedback"></span>
                        @if ($errors->has('noOfWorkingHorsPerDay'))
                            <span class=" invalid-feedback">{{ $errors->first('noOfWorkingHorsPerDay') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="totalSubject">Total  Subjects :</label>
                        <input type="text" name="totalSubject" class="form-control totalSubject" id="totalSubject" placeholder="Enter total subject in number">
                        <span class="totalSubject-error invalid-feedback"></span>
                        @if ($errors->has('totalSubject'))
                            <span class=" invalid-feedback">{{ $errors->first('totalSubject') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="noOfSubjectPerDay">No of Subject Per Day :</label>
                        <input type="text" name="noOfSubjectPerDay" class="form-control noOfSubjectPerDay" id="noOfSubjectPerDay" placeholder="Enter number of subject per day in number">
                        <span class="noOfSubjectPerDay-error invalid-feedback"></span>
                        @if ($errors->has('noOfSubjectPerDay'))
                            <span class=" invalid-feedback">{{ $errors->first('noOfSubjectPerDay') }}</span>
                        @endif
                    </div>

                    <div class="form-group totalHoursForWeekDiv" style="display: none">
                        <label for="totalHoursForWeek">Total Hours For Week :</label>
                        <input type="text" name="totalHoursForWeek" class="form-control totalHoursForWeek" id="totalHoursForWeek" value="" readonly>
                    </div>

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success col-md-12 mt-2">CLICK ME</button>
                    </div>
                    <!-- End input fields -->
                </form>
                <!-- Form end -->
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
            /*Validate Number of working days field*/
            $('body').on('keyup', '.working_days', function(){

                var values = $(this).val();
                if (!values.replace(/\s/g, '').length) {
                    $(this).val("");
                    $(".working_days-error").text("This field is required.");
                    $(this).addClass('is-invalid');
                }
                else if(!values.match(/^[1-8]*$/)) {

                    if(values == 0 || values == 9) {
                        $(this).val("");
                        $(".working_days-error").text("Only digit from 1 to 8 allowed.");
                        $(this).addClass('is-invalid');
                    }
                    else{
                        $(this).val("");
                        $(".working_days-error").text("Only number data allowed.");
                        $(this).addClass('is-invalid');
                    }
                    
                }
                else if(!values.match(/^[1-8]{1,1}$/)) {
                    $(this).val("");
                    $(".working_days-error").text("Only single digit are allowed.");
                    $(this).addClass('is-invalid');
                }
                else{
                    $(".working_days-error").val();
                    $(this).removeClass('is-invalid');

                    var noOfWorkingHorsPerDay_val = $('.noOfWorkingHorsPerDay').val();
                    if (values != "" && noOfWorkingHorsPerDay_val != "") {

                        $('.totalHoursForWeekDiv').css({"display":""});
                        $('.totalHoursForWeek').val(values * noOfWorkingHorsPerDay_val);
                    }
                    else {
                        $('.totalHoursForWeekDiv').css({"display":"none"});
                        $('.totalHoursForWeek').val();
                    }
                }
            });


            /*Validate Number of working hours per day field*/
            $('body').on('keyup', '.noOfWorkingHorsPerDay', function(){

                var values = $(this).val();
                if (!values.replace(/\s/g, '').length) {
                    $(this).val("");
                    $(".noOfWorkingHorsPerDay-error").text("This field is required.");
                    $(this).addClass('is-invalid');
                }
                else if(!values.match(/^[1-9]*$/)) {

                    if(values == 0 || values == 10) {
                        $(this).val("");
                        $(".noOfWorkingHorsPerDay-error").text("Only digit from 1 to 9 allowed.");
                        $(this).addClass('is-invalid');
                    }
                    else{
                        $(this).val("");
                        $(".noOfWorkingHorsPerDay-error").text("Only number data allowed.");
                        $(this).addClass('is-invalid');
                    }
                    
                }
                else if(!values.match(/^[1-9]{1,1}$/)) {
                    $(this).val("");
                    $(".noOfWorkingHorsPerDay-error").text("Only single digit are allowed.");
                    $(this).addClass('is-invalid');
                }
                else{
                    $(".noOfWorkingHorsPerDay-error").val();
                    $(this).removeClass('is-invalid');

                    var working_days_val = $('.working_days').val();
                    if (values != "" && working_days_val != "") {

                        $('.totalHoursForWeekDiv').css({"display":""});
                        $('.totalHoursForWeek').val(values * working_days_val);
                    }
                    else {
                        $('.totalHoursForWeekDiv').css({"display":"none"});
                        $('.totalHoursForWeek').val();
                    }
                }
            });


            /*Validate total subject field*/
            $('body').on('keyup', '.totalSubject', function()
            {
                var values = $(this).val();
                if (!values.replace(/\s/g, '').length) {
                    $(this).val("");
                    $(".totalSubject-error").text("This field is required.");
                    $(this).addClass('is-invalid');
                }
                else if(!values.match(/^[1-9][0-9]*$/)) 
                {
                    if(values == 0) {
                        $(this).val("");
                        $(".totalSubject-error").text("Only zero not allowed.");
                        $(this).addClass('is-invalid');
                    }
                    else{
                        $(this).val("");
                        $(".totalSubject-error").text("Only number data allowed.");
                        $(this).addClass('is-invalid');
                    }                
                }
                else
                {
                    $(".totalSubject-error").val();
                    $(this).removeClass('is-invalid');
                }
            });

            /*Validate Number of subject per day field*/
            $('body').on('keyup', '.noOfSubjectPerDay', function()
            {
                var values = $(this).val();
                if (!values.replace(/\s/g, '').length) {
                    $(this).val("");
                    $(".noOfSubjectPerDay-error").text("This field is required.");
                    $(this).addClass('is-invalid');
                }
                else if(!values.match(/^[1-9][0-9]*$/)) 
                {
                    if(values == 0) {
                        $(this).val("");
                        $(".noOfSubjectPerDay-error").text("Only zero not allowed.");
                        $(this).addClass('is-invalid');
                    }
                    else{
                        $(this).val("");
                        $(".noOfSubjectPerDay-error").text("Only number data allowed.");
                        $(this).addClass('is-invalid');
                    }                
                }
                else{
                    $(".noOfSubjectPerDay-error").val();
                    $(this).removeClass('is-invalid');
                }
            });


            /*Form submit time check for validation and prevent form otherwise submit it*/
            $('#mainFormTimeTable').submit(function(e) 
            {
                var working_days_val = $('.working_days').val();
                var noOfWorkingHorsPerDay_val = $('.noOfWorkingHorsPerDay').val();
                var totalSubject_val = $('.totalSubject').val();
                var noOfSubjectPerDay_val = $('.noOfSubjectPerDay').val();
                
                if (working_days_val == "") { 
                    $('.working_days-error').text("This field is required.");
                    $('.working_days').addClass('is-invalid');
                    e.preventDefault();
                }
                else if (noOfWorkingHorsPerDay_val == "") { 
                    $(".noOfWorkingHorsPerDay-error").text("This field is required.");
                    $('.noOfWorkingHorsPerDay').addClass('is-invalid');
                    e.preventDefault();
                }
                else if (totalSubject_val == "") { 
                    $(".totalSubject-error").text("This field is required.");
                    $('.totalSubject').addClass('is-invalid');
                    e.preventDefault();
                }
                else if (noOfSubjectPerDay_val == "") { 
                    $(".noOfSubjectPerDay-error").text("This field is required.");
                    $('.noOfSubjectPerDay').addClass('is-invalid');
                    e.preventDefault();
                }
                else
                {                    
                    $(".working_days-error").val();
                    $(this).removeClass('is-invalid');
                    $(".noOfWorkingHorsPerDay-error").val();
                    $(this).removeClass('is-invalid');
                    $(".totalSubject-error").val();
                    $(this).removeClass('is-invalid');
                    $(".noOfSubjectPerDay-error").val();
                    $(this).removeClass('is-invalid');
                }
            });
            
        });
    </script>
    <!-- Script end -->
@endsection
