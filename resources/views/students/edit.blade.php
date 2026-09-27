@extends('layouts.sims')

@section('header')
    <div class="page-header">
        <div>
            <h1>Edit Siswa</h1>
            <p>Perbarui data siswa.</p>
        </div>

        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            ← Kembali
        </a>
    </div>
@endsection

@section('content')

    <div class="card">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">

                <div class="form-group">
                    <label for="nis">NIS <span class="required">*</span></label>

                    <input
                        type="text"
                        id="nis"
                        name="nis"
                        value="{{ old('nis', $student->nis) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="nisn">NISN</label>

                    <input
                        type="text"
                        id="nisn"
                        name="nisn"
                        value="{{ old('nisn', $student->nisn) }}"
                    >
                </div>

                <div class="form-group">
                    <label for="name">Nama Lengkap <span class="required">*</span></label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $student->name) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="gender">Jenis Kelamin <span class="required">*</span></label>

                    <select id="gender" name="gender" required>
                        <option value="">-- Pilih --</option>

                        <option
                            value="L"
                            {{ old('gender', $student->gender) === 'L' ? 'selected' : '' }}
                        >
                            Laki-laki
                        </option>

                        <option
                            value="P"
                            {{ old('gender', $student->gender) === 'P' ? 'selected' : '' }}
                        >
                            Perempuan
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="birth_date">Tanggal Lahir</label>

                    <input
                        type="date"
                        id="birth_date"
                        name="birth_date"
                        value="{{ old('birth_date', $student->birth_date?->format('Y-m-d')) }}"
                    >
                </div>

                <div class="form-group">
                    <label for="major_id">Jurusan <span class="required">*</span></label>

                    <select id="major_id" name="major_id" required>
                        <option value="">-- Pilih Jurusan --</option>

                        @foreach ($majors as $major)
                            <option
                                value="{{ $major->id }}"
                                {{ old('major_id', $student->major_id) == $major->id ? 'selected' : '' }}
                            >
                                {{ $major->code }} - {{ $major->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="class_id">Kelas</label>

                    <select id="class_id" name="class_id">
                        <option value="">-- Pilih Kelas --</option>

                        @foreach ($classes as $class)
                            <option
                                value="{{ $class->id }}"
                                {{ old('class_id', $student->class_id) == $class->id ? 'selected' : '' }}
                            >
                                {{ $class->name }} - {{ $class->major->code }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="phone">No. Telepon</label>

                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        value="{{ old('phone', $student->phone) }}"
                    >
                </div>

                <div class="form-group form-full">
                    <label for="address">Alamat</label>

                    <textarea
                        id="address"
                        name="address"
                        rows="4"
                    >{{ old('address', $student->address) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status <span class="required">*</span></label>

                    <select id="status" name="status" required>
                        <option
                            value="1"
                            {{ old('status', $student->status) == 1 ? 'selected' : '' }}
                        >
                            Aktif
                        </option>

                        <option
                            value="0"
                            {{ old('status', $student->status) == 0 ? 'selected' : '' }}
                        >
                            Tidak Aktif
                        </option>
                    </select>
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">
                    Batal
                </a>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>
            </div>

        </form>

    </div>

@endsection