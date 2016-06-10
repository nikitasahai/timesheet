<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projectname;
use App\Timesheet;

use App\Http\Requests;

class TimeSh extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projectnames = Projectname::all();

        return view('timesheet.index' , ['projectnames' => $projectnames]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $pname = array();
        // $hours = array();
        // $description = array();
        // dd($request);
        // $pname2 = $request->input('pname');
        // $hours2 = $request->input('hours');

        $pnames = $request->input('projectnames');
        $hours = $request->input('projecthours');
        $descriptions = $request->input('description');


        $inputs = $request->all();
        $totalinputs = count($pnames);
        //dd($inputs);
       
        for($i = 0 ; $i<$totalinputs; $i++ )
        {  

        $newProject = Timesheet::create(['pname' => $pnames[$i], 'hours' => $hours[$i], 'description' => $descriptions[$i]]);
        }
        //$newProject = Projectname::Create($inputs);
       // return view('pages.about', compact('first', 'last', 'people'));
    
        return view('timesheet.saved', ['n' => "heysoulsister"]);//compact('newProject'));
    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showall(){
        
        $all_projects = Timesheet::all();
        return view('timesheet.show_timesheet' , compact('all_projects'));
    }
}
