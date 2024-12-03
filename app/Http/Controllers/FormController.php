<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


//import model product
use App\Models\Form; 
use App\Models\TrainingType;
use App\Models\License;
use App\Models\Aircraft;

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function store(Request $request): RedirectResponse
    {
        try{
            // Validasi data
            $validated = $request->validate([
                'name' => 'string',
                'input_date' => 'string',
                'address' => 'string',
                'birth_place' => 'string',
                'birth_date' => 'string',
                'lastedu' => 'string',
                'phone' => 'string',
                'companyid' => 'string',
                'image' => 'image|mimes:jpeg,png,jpg|max:2048',
                'laca' => 'string',
                'laca_number' => 'string',
                'validy' => 'string',
                'scope' => 'string',
                'ame_number' => 'string',
                'vut' => 'string',
                'hft_year' => 'string',
                'sms_year' => 'string',
                'etops_year' => 'string',
                'rii_year' => 'string',
                'course' => 'nullable|array',
                'course_year' => 'nullable|array',
                'license_category' => 'nullable|array',
                'card_number' => 'nullable|array',
                'aircraft' => 'nullable|array',
            ]);

            // Simpan file foto jika ada
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('photos', 'public');;
                $validated['image'] = Storage::url($path);
            }
            // Update form di database
            // $form = Form::findOrFail($id);
            // $form->update([
            //     'image' => $validated['photo_path'],
            // ]);

            // Tambahkan status_id default ke "pending"
            $validated['status_id'] = 1; // ID dari status "pending"
            
            // Simpan ke database
            $form = Form::create($validated);

            // Simpan data ke tabel `training_type`
            if ($request->has('course')) {
                foreach ($request->course as $index => $course) {
                    TrainingType::create([
                        'forms_id' => $form->id,
                        'course' => $course,
                        'course_year' => $request->course_year[$index] ?? null,
                    ]);
                }
            }

            // Simpan data ke tabel 'license'
            if ($request->has('license_category')) {
                foreach ($request->license_category as $index => $license_category) {
                    License::create([
                        'forms_id' => $form->id,
                        'license_category' => $license_category,
                        'card_number' => $request->card_number[$index] ?? null,
                    ]);
                }
            }

            //  Simpan data ke tabel 'license'
            if ($request->has('aircraft')) {
                foreach ($request->aircraft as $index => $aircraft) {
                    Aircraft::create([
                        'forms_id' => $form->id,
                        'aircraft' => $aircraft,
                    ]);
                }
            }


            // Redirect dengan pesan sukses
            return redirect()->route('engineer')->with('success', 'Form record has been saved successfully!');
        }   catch (\Exception $e) {
            Log::error('Error menyimpan data: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data gagal disimpan. Silakan coba lagi.');
        }
    }
}
