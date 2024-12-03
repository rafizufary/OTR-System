@extends('layouts.layout')

@section('title', 'Coordinator')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Engineer Application</div>
            </div>
            <div class="card-body">
                <table class="table mt-3 table-bordered">
                    <thead> 
                        <tr>
                            <th>No.</th>
                            <th>Applicant</th>
                            <th>Input Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($forms as $form)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $form->name }}</td>
                                <td>{{ $form->input_date }}</td>
                                <td class="text-center">
                                    <form>
                                        <a href="{{ route('detail', $form->id) }}" class="btn btn-sm btn-success">Check</a>
                                        {{-- <a href="" class="btn btn-sm btn-dark">Detail</a> --}}
                                    </form>
                                </td>
                                {{-- <td>{{ ['1' => 'Pending', '2' => 'Proposed', '3' => 'Rejected'][$form->status_id] ?? 'Unknown' }}</td>               --}}
                                {{-- <td class="
                                    {{ $form->status_id == 1 ? 'text-warning' : '' }}
                                    {{ $form->status_id == 2 ? 'text-success' : '' }}
                                    {{ $form->status_id == 3 ? 'text-danger' : '' }}
                                ">
                                    {{ ['1' => 'Pending', '2' => 'Proposed', '3' => 'Rejected'][$form->status_id] ?? 'Unknown' }}
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Status</div>
                </div>
                <div class="card-body">
                    <table class="table mt-3 table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th>Proposed by</th>
                        <th>Input Date</th>
                        <th>Checked by</th>
                        <th>Checked at</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($forms as $form)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $form->name }}</td>
                    <td>{{ $form->input_date }}</td>              
                    <td>{{ $form->checkedBy->name ?? 'N/A' }}</td>
                    <td>{{ $form->checked_at }}</td>
                    <td class="
                        {{ $form->status_id == 1 ? 'text-warning' : '' }}
                        {{ $form->status_id == 2 ? 'text-success' : '' }}
                        {{ $form->status_id == 3 ? 'text-danger' : '' }}
                    ">
                        {{ ['1' => 'Pending', '2' => 'Proposed', '3' => 'Rejected'][$form->status_id] ?? 'Unknown' }}
                    </td>  
                </tr>
            @empty
                <tr>
                    <td colspan="3">No data available</td>
                </tr>
            @endforelse
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}

@endsection
