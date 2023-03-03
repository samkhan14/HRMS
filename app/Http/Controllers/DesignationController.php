<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'working';
        $get_designations = Designation::get();
        return view('portal_pages.designation.designations',compact('get_designations'));
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
        $request->validate([
            'des_title' => 'required',
        ]);

        Designation::create($request->all());
         return response()->json(['res'=>' Successfully Data Added']);
        // return redirect('designations')->with('success','Designation Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $edit_desg = Designation::findorFail($id);
        } catch (\Exception $e) {
            return view('portal_pages.error.notFound');
        }

             return view('portal_pages.designation.edit_designation',compact('edit_desg'));
            // return view('portal_pages.designation.designation',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

     $data = $request->validate(['des_title' => 'required']);

     Designation::whereId($id)->update($data);
     return redirect('/designations')->with('success','Designation Name has been updated');
        // $designation->update($request->all());
        // return redirect('/designations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {

        $designation->delete();
        return redirect('/designations')->with('success','Designation has been deleted');
    }
}
