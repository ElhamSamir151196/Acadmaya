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
use App\Session_Attach;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->CoursesOption;
        $Sessions = Session::where('course_id',$id)->orderBy('id','desc')->paginate(20);

        return view('Teacher/Session/ShowAll' , compact('Sessions' , 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        return view('Teacher/Session/Create' , compact('id'));
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
            'title' => 'required|max:255',
            'description' => 'required',            
        ]);

        $new_Session= new Session;
        $new_Session->title=$request->title;
        $new_Session->description=$request->description;
        $new_Session->created_by=auth()->user()->id;
        $new_Session->course_id =$request->course_id;

        $new_Session->save();
        $ID=$new_Session->id;

        if($request->cover != null){
            for ($i = 0; $i < sizeof($request->cover); $i++){
                
                if($request->cover[$i]!=null){

                    $new_SessionAttach= new Session_Attach;
                    $new_SessionAttach->session_id=$ID;

                    $book = $request->all();
                    $book['uuid'] = (string)Uuid::generate();

                    //dd($request->cover[$i]->getClientOriginalName());
                    $book['cover-1'] = $request->cover[$i]->getClientOriginalName();
                    $request->cover[$i]->storeAs('Attachs', $book['cover-1']);
                    $new_SessionAttach->cover=$book['cover-1'];
                    $new_SessionAttach->uuid= $book['uuid'];

                    
                    $new_SessionAttach->save();
                }   

            } 
        }
       
        

        
        session()->flash('success' ,'Session Created Successfully');    
       return redirect()->back();
    }

    public function download($uuid )
    {
        $book = Session_Attach::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/Attachs/' . $book->cover);
        
        return response()->download($pathToFile);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $target_Session = Session::find($id);
        //$Session_attaches = Session_Attach::where('course_id',$id)->orderBy('id','desc')->paginate(20);
        return view('Teacher/Session/Show' , compact('target_Session'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Session = Session::find($id);
        return view('Teacher/Session/Update' , compact('Session'));
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
        //dd($request->title , $request->description, $request->cover, $request->cover1);
        $new_Session = Session::find($id);
        
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            
        ]);
        
        $new_Session->title=$request->title;
        $new_Session->description=$request->description;

        $session_old_attach=  Session_Attach::where('session_id',$id)->get();

       

        if(sizeof($session_old_attach)>0){
            if($request->cover1 != null){
                for ($i = 0; $i < sizeof($session_old_attach); $i++){
                   $is_old=in_array($session_old_attach[$i]->uuid, $request->cover1);
                    if($is_old){
                         continue;
                    }else{
                    Session_Attach::where('uuid',$session_old_attach[$i]->uuid)->delete();    
                    }   
                } 
            }else{
                    Session_Attach::where('session_id',$id)->delete();    
            }

        }
        if($request->cover != null){
            for ($i = 0; $i < sizeof($request->cover); $i++){
                
                if($request->cover[$i]!=null){

                    $new_SessionAttach= new Session_Attach;
                    $new_SessionAttach->session_id=$id;

                    $book = $request->all();
                    $book['uuid'] = (string)Uuid::generate();

                    //dd($request->cover[$i]->getClientOriginalName());
                    $book['cover-1'] = $request->cover[$i]->getClientOriginalName();
                    $request->cover[$i]->storeAs('Attachs', $book['cover-1']);
                    $new_SessionAttach->cover=$book['cover-1'];
                    $new_SessionAttach->uuid= $book['uuid'];
                    
                    $new_SessionAttach->save();
                }   
            } 
        }

       

        $new_Session->update();
      
        
        session()->flash('warning', 'your Session was updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        
        $target_Session = Session::find($id);
        Session_Attach::where('session_id',$id)->delete();
        $id = $target_Session->course_id;
        $target_Session->delete();
       
        $Sessions = Session::where('course_id',$id)->orderBy('id','desc')->paginate(20);
        session()->flash('danger', 'Session  "' . $target_Session->title . '" deleted successfully');
        return view('Teacher/Session/ShowAll' , compact('Sessions' , 'id'));
        //return redirect()->back();
    }

    /******************** Student ******************* */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_Student(Request $request)
    {
        
        $id = $request->CoursesOption;
        $Sessions = Session::where('course_id',$id)->orderBy('id','desc')->paginate(20);

        return view('Student/Session/ShowAll' , compact('Sessions' , 'id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_Student($id)
    {
        $target_Session = Session::find($id);
        return view('Student/Session/Show' , compact('target_Session'));
    }

    /******************** Admin ******************* */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_Admin(Request $request)
    {
        
        $Sessions = Session::orderBy('id','desc')->paginate(20);

        return view('Admin/Session/ShowAll' , compact('Sessions' ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_Admin($id)
    {
        $target_Session = Session::find($id);
        return view('Admin/Session/Show' , compact('target_Session'));
    }

    
}
