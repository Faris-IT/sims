@extends('layouts.sims')

@section('header')
    <div class="page-header">
        <div>
            <h1>Detail Siswa</h1>
            <p>Informasi lengkap data siswa.</p>
        </div>

        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            ← Kembali
        </a>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h2>{{ $student->name }}</h2>

            @if ($student->status)
                <span class="badge badge-success">Aktif</span>
            @else
                <span class="badge badge-danger">Tidak Aktif</span>
            @endif
        </div>

        <div class="detail-grid">

            <div class="detail-item">
                <span class="detail-label">NIS</span>
                <strong>{{ $student->nis }}</strong>
            </div>

            <div class="detail-item">
                <span class="detail-label">NISN</span>
                <strong>{{ $student->nisn ?? '-' }}</strong>
            </div>

            <div class="detail-item">
                <span class="detail-label">Nama Lengkap</span>
                <strong>{{ $student->name }}</strong>
            </div>

            <div class="detail-item">
                <span class="detail-label">Jenis Kelamin</span>
                <strong>
                    {{ $student->gender === 'L' ? 'Laki-laki' : 'Perempuan' }}
                </strong>
            </div>

            <div class="detail-item">
                <span class="detail-label">Tanggal Lahir</span>
                <strong>
                    {{ $student->birth_date?->format('d F Y') ?? '-' }}
                </strong>
            </div>

            <div class="detail-item">
                <span class="detail-label">Jurusan</span>
                <strong>
                    {{ $student->major?->name ?? '-' }}
                </strong>
            </div>

            <div class="detail-item">
                <span class="detail-label">Kelas</span>
                <strong>
                    {{ $student->schoolClass?->name ?? '-' }}
                </strong>
            </div>

            <div class="detail-item">
                <span class="detail-label">No. Telepon</span>
                <strong>
                    {{ $student->phone ?? '-' }}
                </strong>
            </div>

            <div class="detail-item detail-full">
                <span class="detail-label">Alamat</span>
                <strong>
                    {{ $student->address ?? '-' }}
                </strong>
            </div>

        </div>
    </div>

@endsection