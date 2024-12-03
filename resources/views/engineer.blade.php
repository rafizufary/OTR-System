@extends('layouts.layout')

@section('title', 'Engineer')

@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Proposed by</th>
            <th>Input Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($forms as $form)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $form->name }}</td>
                <td>{{ $form->input_date }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No data available</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
