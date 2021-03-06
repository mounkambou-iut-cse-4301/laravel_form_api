<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function index(){
        $students=Student::all();
        return response()->json([
            'status'=>200, 
            'students'=>$students, 
        ]);
    }
    public function store(Request $req){
       $student=new Student();
       $student->name=$req->input('name');
       $student->course=$req->input('course');
       $student->email=$req->input('email');
       $student->phone=$req->input('phone');
       $student->save();

       return response()->json([
           'status'=>200, 
           'message'=>'Student Added Successfully', 
       ]);
    }

    public function edit($id){
        $student= Student::find($id);
        return response()->json([
            'status'=>200, 
            'student'=>$student, 
        ]);
    }


    public function update(Request $req, $id){
        $student= Student::find($id);
        $student->name=$req->input('name');
        $student->course=$req->input('course');
        $student->email=$req->input('email');
        $student->phone=$req->input('phone');
        $student->update();
 
        return response()->json([
            'status'=>200, 
            'message'=>'Student Updated Successfully', 
        ]);
    }

    public function delete($id){
        $student= Student::find($id);
        $student->delete();
        return response()->json([
            'status'=>200, 
            'message'=>'Student Deleted Successfully', 
        ]);
    }
}
