<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectCase;
use App\Models\SubCase;

class SubCaseController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $CaseStatus = CaseStatus::whereNotIn('id', [2])->pluck('stage', 'id');
        $ProjectCase = ProjectCase::find($id);
        return view('subcase.create', ['ProjectCase' => $ProjectCase]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'deliverables' => 'required',
        ]);

        $SubCase = new SubCase;
        $SubCase->title = $request->input('title');
        $SubCase->description = $request->input('description');
        $SubCase->deliverables = $request->input('deliverables');
        $SubCase->price = $request->input('price');
        $SubCase->project_case_id = $request->input('project_case_id');
        $SubCase->save();

        return redirect('/projectcase/'.$SubCase->project_case_id)->with('success', 'Subcase: '.$SubCase->title.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $SubCase = SubCase::find($id);
        $ProjectCase = $SubCase->ProjectCase;
        return view('subcase.edit')->with(['SubCase' => $SubCase, 'ProjectCase' => $ProjectCase]);
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'deliverables' => 'required',
        ]);

        $SubCase = SubCase::find($id);
        $SubCase->title = $request->input('title');
        $SubCase->description = $request->input('description');
        $SubCase->deliverables = $request->input('deliverables');
        $SubCase->price = $request->input('price');
        $SubCase->project_case_id = $request->input('project_case_id');
        $SubCase->save();

        return redirect('/projectcase/'.$SubCase->project_case_id)->with('success', 'Subcase: '.$SubCase->title.' created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SubCase = SubCase::find($id);
        $SubCase->delete();
        return redirect('/projectcase/'.$SubCase->project_case_id)->with('success', 'Subcase removed');
    }
}
