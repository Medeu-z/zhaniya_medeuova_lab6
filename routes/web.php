<?php

use Illuminate\Support\Facades\Route;
use App\Models\student;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/insert', function () {
    DB::insert('insert into student(name, BDay, GPA, advisor) 
    	         values("Zhaniya", "2001-11-23", 3.1, "Aruzhan")');
});
Route::get('/select', function () {
    $results = DB::select('select * from student where id = 2');
    foreach ($results as $stu) {
    	echo $stu->name." - ".$stu->BDay." : ".$stu->GPA;

    	echo "<br>Advisor : ".$stu->advisor;
    	
    }
});

Route::get('/update', function () {
    DB::update('update student set advisor="Arman" where id = 1');
});
Route::get('/delete', function () {
    DB::delete('delete from student where id = 1');
});


Route::get('/select1', function () {
	$stu=student::find(2);
   
    	echo $stu->name." - ".$stu->BDay." : ".$stu->GPA;
    	echo "<br>Advisor : ".$stu->advisor;
    	
    
});

Route::get('/insert1', function () {
    $student = new student;
    $student->name = 'Rimma';
    $student->BDay = '2001-07-02';
    $student->GPA = '3.5';
    $student->advisor = 'Aruzhan';
    $student->save();
});

Route::get('/update1', function () {
    $student = student::find(1);
    $student->GPA = '3.5';
    $student->save();
});
Route::get('/delete1', function () {
    $student = student::find(2);
    $student->delete();
});