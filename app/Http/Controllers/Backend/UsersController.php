<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modals\User;

use Illuminate\Support\Facades\Session;
use Config;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(Request $request)
    { 
        if($request->search_key){
            $query = $request->search_key;
            $user_query = User::where('name','like','%'.$query.'%')
                                ->orWhere('email','like','%'.$query.'%')
                                ->orWhere('address','like','%'.$query.'%')
                                ->orWhere('phone_number','like','%'.$query.'%')
                                ->orWhere('class','like','%'.$query.'%')
                                ->orWhere('education_year','like','%'.$query.'%');
            
            $users = $user_query->orderBy('created_at', 'DESC')->get();                 
            return view('backend.users.list',compact('users'));
        }else{
            $users = User::orderBy('created_at', 'DESC')->get(); 
            return view('backend.users.list',compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
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
            'name' => 'required|max:100',
            'email' => 'required|max:100|unique:users,email',
            'phone_number' => 'required|max:11|min:11',
            'address' => 'required',
            'class' => 'required',
            'education_year' => 'required|max:4|min:4',
            'image' => 'nullable| mimes:jpeg,jpg,png',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
      
        $user->class = $request->class;
        $user->education_year = $request->education_year;
        $user->gender = $request->gender;

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destination_path = public_path('backend/uploads/profile_images/'.$user->id);
            $image->move($destination_path, $name);
            $user->image = $name;
        }
        $user->save();

        session()->flash('success','User has been created!');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.users.profile',compact('user'));
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
        return view('backend.users.edit',compact('user'));
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
            'name' => 'required|max:100',
            'email' => 'required|max:100|unique:users,email,'.$id,
            'phone_number' => 'required|max:11|min:11',
            'address' => 'required',
            'class' => 'required',
            'education_year' => 'required|max:4|min:4',
            'image' => 'nullable| mimes:jpeg,jpg,png',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
      
        $user->class = $request->class;
        $user->education_year = $request->education_year;
        $user->gender = $request->gender;

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destination_path = public_path('backend/uploads/profile_images/');
            $image->move($destination_path, $name);
            $user->image = $name;
        }
        $user->save();

        session()->flash('success','User has been updated!');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(!is_null($user)){
            $user->delete();
        }
        session()->flash('success','User has been deleted!');
        return 'deleted';
    }

}
