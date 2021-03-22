<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('employer');
    }
    public function index($id, Company $company){
        return view ('company.index', compact('company'));
    }
    public function create(){

        return view('company.create');
    }

    public function store(Request $request){
        $this-> validate($request,[
            'address'=> 'required|max:250',
            'website'=> 'required',
            'phone'=> 'required|numeric',
            'slogan'=> 'required|min:10|max:100',
            'description'=> 'required|min:20|max:250'
        ]);
        $user_id=auth()->user()->id;
        Company::where('user_id', $user_id)->update([
            'address'=>request('address'),
            'website'=>request('website'),
            'phone'=>request('phone'),
            'slogan'=>request('slogan'),
            'description'=>request('description'),
        ]);

        return redirect()->back()->with('message', 'Company Details Updated Successfully');
    }
    public function coverphoto(Request $request){
        $this->validate($request,[
            'cover_photo'=>'required|mimes:jpg,jpeg,png|max:1024'
        ]);
        $user_id=auth()->user()->id;
        if($request->hasFile('cover_photo')){
            $file=$request->file('cover_photo');
            $text= $file->getClientOriginalExtension();
            $fileName=time().'.'.$text;
            $file->move('uploads/cover',$fileName);
            Company::where('user_id',$user_id)->update([
                'cover_photo'=>$fileName
            ]);
            return redirect()->back()->with('message', 'Company Cover Photo Uploaded Successfully');

        }

    }
    public function logo(Request $request){
        $this->validate($request,[
            'logo'=>'required|mimes:jpg,jpeg,png|max:1024'
        ]);
        $user_id=auth()->user()->id;
        if($request->hasFile('logo')){
            $file=$request->file('logo');
            $text= $file->getClientOriginalExtension();
            $fileName=time().'.'.$text;
            $file->move('uploads/avatar',$fileName);
            Company::where('user_id',$user_id)->update([
                'logo'=>$fileName
            ]);
            return redirect()->back()->with('message', 'Company Logo Uploaded Successfully');

        }

    }

}
