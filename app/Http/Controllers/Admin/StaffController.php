<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Account;
use App\Models\Telecaller;
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
            'aadharno' => 'required',
            'pancard' => 'required',
            'pfno' => 'required',
            'experience' => 'required',
        ]);

        $user = User::create($input);

        $dateTime = Carbon::parse($request->joined_date);
        $date =  $dateTime->format('Y-m-d');
        
        if($user){
            $user_id = $user->id;
            $roleModel = null;
            switch ($request->role){
                case "account":
                    $roleModel = Account::create([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->vpassword,
                    'joined_date' => $date,
                    'aadharno' => $request->aadharno,
                    'pancard' => $request->pancard,
                    'pfno' => $request->pfno,
                    'experience' => $request->experience,

                ]);
                
                break;

                case "siteengineer":

                    $roleModel = Siteengineer::create([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->vpassword,
                    'joined_date' => $date,
                    'aadharno' => $request->aadharno,
                    'pancard' => $request->pancard,
                    'pfno' => $request->pfno,
                    'experience' => $request->experience,
                ]);
                
                break;

                case "telecaller":
                    $roleModel = Telecaller::create([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->vpassword,
                    'joined_date' => $date,
                    'aadharno' => $request->aadharno,
                    'pancard' => $request->pancard,
                    'pfno' => $request->pfno,
                    'experience' => $request->experience,
                ]);
                
                break;

                case "chiefengineer":
                    $roleModel = Chiefengineer::create([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->vpassword,
                    'joined_date' => $date,
                    'aadharno' => $request->aadharno,
                    'pancard' => $request->pancard,
                    'pfno' => $request->pfno,
                    'experience' => $request->experience,
                ]);

                
                break;

                case "salesmanager":
                    $roleModel = Salesmanager::create([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->vpassword,
                    'joined_date' => $date,
                    'aadharno' => $request->aadharno,
                    'pancard' => $request->pancard,
                    'pfno' => $request->pfno,
                    'experience' => $request->experience,
                ]);
                
                break;

                case "salesperson":
                    $roleModel = Salesperson::create([
                    'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->vpassword,
                    'joined_date' => $date,
                    'aadharno' => $request->aadharno,
                    'pancard' => $request->pancard,
                    'pfno' => $request->pfno,
                    'experience' => $request->experience,
                ]);
                

                default:
                return back();
            }
            
            $roleFolder = 'images/' . $user->role;

            if ($request->hasFile('attachment')) {
                $attachment = $request->file('attachment');
                
                $path = $roleFolder.'/aadhar';
                $attachmentPath = uploadImage($attachment,$path);
                $roleModel->attachment = $attachmentPath;
            }

            if ($request->hasFile('attachment1')) {
                $attachment1 = $request->file('attachment1');
                $path1 = $roleFolder.'/pan';
                $attachment1Path = uploadImage($attachment1,$path1);
                $roleModel->attachment1 = $attachment1Path;
            }

            if ($request->hasFile('attachment2')) {
                $attachment2 = $request->file('attachment2');
                // $attachment2Path = $attachment2->store($roleFolder . '/others', 'public');
                $path2 = $roleFolder.'/others';
                $attachment2Path = uploadImage($attachment2,$path2);

                $roleModel->attachment2 = $attachment2Path;
            }

            $roleModel->save();

            $role = ucfirst($user->role);
            flashSuccess($role.'Sales Person Created Successfully');
            return redirect()->route('admin.staff');
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
                'role' => $request->role,
            ]);


        $dateTime = Carbon::parse($request->joined_date);
        $date =  $dateTime->format('Y-m-d');
        
        if($user){
            $user_id = $id;
            switch ($request->role) {
                case "account":
                    $roleModel = Account::where('user_id', $user_id);
                    break;

                case "siteengineer":
                    $roleModel = Siteengineer::where('user_id', $user_id);
                    break;

                case "telecaller":
                    $roleModel = Telecaller::where('user_id', $user_id);
                    break;

                case "chiefengineer":
                    $roleModel = Chiefengineer::where('user_id', $user_id);
                    break;

                case "salesmanager":
                    $roleModel = Salesmanager::where('user_id', $user_id);
                    break;

                case "salesperson":
                    $roleModel = Salesperson::where('user_id', $user_id);
                    break;
            }
            
            if ($roleModel) {

                    $roleModel->update([
                        'user_id' => $user_id,
                    'user_code' => $request->user_code,
                    'phone' => $request->phone,
                    'alternate_no' => $request->alternate_no,
                    'location' => $request->location,
                    'salary' => $request->salary,
                    'vpassword' => $request->password,
                    'joined_date' => $date,
                    'aadharno' => $request->aadharno,
                    'pancard' => $request->pancard,
                    'pfno' => $request->pfno,
                    'experience' => $request->experience,
                    ]);

            $roleFolder = 'images/' . $request->role;

            if ($request->hasFile('attachment')) {
                $attachment = $request->file('attachment');
                
                $path = $roleFolder.'/aadhar';
                $attachmentPath = uploadImage($attachment,$path);
                $roleModel->update(['attachment' =>$attachmentPath]);
            }

            if ($request->hasFile('attachment1')) {
                $attachment1 = $request->file('attachment1');
                $path1 = $roleFolder.'/pan';
                $attachment1Path = uploadImage($attachment1,$path1);
                
                $roleModel->update(['attachment1' =>$attachment1Path]);
            }

            if ($request->hasFile('attachment2')) {
                $attachment2 = $request->file('attachment2');
                // $attachment2Path = $attachment2->store($roleFolder . '/others', 'public');
                $path2 = $roleFolder.'/others';
                $attachment2Path = uploadImage($attachment2,$path2);
                $roleModel->update(['attachment2' =>$attachment2Path]);
            }
        }
            

            $rolev = ucfirst($request->role);
            flashSuccess($rolev.' Updated Successfully');
            return redirect()->route('admin.staff');
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
