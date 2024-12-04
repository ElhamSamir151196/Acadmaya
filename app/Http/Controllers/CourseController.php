<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Webpatser\Uuid\Uuid;
use App\Course;
use App\User;
use App\Session;
use App\Student_cours;
use App\Teacher_Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Courses = Course::orderBy('id','desc')->paginate(20);

        return view('Admin/Course/ShowAll' , compact('Courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin/Course/Create');
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
            'name' => 'required|max:255',
            'description' => 'required',            
        ]);
      $new_Course= new Course;
      $new_Course->name=$request->name;
      $new_Course->description=$request->description;
      $new_Course->created_by=auth()->user()->id;

      

        $new_Course->save();

        
        session()->flash('success' ,'Course Created Successfully');    
       return redirect()->back();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $target_Course = Course::find($id);
         return view('Admin/Course/Show' , compact('target_Course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Course = Course::find($id);
        return view('Admin/Course/Update' , compact('Course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new_Course = Course::find($id);
        
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            
        ]);
        
        $new_Course->name=$request->name;
        $new_Course->description=$request->description;

        
        

        $new_Course->update();
      
        
        session()->flash('warning', 'your Course was updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target_Course = Course::find($id);
        $target_Course->delete();

        session()->flash('danger', 'User  "' . $target_Course->name . '" deleted successfully');
        return redirect()->back();
    }

    /************************Assign courses to user *************** */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function assign_Course_teacher()
    {
     
        $Teachers=User::where('category', "Teacher")->get();
        $Courses=Course::all();
        return view('Admin/Assign/AssignTeacher', compact('Teachers', 'Courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storen_Course_teacher(Request $request)
    {
      $new_Course= new Teacher_Course;
      $new_Course->teacher_id=$request->userOption;
      $new_Course->course_id=$request->courseOption;
      $new_Course->still_teach=true;
      $new_Course->created_by=auth()->user()->id;
      $new_Course->save();

        
        session()->flash('success' ,'Course Created Successfully');    
       return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function assign_Course_student()
    {
     
        $Students=User::where('category', "Student")->get();
        $Courses=Course::all();
        return view('Admin/Assign/AssignStudent', compact('Students', 'Courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_Course_student(Request $request)
    {
      $new_Course= new Student_cours;
      $new_Course->student_id=$request->userOption;
      $new_Course->course_id=$request->courseOption;
      $new_Course->created_by=auth()->user()->id;

      

        $new_Course->save();

        
        session()->flash('success' ,'Course Created Successfully');    
       return redirect()->back();
    }

    /******************* Show Assigned courses with actions******** */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_Course_teacher()
    {
        //
        $Courses = Teacher_Course::orderBy('id','desc')->paginate(20);

        return view('Admin/Assign/ShowAllCourse_teacher' , compact('Courses'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_Course_student()
    {
        //
        $Courses = Student_cours::orderBy('id','desc')->paginate(20);

        return view('Admin/Assign/ShowAllCourse_student' , compact('Courses'));
    }

    
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Course_Assigned_teacher_edit( $id)
    {
        $Update_Course = Teacher_Course::find($id);
        
        $Update_Course->still_teach=!$Update_Course->still_teach;
        $Update_Course->update();
      
        
        session()->flash('warning', 'Course Assigned was updated!');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function student_course_delete($id)
    {
        $target_Course = Student_cours::find($id);
        $target_Course->delete();

        session()->flash('danger', 'Student Assigned deleted successfully');
        return redirect()->back();
    }

    /******************* Show Assigned courses inside course ******** */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Course_teacher_show($id)
    {
        $Teachers = Teacher_Course::where('course_id',$id)->paginate(20);
        $Course_id= $id;
        return view('Admin/Course/ShowCourseTeacher' , compact('Teachers' , 'Course_id'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Course_student_show($id)
    {
        //
        $Students = Student_cours::where('course_id',$id)->paginate(20);
        $Course_id= $id;
        return view('Admin/Course/ShowCourseStudents' , compact('Students' , 'Course_id'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Course_session_showAll($id)
    {
        //
        $Sessions = Session::where('course_id',$id)->paginate(20);
        $Course_id= $id;
        return view('Admin/Course/Sesssion/ShowAllCourseSession' , compact('Sessions' ,'Course_id'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Course_session_show($id)
    {
        $target_Session = Session::find($id);
        return view('Admin/Course/Sesssion/ShowCourseSession' , compact('target_Session'));
    }

}
