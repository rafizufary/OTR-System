@extends('layouts.layout')

@section('title', 'Form')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Personnel Authorized Qualification Record</h2>
                </div>
                <div class="card-body">
                    <div class="card-title">Profile</div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Enter your Name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="input_date">Input Date</label>
                                <input id="input_date" name="input_date" class="form-control" type="date" />
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <div class="input-group">
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    name="address"
                                    placeholder="Enter your Address"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="birth_place">Birth Place</label>
                                <input
                                type="text"
                                class="form-control"
                                id="birth_place"
                                name="birth_place"
                                placeholder="Enter your Birth Place"
                                />
                            </div>
                            <div class="form-group">
                                <label for="birth_date">Birth Date</label>
                                <input id="birth_date" name="birth_date" class="form-control" type="date" />
                            </div>
                            <div class="form-group">
                                <label for="lastedu">Last Formal Education</label>
                                <div class="input-group">
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="lastedu"
                                    name="lastedu"
                                    placeholder="Enter your Last Formal Education"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <div class="input-group">
                                    <input
                                    type="number"
                                    class="form-control"
                                    id="phone"
                                    name="phone"
                                    placeholder="Enter your Phone Number"
                                    />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="companyid">Company ID Number</label>
                                <div class="input-group">
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="companyid"
                                    name="companyid"
                                    placeholder="Enter your Company ID Number"
                                    />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1"
                                >Photo (4x3)</label>
                                <input
                                type="file"
                                accept="image/*"
                                class="form-control-file"
                                id="image"
                                name="image"
                                />
                            </div>
                        </div>
                    </div>
                    <hr class="solid">
                        <div class="card-title">Authorization LACA</div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <div class="selectgroup-pills">
                                        <label class="selectgroup-item">
                                            <input
                                            type="radio"
                                            name="laca"
                                            value="50"
                                            class="selectgroup-input"
                                            checked=""
                                            />
                                            <span class="selectgroup-button">Initial</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input
                                            type="radio"
                                            name="laca"
                                            value="100"
                                            class="selectgroup-input"
                                            />
                                            <span class="selectgroup-button">Additional</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input
                                            type="radio"
                                            name="laca"
                                            value="150"
                                            class="selectgroup-input"
                                            />
                                            <span class="selectgroup-button">Renewal</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="laca_number">Number</label>
                                    <div class="input-group">
                                        <input
                                        type="number"
                                        class="form-control"
                                        id="laca_number"
                                        name="laca_number"
                                        placeholder="Enter your Number"
                                        />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validy">Validy</label>
                                    <div class="input-group">
                                        <input
                                        type="text"
                                        class="form-control"
                                        id="validy"
                                        name="validy"
                                        placeholder="Enter your Validy"
                                        />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Scope</label>
                                    <div class="selectgroup-pills">
                                        <label class="selectgroup-item">
                                            <input
                                            type="radio"
                                            name="scope"
                                            value="1"
                                            class="selectgroup-input"
                                            checked=""
                                            />
                                            <span class="selectgroup-button">MR</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input
                                            type="radio"
                                            name="scope"
                                            value="2"
                                            class="selectgroup-input"
                                            />
                                            <span class="selectgroup-button">RII</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input
                                            type="radio"
                                            name="scope"
                                            value="3"
                                            class="selectgroup-input"
                                            />
                                            <span class="selectgroup-button">ETOPS</span>
                                        </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </hr>
                    <hr class="solid">
                    <div class="form-group">
                            <div class="card-title">Type of Rating Training</div>
                                <div class="form-group">
                                    <div id="dynamic1">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Course</th>
                                                    <th>Year</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table1">
                                                <tr>
                                                    <td>1</td>
                                                    <td><input type="text" class="form-control" name="course[]" placeholder="Enter Course" /></td>
                                                    <td><input type="number" class="form-control" name="course_year[]" placeholder="Enter Year" /></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button id="add1" type="button" class="btn btn-primary mt-2">Add Row</button>
                                    </div>
                                </div>
                            </div>
                        </hr>
                        <hr class="solid">
                        <div class="form-group">
                                <div class="card-title">Basic License</div>
                                    <div class="form-group">
                                        <div id="dynamic2">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Category</th>
                                                        <th>Card Number</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table2">
                                                    <tr>
                                                        <td>1</td>
                                                        <td><input type="text" class="form-control" name="license_category[]" placeholder="Enter Category" /></td>
                                                        <td><input type="number" class="form-control" name="card_number[]" placeholder="Enter Card Number" /></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <button id="add2" type="button" class="btn btn-primary mt-2">Add Row</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="ame_number">AME License Number</label>
                                            <div class="input-group">
                                                <input
                                                type="companyid"
                                                class="form-control"
                                                id="ame_number"
                                                name="ame_number"
                                                placeholder="Enter your AME License Number"
                                                />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="vut">V.U.T.</label>
                                            <div class="input-group">
                                                <input
                                                type="companyid"
                                                class="form-control"
                                                id="vut"
                                                name="vut"
                                                placeholder="Enter your V.U.T."
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </hr>
                        <hr class="solid">
                        <div class="form-group">
                            <div class="card-title">Lion Air Aircraft Type</div>
                                <div class="form-group">
                                    <div id="dynamic3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Aircraft Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table3">
                                                <tr>
                                                    <td>1</td>
                                                    <td><input type="text" class="form-control" name="aircraft[]" placeholder="Enter Aircraft Type" /></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button id="add3" type="button" class="btn btn-primary mt-2">Add Row</button>
                                    </div>
                                </div>
                            </div>
                        </hr>
                        <hr class="solid">
                        <div class="form-group">
                            <div class="card-title">Mandatory Training Initial/Recurrent</div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="hft_year">HUMAN FACTOR TRAINING</label>
                                <input
                                type="number"
                                maxlength="4"
                                class="form-control"
                                id="hft_year"
                                name="hft_year"
                                placeholder="Enter your Last Performed Year"
                                />
                            </div>
                            <div class="form-group">
                                <label for="sms_year">SMS TRAINING</label>
                                <div class="input-group">
                                    <input
                                    type="number"
                                    class="form-control"
                                    id="sms_year"
                                    name="sms_year"
                                    placeholder="Enter your Last Performed Year"
                                    />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="etops_year">ETOPS TRAINING (only for
                                    applicant for A/C type effective
                                    ETOPS)</label>
                                <div class="input-group">
                                    <input
                                    type="number"
                                    class="form-control"
                                    id="etops_year"
                                    name="etops_year"
                                    placeholder="Enter your Last Performed Year"
                                    />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rii_year">RII TRAINING (only for applicant
                                    RII)</label>
                                <input
                                type="number"
                                maxlength="4"
                                class="form-control"
                                id="rii_year"
                                name="rii_year"
                                placeholder="Enter your Last Performed Year"
                                />
                            </div>
                        </div>

                    {{-- <hr class="solid">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="email2">Name</label>
                                    <input
                                    type="name"
                                    class="form-control"
                                    id="naem"
                                    placeholder="Enter your Name"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="email2">Name</label>
                                    <input
                                    type="name"
                                    class="form-control"
                                    id="naem"
                                    placeholder="Enter your Name"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="email2">Name</label>
                                    <input
                                    type="name"
                                    class="form-control"
                                    id="naem"
                                    placeholder="Enter your Name"
                                    />
                                </div>
                            </div>
                        </div>
                        <table>
                            <tr>
                            <td><label for="surname">Surname:</label></td>
                            <td><input type="text" id="surname" name="surname"></td>
                            </tr>
                            <tr>
                            <td><label for="othernames">Other Names:</label></td>
                            <td><input type="text" id="othernames" name="othernames"></td>
                            </tr>
                            <tr>
                            <td><label for="email">Email:</label></td>
                            <td><input type="email" id="email" name="email"></td>
                            </tr>
                            <tr>
                            <td><label for="phone">Phone:</label></td>
                            <td><input type="tel" id="phone" name="phone"></td>
                            </tr>
                            <tr>
                            <td><label for="address">Address:</label></td>
                            <td><input type="text" id="address" name="address"></td>
                            </tr>
                        </table>
                        <div id="addForm">
                            <div class="row" v-for="(book, index) in bookedUnder" :key="index">
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Act</label>
                                        <input type="text" class="form-control" v-model="book.act" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Section</label>
                                        <input type="text" class="form-control" v-model="book.section">
                                    </div>
                                </div>
                            </div>
                            <button @click="addNewRow">Add row</button>
                        </div>
                    </hr> --}}
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Submit</button>
                        {{-- <button class="btn btn-danger">Cancel</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection



@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Table 1
    document.getElementById('add1').addEventListener('click', function (e) {
        e.preventDefault();
        const tableBody = document.getElementById('table1');
        const rowCount = tableBody.rows.length + 1;

        const deleteButton = rowCount > 1 
            ? `<td><button class="btn btn-danger remove1">Delete</button></td>` 
            : `<td></td>`;

        const newRow = `
            <tr>
                <td>${rowCount}</td>
                <td><input type="text" class="form-control" name="course[]" placeholder="Enter Course" /></td>
                <td><input type="number" class="form-control" name="course_year[]" placeholder="Enter Year" /></td>
                ${deleteButton}
            </tr>
        `;
        tableBody.insertAdjacentHTML('beforeend', newRow);
    });

    // Remove Row
    document.getElementById('dynamic1').addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove1')) {
            const row = e.target.closest('tr'); // Temukan elemen <tr> terdekat
            row.remove(); // Hapus baris
        }
    });

    // Table 2
    document.getElementById('add2').addEventListener('click', function (e) {
        e.preventDefault();
        const tableBody = document.getElementById('table2');
        const rowCount = tableBody.rows.length + 1;

        const deleteButton = rowCount > 1 
            ? `<td><button class="btn btn-danger remove2">Delete</button></td>` 
            : `<td></td>`;

        const newRow = `
            <tr>
                <td>${rowCount}</td>
                <td><input type="text" class="form-control" name="license_category[]" placeholder="Enter Category" /></td>
                <td><input type="number" class="form-control" name="card_number[]" placeholder="Enter Card Number" /></td>
                ${deleteButton}
            </tr>
        `;
        tableBody.insertAdjacentHTML('beforeend', newRow);
    });

    // Remove Row
    document.getElementById('dynamic2').addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove2')) {
            const row = e.target.closest('tr'); // Temukan elemen <tr> terdekat
            row.remove(); // Hapus baris
        }
    });

    // Table 3
    document.getElementById('add3').addEventListener('click', function (e) {
        e.preventDefault();
        const tableBody = document.getElementById('table3');
        const rowCount = tableBody.rows.length + 1;

        const deleteButton = rowCount > 1 
            ? `<td><button class="btn btn-danger remove3">Delete</button></td>` 
            : `<td></td>`;

        const newRow = `
            <tr>
                <td>${rowCount}</td>
                <td><input type="text" class="form-control" name="aircraft[]" placeholder="Enter Aircraft Type" /></td>
                ${deleteButton}
            </tr>
        `;
        tableBody.insertAdjacentHTML('beforeend', newRow);
    });

    // Remove Row
    document.getElementById('dynamic3').addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove3')) {
            const row = e.target.closest('tr'); // Temukan elemen <tr> terdekat
            row.remove(); // Hapus baris
        }
    });
});
</script>
@endpush
