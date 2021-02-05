<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentManage;
use App\Models\Course;
use App\Models\Branch;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use DB;

class StudentManageController extends Controller
{
    // Dependent branch selector by ajax
    public function GetbranchAgainstCourseEdit($id){
        echo json_encode(DB::table('branches')->where('corId', $id)->get());// Dependent branch selector by ajax
    }
    // Dependent branch selector by ajax

	public function create()
	{
		$courses = Course::all();
		$branches = Branch::all();
		return view('registrassion', compact(['courses', 'branches']));
	}

	

	public function delreg($id)
	{
		$student = StudentManage::find($id);
		$student->delete();
		return redirect()->route('dashboard');
	}

	public function editreg($id)
	{
		$students = StudentManage::select('*')
						->where('id','=',$id)
						// ->join('courses','student_manages.corId','courses.corId')
						// ->join('branches','student_manages.brId','branches.brId')
						->get();

		return view('editStudentDetails', compact('students'));
	}


    public function show()
	{
		// $students = StudentManage::all();
		// return view('studentDetails')->with('students', $students);

		$students = StudentManage::select('*')
						->join('courses','student_manages.corId','courses.corId')
						->join('branches','student_manages.brId','branches.brId')
						->get();

		return view('studentDetails', compact('students'));
	}

	public function storeStd(Request $request)
	{
		$validated = $request->validate([
        	'sName' => 'required|max:30|string',
			'fName' => 'required|max:30|string',
			'corId' => 'required',
			'brId' => 'required',
			'phone' => 'required',
			'email' => 'required|max:30|string|unique:student_manages,email,',
			'dob' => 'required|max:30|string',
			'gender' => 'required',
    ]);

		$student = new StudentManage;

		$student->studentName = $request->sName;
		$student->fathertName = $request->fName;
		$student->corId = $request->corId;
		$student->brId = $request->brId;
		$student->phoneNumber = $request->phone;
		$student->email = $request->email;
		$student->gender = $request->gender;
		$student->dateofb = $request->dob;

		if ($request->hasfile('exampleInputFile')) {
		
			// $path = $request->file('exampleInputFile')->store('images');
			// $student->profile_photo_path = $path;
			$student->profile_photo_path = $request->exampleInputFile->store('public/images');
		}

		$student->save();

		return redirect()->route('sDetails');

	}

	public function uppStd(Request $request)
	{
		$validated = $request->validate([
        	'sName' => 'required|max:30|string',
			'fName' => 'required|max:30|string',
			'corId' => 'required',
			'brId' => 'required',
			'phone' => 'required',
			'email' => 'unique:email|required|max:30|string',
			'dob' => 'required|max:30|string',
			'gender' => 'required',
    ]);

		StudentManage::where('id',$request->sId)->update(['studentName'=>$request->sName, 'fathertName'=>$request->fName, 'corId'=>$request->corId, 'brId'=>$request->brId, 'phoneNumber'=>$request->phone, 'email'=>$request->email, 'gender'=>$request->gender, 'dateofb'=>$request->dob]);

		return redirect()->route('sDetails');

	}
}
