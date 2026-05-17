@extends('layouts.admin')

@section('content')

<h2 class="page-title mb-4">
    Edit Patient
</h2>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body">

        <form
            action="{{ route('admin.patients.update', $patient->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        No RM
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="{{ $patient->no_rm }}"
                        readonly
                    >

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        NIK
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="{{ $patient->nik }}"
                        readonly
                    >

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        value="{{ $patient->nama }}"
                    >

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Tanggal Lahir
                    </label>

                    <input
                        type="date"
                        name="tanggal_lahir"
                        class="form-control"
                        value="{{ $patient->tanggal_lahir }}"
                    >

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Gender
                    </label>

                    <select
                        name="gender"
                        class="form-select"
                    >

                        <option
                            value="L"
                            {{ $patient->gender == 'L' ? 'selected' : '' }}
                        >
                            Laki-laki
                        </option>

                        <option
                            value="P"
                            {{ $patient->gender == 'P' ? 'selected' : '' }}
                        >
                            Perempuan
                        </option>

                    </select>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        No HP
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        class="form-control"
                        value="{{ $patient->no_hp }}"
                    >

                </div>

                <div class="col-12 mb-4">

                    <label class="form-label">
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        class="form-control"
                        rows="4"
                    >{{ $patient->alamat }}</textarea>

                </div>

            </div>

            <button
                type="submit"
                class="btn btn-primary rounded-pill px-4"
            >
                Simpan Perubahan
            </button>

        </form>

    </div>

</div>

@endsection