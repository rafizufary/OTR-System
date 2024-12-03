<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\User;
use Illuminate\View\View;

class CoordinatorController extends Controller
{
    public function coordinator()
    {
        $forms = Form::where('status_id', 1)->get();
        // $forms = Form::all();
        return view('coordinator', compact('forms'));
    }

    public function detail(string $id): View
    {
        //get product by ID
        // $forms = Form::findOrFail($id);
        $forms = Form::with('trainingType','License','Aircraft','status')->findOrFail($id); // Menggunakan relasi
        $training_types = $forms->trainingType;
        $licenses = $forms->License;
        $aircrafts = $forms->Aircraft;

        //render view with product
        return view('detail', compact('forms','training_types','licenses','aircrafts'));
    }

    public function updateStatus(Request $request, $id)
    {
        $forms = Form::findOrFail($id);

        // Update status_id berdasarkan tombol yang diklik
        $forms->update([
            'status_id' => $request->status_id,
            'checked_by' => auth()->user()->id,
            'checked_at' => now(),
            ]);

        return redirect()->route('coordinator')->with('success', 'Status updated successfully.');
    }


}
