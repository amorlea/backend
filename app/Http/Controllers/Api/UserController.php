<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return User::all();
    }

 /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::findOrFail($id);
    }
/**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
       
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $User = User::create($validated);
          
        return $User;
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {

        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->name = $validated['name'];
        
        $user->save();
        
        return $user;
    }
    /**
     * Update the email of the specifies resource in storage.
     */
    public function email(UserRequest $request, string $id)
    {
        
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->email = $validated['email'];
        
        $user->save();
        
        return $user;
    }

    /**
     * Update the password of the specifies resource in storage.
     */
    public function password(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->email =Hash::make($validated['password']);
        
        $user->save();
        
        return $user;
    }
    
     /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $User = User::findOrFail($id);
 
        $User->delete();

        return  $User;
    }
}