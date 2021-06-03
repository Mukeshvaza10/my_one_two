<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenerateTimeTable;

class GenerateTimeTableController extends Controller
{
	/*Get form view to fill data*/
    public function getFormToFillData()
    {
    	return view('home');
    }

    /*Store basic data of Time table generate form*/
    public function storeFormData(Request $request)
    {

    	$this->validate($request, [  
         	'working_days' => 'required|max:8|min:1|regex:/^[1-8]*$/',
         	'noOfWorkingHorsPerDay' => 'required|max:9|min:1|regex:/^[1-9]*$/',
         	'totalSubject' => 'required|min:1|regex:/^[1-9][0-9]*$/',
         	'noOfSubjectPerDay' => 'required|min:1|regex:/^[1-9][0-9]*$/',
		 ],[
			'working_days.regex' => 'Only positive number 1 to 8 allowed.',
			'noOfWorkingHorsPerDay.regex' => 'Only positive number 1 to 9 allowed.',
			'totalSubject.regex' => 'Only positive number allowed, greater than zero.',
			'noOfSubjectPerDay.regex' => 'Only positive number allowed, greater than zero.',
		]);

    	$generateTimeTable = new GenerateTimeTable;
    	$generateTimeTable->working_day = $request->working_days;
    	$generateTimeTable->working_hours = $request->noOfWorkingHorsPerDay;
    	$generateTimeTable->total_subject = $request->totalSubject;
    	$generateTimeTable->num_sub_per_day = $request->noOfSubjectPerDay;
    	$generateTimeTable->total_hours_for_week = $request->totalHoursForWeek;
    	$generateTimeTable->save();

    	return redirect()->route('addSubjectDettails', array('id' => $generateTimeTable->id)); 
    }

    /*Display view file of subject details add form */
    public function subjectDetailsAdd($id)
	{
		$basicDataOfTimeTable = GenerateTimeTable::where('id', '=', $id)->first();

		return view('subjectDetailsForm', compact('id', 'basicDataOfTimeTable'));
	}


	/*Store subject data for generate Time table*/
    public function storeSubjectFormData(Request $request)
    {

        $subject_name = $request->subjectName;
        $numberOfTime_repeat = $request->numberOfTime;
        $user_id = $request->user_id;

        $newArray = array_combine($subject_name, $numberOfTime_repeat);

        $fullSubjectArray = array();
        foreach ($newArray as $key => $value) {
            for ($i=0; $i < $value; $i++) { 
                $fullSubjectArray[] = $key;                
            }
        }
        
        $subjectIsHowManyTime = json_encode($fullSubjectArray);

    	$generateTimeTable = GenerateTimeTable::find($user_id);
        $generateTimeTable->time_table = $subjectIsHowManyTime;
    	$generateTimeTable->save();

        return redirect()->route('timetable_view', array('user_id' => $user_id));
    }

    
    /*Generate time table and display in blade file*/
    public function getTimeTable($user_id)
    {
        $basicDataOfTimeTable = GenerateTimeTable::where('id', '=', $user_id)->first();
        $isTimeTable = $basicDataOfTimeTable->time_table;
        $generateTimeTables = json_decode($isTimeTable);

        return view('displayTimeTable', compact('user_id', 'basicDataOfTimeTable', 'generateTimeTables'));
    }

	
    public function list()
    {
        $generatedTimeTableDatas = GenerateTimeTable::orderBy('id','desc')->paginate(5);

        return view('list', compact('generatedTimeTableDatas'));   
    }
}
