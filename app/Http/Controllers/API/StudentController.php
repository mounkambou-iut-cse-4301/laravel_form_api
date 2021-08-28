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
}
