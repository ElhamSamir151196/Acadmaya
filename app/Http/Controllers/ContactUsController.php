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
use App\ContactUs;
use App\Admin_ContactUs;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ContactUs = ContactUs::orderBy('id','desc')->paginate(20);

        return view('Admin/ContactUs/ShowAll' , compact('ContactUs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required',            
        ]);
        $new_ContactUs= new ContactUs;
        $new_ContactUs->name=$request->name;
        $new_ContactUs->email=$request->email;
        $new_ContactUs->message=$request->message;
        $new_ContactUs->save();

        
        session()->flash('success' ,'Contact Message send Successfully');    
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
        $target_Contact = ContactUs::find($id);
        $readed= Admin_ContactUs::select('contactUs_id')->where('admin_id',auth()->user()->id)->get();
        $is_exist=false;
        foreach($readed as $Contact) {
                if($id== $Contact->contactUs_id){
                    $is_exist=true;
                    break;
                }
        
        }
        if(!$is_exist){
            $new_Admin_ContactUs= new Admin_ContactUs;
            $new_Admin_ContactUs->contactUs_id=$id;
            $new_Admin_ContactUs->admin_id=auth()->user()->id;
            $new_Admin_ContactUs->is_seen=true;
            $new_Admin_ContactUs->save();
        }

        return view('Admin/ContactUs/Show' , compact('target_Contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target_Contact = ContactUs::find($id);
        Admin_ContactUs::where('admin_id',$id)->delete();
        $target_Contact->delete();
       
        session()->flash('danger', 'Contact Message deleted successfully');
        return redirect()->back();
    }

    /******************************************************************************* */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_unreaded()
    {
        //
        $ContactUs = ContactUs::orderBy('id','desc')->get();

        $readed= Admin_ContactUs::select('contactUs_id')->where('admin_id',auth()->user()->id)->get();

        $readedContact = array();
            foreach($readed as $Contact) {
                $readedContact[]= $Contact->contactUs_id;
            }
       
        $unreadedContact = array();
            foreach($ContactUs as $Contact) {
                $is_exist=in_array($Contact->id, $readedContact);
                    if($is_exist){
                        continue;
                    }else{
                        $unreadedContact[]= $Contact;
                    }
            
            }

            $ContactUs=$unreadedContact;
            //dd(sizeOf($ContactUs));
        return view('Admin/ContactUs/ShowAll_unreaded' , compact('ContactUs'));
    }

}
