<?php

namespace App\Http\Controllers;
use App\models\LmsModel;
use Illuminate\Http\Request;

class LmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return redirect('/');
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
         //create a validation
        $validated = $request->validate([
        'employee_name' => 'required|max:255',
        'type' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'reason' => 'required',
        'status' => 'required'
        ]);

        //create a eloquent query ORM
        $data = array(
            "employee_name" => $request->employee_name,
            "type" => $request->type,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "reason" => $request->reason,
            "status" => $request->status,
        );

        // insert data
        LmsModel::create($data);

        return redirect("/")->with("success", "Employee Added successfully...!");
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         $data=LmsModel::all();
        return view("lms.content", ['data'=>$data]);
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $data=LmsModel::where('id',$id)->first();
        return view('lms.edit-leave',["data"=>$data]);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
         $data=array(
            "employee_name"=>$request->employee_name,
            "type"=>$request->type,
            "start_date"=>$request->start_date,
            "end_date"=>$request->end_date, 
            "reason"=>$request->reason,
            "status"=>$request->status
        );
        // create elequent query builder for update data
        LmsModel::where('id',$id)->update($data);
        return redirect('/')->with('success','Leave data successfully updated');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LmsModel::destroy($id);
        return redirect("/")->with("del","Leave has been deleted successfully....!"); 

    }
}
