@extends('layouts.sims')

@section('title', 'Data Siswa - SIMS')
@section('header', 'Data Siswa')

@section('content')

<div class="page-header">

    <div>
        <h2 class="page-title">Data Siswa</h2>
        <p class="page-description">
            Kelola data seluruh siswa yang terdaftar di sekolah.
        </p>
    </div>

    <a href="{{ route('students.create') }}" class="btn btn-primary">
        + Tambah Siswa
    </a>

</div>


<div class="card">

    <div class="table-wrapper">

        <table>

            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>L/P</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($students as $student)

                    <tr>

                        <td>
                            {{ $student->nis }}
                        </td>

                        <td>
                            <strong>{{ $student->name }}</strong>
                        </td>

                        <td>
                            {{ $student->gender }}
                        </td>

                        <td>
                            {{ $student->schoolClass?->name ?? '-' }}
                        </td>

                        <td>
                            {{ $student->major?->code ?? '-' }}
                        </td>

                        <td>

                            @if($student->status)
                                <span class="badge badge-success">
                                    Aktif
                                </span>
                            @else
                                <span class="badge badge-danger">
                                    Tidak Aktif
                                </span>
                            @endif

                        </td>

                        <td>

                            <div class="actions">

                                <a
                                    href="{{ route('students.show', $student) }}"
                                    class="btn btn-secondary"
                                >
                                    Detail
                                </a>

                                <a
                                    href="{{ route('students.edit', $student) }}"
                                    class="btn btn-primary"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('students.destroy', $student) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus siswa ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px;">
                            Belum ada data siswa.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <div class="pagination">
        {{ $students->links() }}
    </div>

</div>

@endsection