<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\User;
use App\Models\Assessment;
use Illuminate\View\View;
use Illuminate\Http\Response;

use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;

class PrintController extends Controller
{
    public function print(string $id): View
    {
        //get product by ID
        // $forms = Form::findOrFail($id);
        $forms = Form::with('trainingType','License','Aircraft','status','Assessment')->findOrFail($id); // Menggunakan relasi
        $training_types = $forms->trainingType;
        $licenses = $forms->License;
        $aircrafts = $forms->Aircraft;
        $scores = $forms->Assessment;

        $materials = array_values([
            'The understanding of CASR, SMS, HF, RVSM & PBN',
            'The understanding of Lion Air CMM, QCPM and QN',
            'The understanding of Required Inspection Item (only for applicant RII person)',
            'The understanding of ETOPS (only for applicant type rating A330)',
            'The understanding and the application of MP and MEL',
            "The understanding of how to fill and distribute these listed:\n- Preflight / Transit / Daily\n- AD / SB\n- AFML, DMI, DBC, NSRDI\n- Chronologies Report, AOG and SS Declaration",
            'The understanding of Airframe, Engine, Aircraft system',
            'The understanding of Electronics, Instrument, Radio installed to the Aircraft type',
            "What is the experience on performing trouble shooting on the aircraft?\n And how is his/her performance on conducting trouble shooting?",
            'Total Result' // Elemen terakhir
        ]);


        //render view with product
        return view('print', compact('forms','training_types','licenses','aircrafts','scores','materials'));
    }

    // Method untuk mengunduh PDF
    // public function downloadPdf($id)
    // {
    //     // URL halaman
    //     // $url = route('print', ['id' => $id]);

    //     // Path untuk menyimpan PDF
    //     // $filePath = storage_path("app/public/document-{$id}.pdf");

    //     try {
    //         // Generate PDF
    //         Browsershot::url('http://127.0.0.1:8000/print/pdf/1')
    //             ->savePdf('example.pdf');
    //             // ->setNodeBinary('C:/Program Files/nodejs/node.exe') // Path Node.js
    //             // ->setNpmBinary('C:/Program Files/nodejs/npm.cmd') // Path npm
    //             // ->timeout(120) // Timeout
    //             // ->windowSize(1920, 1080) // Ukuran viewport
    //             // ->fullPage() // Tangkap seluruh halaman
    //             // ->hideSelector('.sidebar') // Sembunyikan sidebar
    //             // ->hideSelector('.header') // Sembunyikan header
    //             // ->format('A4') // Format PDF
    //             // ->savePdf($filePath);

    //         // Unduh file PDF
    //         return response()->download($filePath)->deleteFileAfterSend(true);
    //     } catch (\Exception $e) {
    //         \Log::error('Browsershot Error: ' . $e->getMessage());
    //         return response()->json(['error' => 'Failed to generate PDF.']);
    //     }
    // }

}
