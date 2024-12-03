@extends('layouts.layout')

@section('title', 'Inspector')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Assessment List</div>
            </div>
            <div class="card-body">
                <table class="table mt-3 table-bordered">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th>Applicant</th>
                    <th>Input Date</th>
                    <th>Checked by</th>
                    <th>Checked at</th>
                    <th class="text-center">Action</th>
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
                <td class="text-center">
                    <form>
                        <a href="{{ route('assessment', $form->id) }}" class="btn btn-sm btn-success">Take Assessment</a>
                        {{-- <a href="" class="btn btn-sm btn-dark">Detail</a> --}}
                    </form>
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
</div>
@endsection
