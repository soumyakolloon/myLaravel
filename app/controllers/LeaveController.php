<?php

class LeaveController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new leave.
	 *
	 * @return Response
	 */
	public function showLeavesForm()
	{
		
		//Retrieve the leave types from database

		$leave_type_info = DB::table('leave_types')->get();
        
        foreach($leave_type_info as $lvt)
        {
        	$lt[$lvt->id] = $lvt->types;
        	//$lt['type'] = $lvt->types;
        }

		 //Get leave summary for session users

		$leave_info = DB::table('leave_summary')
        ->where('user_id', '=', Auth::user()->id)
        ->get();

        foreach($leave_info as $lfinfo)
        {
        	$leave_types[$lfinfo->id] = DB::table('leave_types')->where('id', '=', $lfinfo->leave_type_id)->get();		
        
        	$lfinfo->type = $leave_types[$lfinfo->id][0]->types;

        }


		return View::make('apply_leave', array('leave_types' => $lt, 'summary'=>$leave_info));

	}





	/**
	 * Show the form for creating a new leave.
	 *
	 * @return Response
	 */
	public function doLeavesForm()
	{
				

		//Retrieve the leave types from database

		$leave_type_info = DB::table('leave_types')->get();
        
        foreach($leave_type_info as $lvt)
        {
        	$lt[$lvt->id] = $lvt->types;
        	//$lt['type'] = $lvt->types;
        }


        //Get leave summary for session users

		$leave_info = DB::table('leave_summary')
        ->where('user_id', '=', Auth::user()->id)
        ->get();

        foreach($leave_info as $lfinfo)
        {
        	$leave_types[$lfinfo->id] = DB::table('leave_types')->where('id', '=', $lfinfo->leave_type_id)->get();		
        
        	$lfinfo->type = $leave_types[$lfinfo->id][0]->types;

        }


        $rules = array('reason_for_Leave'    => 'required', '');
        $validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
		return View::make('apply_leave', array('leave_types'=>$lt, 'summary'=>$leave_info))
		->withErrors($validator) // send back all errors to the login form
		->withInput(); // send back the input (not the password) so that we can repopulate the form
		} else {

		$leavedata = array(
		'leave_type'     => Input::get('leave_type'),
		'leave_nature' => Input::get('day'),
		'leave_session' => Input::get('session'),
		'fromdate' => Input::get('fromdate'),
		'todate' => Input::get('todate'),
		'reason' => Input::get('reason_for_leave'),
		'user_id' => Auth::user()->id

		);
		



		$leaveSummaryObj = new LeaveSummary();



		//Save the leave data
		$leaveSummaryObj->leave_type_id = $leavedata['leave_type'];
		$leaveSummaryObj->leave_nature = $leavedata['leave_nature'][0];
		$leaveSummaryObj->leave_session = $leavedata['leave_session'][0];
		$leaveSummaryObj->fromdate = $leavedata['fromdate'];
		$leaveSummaryObj->todate = $leavedata['todate'];
		$leaveSummaryObj->reason = $leavedata['reason'];
		$leaveSummaryObj->leave_status = 'Pending';

		$leaveSummaryObj->user_id = Auth::user()->id;


        	if($leaveSummaryObj->save())
        	{
        		$leave_info = DB::table('leave_summary')
        ->where('user_id', '=', Auth::user()->id)
        ->get();

        foreach($leave_info as $lfinfo)
        {
        	$leave_types[$lfinfo->id] = DB::table('leave_types')->where('id', '=', $lfinfo->leave_type_id)->get();		
        
        	$lfinfo->type = $leave_types[$lfinfo->id][0]->types;

        }
			return View::make('apply_leave', array('msg'=>'Success', 'leave_types'=>$lt, 'summary'=>$leave_info));
			}
			else
			{
			return View::make('apply_leave', array('msg'=>'error', 'leave_types'=>$lt,'summary'=>$leave_info));
			}

		}


		



	}




















	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
