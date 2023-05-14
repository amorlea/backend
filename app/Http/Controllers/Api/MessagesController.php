<?php

namespace App\Http\Controllers\Api;

use App\Models\Messages;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\MessagesRequest;

class MessagesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(MessagesRequest $request)
    {
       
        $validated = $request->validated();

        $Messages = Messages::create($validated);
            
        return $Messages;
       
    }
    

 /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Messages = Messages::findOrFail($id);
 
        $Messages->delete();

        return  $Messages;
    }
}
