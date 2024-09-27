<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return Student::all();
    }

    public function store(Request $request){
        $request->validate([
            'name' =>'required|string|max:255',
            'age' =>'required|integer',
            'address' =>'required|string'
        ]);

        Student::insert([
            'name'=>$request->name,
            'age'=>$request->age,
            'address'=>$request->address,
        ]);

        return response('Student Data Inserted Success');
    }
}
