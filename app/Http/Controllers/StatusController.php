<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\User;
use Illuminate\View\View;

class StatusController extends Controller
{
    public function status()
    {
        // $forms = Form::where('status_id', 1)->get();
        $forms = Form::all();
        return view('status', compact('forms'));
    }
}
