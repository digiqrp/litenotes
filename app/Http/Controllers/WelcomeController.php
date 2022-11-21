<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index(){

        $data = [];

        //$users = DB::select('select * from users where active = ?',[1]);;
        //$users = DB::table('users')->select('name','email')->whereNotNull('email')->get();
        //$users = Student::select('name','email')->whereNotNull('email')->get();
        //dd($users);
        //foreach ($users as $student){
        //    echo $student->name.'</br>';
        //}

        $student = new Student();
        $student->name = 'Mark Gregory 001';
        $student->email = 'mark.gregory001@gmx.com';
        $student->save();

        return view('welcome',['users' => $data]);
    }
}
