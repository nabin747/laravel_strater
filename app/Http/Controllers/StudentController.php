<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function index()
    {
        $student = Student::where('delete_flag', false)->get();
        return response()->json([
            'status' => 1,
            'data' => $student
        ]);

    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $student = new Student();
            $student->fname = $request->fname;
            $student->lname = $request->lname;
            $student->username = $request->username;
            $student->password = $request->password;
            $student->address = $request->address;
            $student->phone = $request->phone;
            $student->city = $request->city;
            $student->street = $request->street;
            $student->save();
            DB::commit();

            return response()->json([
                'status' => 1,
                'message' => 'student added'
            ]);
        }catch (\Exception $e){
            DB::rollBack();
            throw $e;
        }


    }


    public function show(Request $request, $student)
    {
        try {
            $data = Student::where('id', $student)->first();
            if (!$data) {
                return response()->json([
                ], 204);
            }
            return response()->json([
                $data
            ], 200);
        } catch (\Exception $e) {
            throw $e;
        }

    }

    public function update(Request $request, Student $student)
    {
        $student->fname = $request->fname;
        $student->lname = $request->lname;
        $student->username = $request->username;
        $student->password = $request->password;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->city = $request->city;
        $student->street = $request->street;
        $student->save();

        return response()->json([
            'status' => 1,
            'data' => $student,
            "message" => "edit id "
        ]);
    }

    public function destroy(Student $student)
    {

       $student->delete_flag = true;
        $student->save();
        return response()->json([
            "message" => "Student deleted"
        ],200);

    }
    public function search(Request $request)
    {
       $student = Student::where('delete_flag', false);
       if($request->get("name")){
        // $student = $student->where('fname', $request->get('name'));
       $student= Student::where('fname', 'like', '%'.$request->get('name').'%')->except('delete_flag')->get();
       }

    //    $student = $student->get();

        return response()->json([
            "data"=> $student,
            "message" => "Student deleted"
        ],200);

    }

    public function getpost(Student $student)
    {
        $data = $student->posts()->get();

        return response()->json([
            "data"=> $data,
            "message" => "Student deleted"
        ],200);

    }
}
