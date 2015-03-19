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

		

		return View::make('apply_leave', array('leave_types' => $lt));

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
