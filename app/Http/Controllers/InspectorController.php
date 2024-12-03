<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\User;
use App\Models\Assessment;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class InspectorController extends Controller
{
    public function inspector()
    {
        $forms = Form::where('status_id', 2)->get();
        // $forms = Form::all();
        return view('inspector', compact('forms')); // View untuk Menu 1
    }

    public function assessment(string $id): View
    {
        //get product by ID
        // $forms = Form::findOrFail($id);
        $forms = Form::with('trainingType','License','Aircraft','status')->findOrFail($id); // Menggunakan relasi
        $training_types = $forms->trainingType;
        $licenses = $forms->License;
        $aircrafts = $forms->Aircraft;

        $materials = array_values([
            'The understanding of CASR, SMS, HF, RVSM & PBN',
            'The understanding of Lion Air CMM, QCPM and QN',
            'The understanding of Required Inspection Item (only for applicant RII person)',
            'The understanding of ETOPS (only for applicant type rating A330)',
            'The understanding and the application of MP and MEL',
            "The understanding of how to fill and distribute these listed:\n- Preflight / Transit / Daily\n- AD / SB\n- AFML, DMI, DBC, NSRDI\n- Chronologies Report, AOG and SS Declaration",
            'The understanding of Airframe, Engine, Aircraft system',
            'The understanding of Electronics, Instrument, Radio installed to the Aircraft type',
            'What is the experience on performing trouble shooting on the aircraft? And how is his/her performance on conducting trouble shooting?',
            'Total Result' // Elemen terakhir
        ]);

        //render view with product
        return view('assessment', compact('forms','training_types','licenses','aircrafts','materials'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        try{
            $validated = $request->validate([
                'score' => 'required|array',
                'score.*' => 'integer|min:0|max:100',
                'status_id' => 'required|integer|in:4,5',
            ]);

            foreach ($validated['score'] as $question => $value) {
                Assessment::updateOrCreate(
                    ['forms_id' => $id, 'question' => $question],
                    ['score' => $value]
                );
            }

            $forms = Form::findOrFail($id);
            $forms->update([
                'status_id' => $validated['status_id'],
                'assessment_by' => auth()->user()->id,
                'assessment_at' => now(),
            ]);

            // $assessment = Assessment::create($validated);
            return redirect()->route('inspector')->with('success', 'Form record has been saved successfully!');
        } catch (\Exception $e) {
            \Log::error('Error menyimpan data: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data gagal disimpan. Silakan coba lagi.');
        }
    }
    
    
    // public function updateStatus(Request $request, $id)
    // {
    //     $forms = Form::findOrFail($id);

    //     // Update status_id berdasarkan tombol yang diklik
    //     $forms->update([
    //         'status_id' => $request->status_id,
    //         'assessment_by' => auth()->user()->id,
    //         'assessment_at' => now(),
    //         ]);

    //     return redirect()->route('inspector')->with('success', 'Status updated successfully.');
    // }
}
