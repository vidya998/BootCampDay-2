<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::select("select * from Student");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        $sub = $request->input('subject');
        $data = array('id' => $id , 'firstname' => $firstName , 'lastname'=>$lastName , 'subject' =>$sub);
        $id = DB::table('Student')->insertGetId($data);

        return response()->json([
            'id' => $id,
            'firstname' => $firstName,
            'lastname' => $lastName,
            'subject' => $sub
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $student = DB::table('Student')->find($id);
        return response()->json([
            'student'=>$student
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('Student')->delete($id);
        return response()->json([
            "message" => "student with id $id is successfully deleted!"
        ]);
    }
}
