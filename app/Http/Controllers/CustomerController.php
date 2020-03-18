<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Identity;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        return view('customer.register', compact('banks'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
            'name' => 'required|max:255',
            'identity_date' => 'required|max:255',
            'area' => 'required',
            'birthday' => 'required',
            'bank' => 'required',
            'master_name' => 'required',
            'identity_number' => 'required',
            'identity_address' => 'required',
            'address' => 'required|max:255',
            'phone' => 'required',
            'bank_number' => 'required',
            'brand_name' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif',
            'image_before' => 'mimes:jpeg,jpg,png,gif',
            'image_after' => 'mimes:jpeg,jpg,png,gif',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('customer.register')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->user_type = 1;
            $user->parent_id = Auth::user()->id;
            $user->bank_id = $request->bank;
            $user->area_id = $request->area;
            $user->birthday = $request->birthday;
            dd($request->birthday);
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->bank_number = $request->bank_number;
            $user->master_name = $request->master_name;
            $user->brands_name = $request->brand_name;

            if ($request->hasFile('image')) {
                $user->image = $request->file('image')->store('upload', 'public');
            }

            if ($user->save())
            {
                dd($user->id);
                $identity = new Identity();
                $identity->user_id = $user->id;
                $identity->number = $request->identity_number;
                $identity->date = $request->identity_date;
                $identity->address = $request->identity_address;

                if ($request->hasFile('image_before')) {
                    $identity->image_before = $request->file('image_before')->store('upload', 'public');
                }
                if ($request->hasFile('image_after')) {
                    $identity->image_after = $request->file('image_after')->store('upload', 'public');
                }
            }
        }

    }
}
