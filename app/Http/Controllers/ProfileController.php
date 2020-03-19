<?php

namespace App\Http\Controllers;

use App\Area;
use App\Bank;
use App\Identity;
use App\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)
            ->with([
                'area', 'bank', 'identity'
            ])->first();
        $banks = Bank::all();
        return view('customer.profile', compact('user', 'banks'));
    }

    public function update(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'image' => 'mimes:jpeg,jpg,png,gif',
            'image_before' => 'mimes:jpeg,jpg,png,gif',
            'image_after' => 'mimes:jpeg,jpg,png,gif',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('customer.profile')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $user = Auth::user();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->bank_id = $request->bank;
            $user->area_id = $request->area;
            $date = strtotime($request->birthday);
            $user->birthday = date('Y/m/d H:i:s', $date);
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
                $identity = Identity::where('user_id', $user->id)->first();

                $identity->number = $request->identity_number;
                $identity->date = date('Y/m/d H:i:s', strtotime($request->identity_date));
                $identity->address = $request->identity_address;

                if ($request->hasFile('image_before')) {
                    $identity->image_before = $request->file('image_before')->store('upload', 'public');
                }
                if ($request->hasFile('image_after')) {
                    $identity->image_after = $request->file('image_after')->store('upload', 'public');
                }

                $identity->save();

                return redirect()->route('customer.profile');
            }
        }
    }
}
