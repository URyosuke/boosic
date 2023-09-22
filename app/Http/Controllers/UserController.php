<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function store(UserRequest $request, $userId)
    {
        $user = User::find($userId);
        $data = $request->validated();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        
        $dir = 'images';
        
        if($request->file('image') != null){
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/', $file_name);
            $user->image = 'storage/' . $file_name;
        }
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();
        
        
        
         return redirect(route('posthome', $userId));
    }
}
