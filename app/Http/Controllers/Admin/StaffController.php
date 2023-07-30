<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Account;
use App\Models\Engineer;
use App\Models\Siteengineer;
use App\Models\Chiefengineer;
use App\Models\Salesmanager;
use App\Models\Salesperson;


class StaffController extends Controller
{
    public function index()
    {
        $users = User::with('siteengineer:id,user_id,user_code,phone,joined_date', 'account:id,user_id,user_code,phone,joined_date', 'telecaller:id,user_id,user_code,phone,joined_date', 'salesperson:id,user_id,user_code,phone,joined_date', 'salesmanager:id,user_id,user_code,phone,joined_date', 'chiefengineer:id,user_id,user_code,phone,joined_date')->orderBy('id', 'DESC')->get();
        return view('admin.staff.index',compact('users'));
    }


    public function create()
    {
        return view('admin.staff.create');
    }


    public function store(Request $request){

        // dd($request);
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' =>  'required|min:6',
            'vpassword' =>  'same:password|min:6|required',
            'role' =>  'required',
            'user_code' => 'required',
            'joined_date' => 'required',
            'phone' => 'required',
            'alternate_no' => 'required',
            'location' => 'required',
            'salary' => 'required',
        ]);

        $user = User::create($input);

        $dateTime = Carbon::parse($request->joined_date);
        $date =  $dateTime->format('Y-m-d');
        
        if($user){
            $user_id = $user->id;
            
            switch ($request->role){
                case "account":
                    Account::create([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->vpassword,
                    'joined_date' => $date

                ]);
                flashSuccess('Account Created Successfully');
                return redirect()->route('admin.staff');

                case "siteengineer":

                    Siteengineer::create([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->vpassword,
                    'joined_date' => $date
                ]);
                flashSuccess('Site Engineer Created Successfully');
                return redirect()->route('admin.staff');

                case "telecaller":
                    Telecaller::create([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->vpassword,
                    'joined_date' => $date
                ]);
                flashSuccess('Telecaller Created Successfully');
                return redirect()->route('admin.staff');

                case "chiefengineer":
                    Chiefengineer::create([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->vpassword,
                    'joined_date' => $date
                ]);

                flashSuccess('Chief Engineer Created Successfully');
                return redirect()->route('admin.staff');

                case "salesmanager":
                    Salesmanager::create([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->vpassword,
                    'joined_date' => $date
                ]);
                flashSuccess('Sales Manager Created Successfully');
                return redirect()->route('admin.staff');

                case "salesperson":
                    Salesperson::create([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->vpassword,
                    'joined_date' => $date
                ]);
                flashSuccess('Sales Person Created Successfully');
                return redirect()->route('admin.staff');

                default:
                return back();
            }
            
        }
        else
        {
            flashError('Something wrong');
            return back();
        }

    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.staff.show',compact('user'));
    }

    public function edit($id)
    {

        $user = User::find($id);
        return view('admin.staff.edit',compact('user'));
    }

    public function update(Request $request ,$id)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' =>  'required|min:6',
            'role' =>  'required',
            'user_code' => 'required',
            'joined_date' => 'required',
            'phone' => 'required',
            'alternate_no' => 'required',
            'location' => 'required',
            'salary' => 'required',
        ]);

        $user = User::where('id', $id)
            ->update([
                
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);


        $dateTime = Carbon::parse($request->joined_date);
        $date =  $dateTime->format('Y-m-d');
        
        if($user){
            $user_id = $id;
            
            switch ($request->role){
                case "account":
                    Account::where('user_id', $user_id)
            ->update([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->password,
                    'joined_date' => $date

                ]);
                flashSuccess('Account Updated Successfully');
                return redirect()->route('admin.staff');

                case "siteengineer":

                    Siteengineer::where('user_id', $user_id)
            ->update([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->password,
                    'joined_date' => $date
                ]);
                flashSuccess('Site Engineer Updated Successfully');
                return redirect()->route('admin.staff');

                case "telecaller":
                    Telecaller::where('user_id', $user_id)
            ->update([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->password,
                    'joined_date' => $date
                ]);
                flashSuccess('Telecaller Updated Successfully');
                return redirect()->route('admin.staff');

                case "chiefengineer":
                    Chiefengineer::where('user_id', $user_id)
            ->update([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->password,
                    'joined_date' => $date
                ]);
                flashSuccess('Chief Engineer Updated Successfully');
                return redirect()->route('admin.staff');

                case "salesmanager":
                    Salesmanager::where('user_id', $user_id)
            ->update([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->password,
                    'joined_date' => $date
                ]);
                flashSuccess('Sales Manager Updated Successfully');
                return redirect()->route('admin.staff');

                case "salesperson":
                    Salesperson::where('user_id', $user_id)
            ->update([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->password,
                    'joined_date' => $date
                ]);
                flashSuccess('Sales Person Updated Successfully');
                return redirect()->route('admin.staff');

                default:
                return back();
            }
            
        }
        else
        {
            flashError('Something wrong');
            return back();
        }
    }

    public function destroy($id)
    {
        //
        User::find($id)
            ->delete();

        flashSuccess('User Removed Successfully');
        return redirect()->route('admin.staff');
    }
}
