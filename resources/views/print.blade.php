@extends('layouts.layout')

@section('title', 'Form')

@section('content')

<div class="row">
    <!-- Profile -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Profile</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 text-center">
                        <img 
                            src="{{ asset($forms->image) }}" 
                            alt="Uploaded Image" 
                            class="img-fluid rounded" 
                            style="margin: 10px;" />
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <p class="form-control-static">{{ $forms->name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="companyid">Company ID Number</label>
                            <p class="form-control-static">{{ $forms->companyid }}</p>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <p class="form-control-static">{{ $forms->address }}</p>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <p class="form-control-static">{{ $forms->phone }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="birth_place">Birth Place</label>
                            <p class="form-control-static">{{ $forms->birth_place }}</p>
                        </div>
                        <div class="form-group">
                            <label for="birth_date">Birth Date</label>
                            <p class="form-control-static">{{ $forms->birth_date }}</p>
                        </div>
                        <div class="form-group">
                            <label for="lastedu">Last Formal Education</label>
                            <p class="form-control-static">{{ $forms->lastedu }}</p>
                        </div>
                        <div class="form-group">
                            <label for="input_date">Input Date</label>
                            <p class="form-control-static">{{ $forms->input_date }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Authorization LACA -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Authorization LACA</div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="laca">Authorization Type</label>
                    <p class="form-control-static">
                        {{ ['50' => 'Initial', '100' => 'Additional', '150' => 'Renewal'][$forms->laca] ?? 'Unknown' }}
                    </p>
                </div>
                <div class="form-group">
                    <label for="laca_number">Number</label>
                    <p class="form-control-static">{{ $forms->laca_number }}</p>
                </div>
                <div class="form-group">
                    <label for="validy">Validity</label>
                    <p class="form-control-static">{{ $forms->validy }}</p>
                </div>
                <div class="form-group">
                    <label for="scope">Scope</label>
                    <p class="form-control-static">
                        {{ ['1' => 'MR', '2' => 'RII', '3' => 'ETOPS'][$forms->scope] ?? 'Unknown' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Type of Rating Training -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Type of Rating Training</div>
            </div>
            <div class="card-body">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Course</th>
                            <th scope="col">Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($training_types as $training_type)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $training_type->course }}</td>
                                <td>{{ $training_type->course_year }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Basic License -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Basic License</div>
            </div>
            <div class="card-body">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Category</th>
                            <th scope="col">Card_Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($licenses as $license)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $license->license_category }}</td>
                                <td>{{ $license->card_number }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <table class="table mt-3">
                    <tbody>
                        <tr>
                            <td>AME License Number</td>
                            <td>{{$forms->ame_number}}</td>
                        </tr>
                        <tr>
                            <td>V.U.T</td>
                            <td>{{$forms->vut}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Mandatory Training -->
        <div class="card">
            <div class="card-header">
                <div class="card-title">Mandatory Training Initial/Current</div>
            </div>
            <div class="card-body">
                <table class="table mt-3">
                    <thead>
                        <tr>
                        <th scope="col">Training</th>
                        <th scope="col">Last Performed Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>HUMAN FACTOR TRAINING</td>
                            <td>{{$forms->hft_year}}</td>
                        </tr>
                        <tr>
                            <td>SMS TRAINING</td>
                            <td>{{$forms->sms_year}}</td>
                        </tr><tr>
                            <td>ETOPS TRAINING</td>
                            <td>{{$forms->etops_year}}</td>
                        </tr>
                        <tr>
                            <td>RII TRAINING</td>
                            <td>{{$forms->rii_year}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Lion Aircraft Type -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Lion Aircraft Type</div>
            </div>
            <div class="card-body">
                <table class="table mt-3">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Aircraft Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aircrafts as $aircraft)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$aircraft->aircraft}}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Assessment</div>
            </div>
            <div class="card-body">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Assessment Material</th>
                            <th class="text-center">Percentage Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materials as $index => $material)
                            @if ($index !== count($materials) - 1) <!-- Cek apakah elemen bukan elemen terakhir -->
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{!! nl2br($material) !!}</td>
                                    <td class="text-center">
                                        <p class="form-control-static">{{ $scores->where('question', $index + 1)->first()->score ?? 'N/A' }}%</p>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td></td>
                                    <td class="text-end" style="font-weight: bold; font-size: 20px;">{{ $material }}</td>
                                    <td class="text-center">
                                        <p class="form-control-static">{{ $scores->where('question', $index + 1)->first()->score ?? 'N/A' }}%</p>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th class="text-center">Applicant</th>
                            <th class="text-center">PIC/Coordinator</th>
                            <th class="text-center">Quality Inspector</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">{{$forms->name}}</td>
                            <td class="text-center">{{$forms->checkedBy->name}}</td>
                            <td class="text-center">{{$forms->assessmentBy->name}}</td>
                            <td class=" text-center
                                {{ $forms->status_id == 1 ? 'text-warning' : '' }}
                                {{ $forms->status_id == 2 ? 'text-success' : '' }}
                                {{ $forms->status_id == 3 ? 'text-danger' : '' }}
                                {{ $forms->status_id == 4 ? 'text-success' : '' }}
                                {{ $forms->status_id == 5 ? 'text-danger' : '' }}
                                ">
                                {!! [
                                    '1' => 'Pending', 
                                    '2' => 'Proposed', 
                                    '3' => 'Rejected', 
                                    '4' => '<strong>PASS</strong>',
                                    '5' => '<strong>FAIL</strong>'
                                    
                                    ][$forms->status_id] ?? 'Unknown' !!}
                            </td>  
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<a href="" class="btn btn-primary">
    Download PDF
</a>

@endsection