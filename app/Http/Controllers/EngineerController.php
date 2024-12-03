<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\View\View;

class EngineerController extends Controller
{
    public function engineer()
    {
        //get all form
        $forms = Form::all();
        return view('engineer', compact('forms')); // View untuk Menu 1
    }
}
