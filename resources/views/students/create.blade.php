@extends('layouts.sims')

@section('title', 'Tambah Siswa - SIMS')
@section('header', 'Tambah Siswa')

@section('content')

<div class="page-header">

    <div>
        <h2 class="page-title">Tambah Siswa</h2>
        <p class="page-description">
            Tambahkan data siswa baru ke dalam sistem.
        </p>
    </div>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">
        ← Kembali
    </a>

</div>


<div class="card">

    @if($errors->any())
        <div class="alert" style="background: #fee2e2; color: #991b1b;">
            <strong>Data belum dapat disimpan.</strong>

            <ul style="margin: 8px 0 0 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form
        action="{{ route('students.store') }}"
        method="POST"
    >

        @csrf


        <div class="form-group">

            <label class="form-label" for="nis">
                NIS
            </label>

            <input
                type="text"
                id="nis"
                name="nis"
                class="form-control"
                value="{{ old('nis') }}"
                placeholder="Contoh: 20260001"
                required
            >

            @error('nis')
                <div class="form-error">{{ $message }}</div>
            @enderror

        </div>


        <div class="form-group">

            <label class="form-label" for="nisn">
                NISN
            </label>

            <input
                type="text"
                id="nisn"
                name="nisn"
                class="form-control"
                value="{{ old('nisn') }}"
                placeholder="Contoh: 0012345678"
            >

            @error('nisn')
                <div class="form-error">{{ $message }}</div>
            @enderror

        </div>


        <div class="form-group">

            <label class="form-label" for="name">
                Nama Lengkap
            </label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name') }}"
                placeholder="Masukkan nama lengkap"
                required
            >

            @error('name')
                <div class="form-error">{{ $message }}</div>
            @enderror

        </div>


        <div class="form-group">

            <label class="form-label" for="gender">
                Jenis Kelamin
            </label>

            <select
                id="gender"
                name="gender"
                class="form-control"
                required
            >
                <option value="">-- Pilih Jenis Kelamin --</option>

                <option
                    value="L"
                    @selected(old('gender') === 'L')
                >
                    Laki-laki
                </option>

                <option
                    value="P"
                    @selected(old('gender') === 'P')
                >
                    Perempuan
                </option>

            </select>

            @error('gender')
                <div class="form-error">{{ $message }}</div>
            @enderror

        </div>


        <div class="form-group">

            <label class="form-label" for="birth_date">
                Tanggal Lahir
            </label>

            <input
                type="date"
                id="birth_date"
                name="birth_date"
                class="form-control"
                value="{{ old('birth_date') }}"
            >

            @error('birth_date')
                <div class="form-error">{{ $message }}</div>
            @enderror

        </div>


        <div class="form-group">

            <label class="form-label" for="major_id">
                Jurusan
            </label>

            <select
                id="major_id"
                name="major_id"
                class="form-control"
                required
            >

                <option value="">
                    -- Pilih Jurusan --
                </option>

                @foreach($majors as $major)

                    <option
                        value="{{ $major->id }}"
                        @selected(old('major_id') == $major->id)
                    >
                        {{ $major->code }} - {{ $major->name }}
                    </option>

                @endforeach

            </select>

            @error('major_id')
                <div class="form-error">{{ $message }}</div>
            @enderror

        </div>


        <div class="form-group">

            <label class="form-label" for="class_id">
                Kelas
            </label>

            <select
                id="class_id"
                name="class_id"
                class="form-control"
            >

                <option value="">
                    -- Pilih Kelas --
                </option>

                @foreach($classes as $class)

                    <option
                        value="{{ $class->id }}"
                        @selected(old('class_id') == $class->id)
                    >
                        {{ $class->name }} — {{ $class->major->code }}
                    </option>

                @endforeach

            </select>

            @error('class_id')
                <div class="form-error">{{ $message }}</div>
            @enderror

        </div>


        <div class="form-group">

            <label class="form-label" for="phone">
                No. Telepon
            </label>

            <input
                type="text"
                id="phone"
                name="phone"
                class="form-control"
                value="{{ old('phone') }}"
                placeholder="Contoh: 081234567890"
            >

            @error('phone')
                <div class="form-error">{{ $message }}</div>
            @enderror

        </div>


        <div class="form-group">

            <label class="form-label" for="address">
                Alamat
            </label>

            <textarea
                id="address"
                name="address"
                class="form-control"
                rows="4"
                placeholder="Masukkan alamat siswa"
            >{{ old('address') }}</textarea>

            @error('address')
                <div class="form-error">{{ $message }}</div>
            @enderror

        </div>


        <div class="form-group">

            <label class="form-label" for="status">
                Status
            </label>

            <select
                id="status"
                name="status"
                class="form-control"
                required
            >
                <option
                    value="1"
                    @selected(old('status', '1') == '1')
                >
                    Aktif
                </option>

                <option
                    value="0"
                    @selected(old('status') === '0')
                >
                    Tidak Aktif
                </option>
            </select>

            @error('status')
                <div class="form-error">{{ $message }}</div>
            @enderror

        </div>


        <div style="display: flex; gap: 10px;">

            <button
                type="submit"
                class="btn btn-primary"
            >
                Simpan Siswa
            </button>

            <a
                href="{{ route('students.index') }}"
                class="btn btn-secondary"
            >
                Batal
            </a>

        </div>

    </form>

</div>

@endsection