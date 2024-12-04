<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Course;
use App\User;
use App\Session;
use App\Student_cours;
use App\Teacher_Course;

use App\Mail\WelcomeMail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * login user to required page.
     *
     * @return \Illuminate\Http\Response
     */
    public function Login_system()
    {
        //
         if(auth()->user()->category=="Admin"){

            $Users = User::orderBy('id','desc')->paginate(20);
            return view('Admin/User/ShowAll' , compact('Users') );
        }else if(auth()->user()->category=="Teacher"){
            
            $Courses = Teacher_Course::where('teacher_id', auth()->user()->id)->Paginate(20);
            return view('Teacher/HomeTeacher', compact('Courses') );
        }
        else {//in case user is Student
            
            $Courses = Student_cours::where('student_id', auth()->user()->id)->Paginate(20);
            return view('Student/StudentCourses', compact('Courses') );
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = User::orderBy('id','desc')->paginate(20);

        return view('Admin/User/ShowAll' , compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/User/Create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //dd($request->phone);
        $fields  = $request->get('Category');
       
        $category = "Student";
        if($fields =='flexRadioDefault1'){
            $category = "Admin";

        }else  if($fields =='flexRadioDefault2'){
            $category = "Teacher";

        }
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required','regex:/(01)[0-9]{9}/','min:11'],
        ]);

        $new_user= new User;
        $new_user->name=$request->name;
        $new_user->email=$request->email;
        $new_user->phone=$request->phone;
        $new_user->category=$category;
        $new_user->is_enable=true;
        $new_user->password= Hash::make($request->password) ;
        $new_user->save();
        Mail::to($request->email)->send(new WelcomeMail($request->name , $request->password, $category));
        session()->flash('success' ,'User Created Successfully');
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
        $user= User::find($id);

        return view('Admin/User/Show' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('Admin/User/Update' , compact('user'));
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
        $request->validate([
            'name' =>['required', 'string', 'max:255'],        
            'phone' => ['required','regex:/(01)[0-9]{9}/','min:11'],
            
        ]);
        $data = $request->all();
        $target_user = User::find($id);
       
        if($request->email !=$target_user->email){
           
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'] , 
            ]);
    
        }

         
        $target_user->update($data);
        session()->flash('success' ,'User Updated Successfully');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_password($id)
    {
        $user= User::find($id);
        return view('Admin/User/EditUserPassword' , compact('user'));
       
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_password(Request $request, $id)
    {
        //
            
        $request->validate([
            'password'         =>  ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required||min:8|same:password'
            
        ]);
       
        $PASSWORD =$request->password;
        $request->password= Hash::make($request->password) ;
        $pass = array("password"=>$request->password);    
        $target_user = User::find($id);
        $target_user->update($pass);
        Mail::to($target_user->email)->send(new ResetPasswordMail($PASSWORD , $target_user->name ));

        session()->flash('success' ,'User Password Updated Successfully');
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
        $target_user = User::find($id);
        $target_user->delete();

        session()->flash('danger', 'User  "' . $target_user->name . '" deleted successfully');
        return redirect()->back();
    }

    /***************************** Profile ************************ */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_profile($id)
    {
        $user= User::find($id);

        return view('Profile/Show' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_profile($id)
    {
        $user = User::find($id);
        return view('Profile/Update' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_profile(Request $request, $id)
    {
        $request->validate([
            'name' =>['required', 'string', 'max:255'],        
            'phone' => ['required','regex:/(01)[0-9]{9}/','min:11'],
            
        ]);
        $data = $request->all();
        $target_user = User::find($id);
       
        if($request->email !=$target_user->email){
           
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'] , 
            ]);
    
        }

         
        $target_user->update($data);
        session()->flash('success' ,'User Updated Successfully');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_password_profile($id)
    {
        $user= User::find($id);
        return view('Profile/EditUserPassword' , compact('user'));
       
    }

    
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_password_profile(Request $request, $id)
    {
        //
            
        $request->validate([
            'password'         =>  ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required||min:8|same:password'
            
        ]);
       
        $PASSWORD =$request->password;
        $request->password= Hash::make($request->password) ;
        $pass = array("password"=>$request->password);    
        $target_user = User::find($id);
        $target_user->update($pass);

        Mail::to($target_user->email)->send(new ResetPasswordMail($PASSWORD , $target_user->name ));

        session()->flash('success' ,'User Password Updated Successfully');
        return redirect()->back();

    }


    public function ShowAll_Course_User($id)
    {
        $user= User::find($id);
        if($user->category=="Teacher"){
            
            $Courses = Teacher_Course::where('teacher_id', $id)->Paginate(20);
        
        }
        else {//in case user is Student
            
            $Courses = Student_cours::where('student_id', $id)->Paginate(20);
        }


        return view('Admin/User/ShowCourses' , compact('Courses' ,'id'));
    }
}
