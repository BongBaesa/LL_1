<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dog;

class DogController extends Controller
{
    //
    public function create(Request $request)
    {
        if(Auth::check()){
            $validated = $request->validate([
                "name"=> "required",
            ]);
            Dog::create($request->all());
            }
            return to_route('index');
    }

    public function delete($id)
    {
        if(Auth::check()){
            $dog = Dog::find($id);
            $dog->delete();
    }

    return to_route('index');  

    }
}
