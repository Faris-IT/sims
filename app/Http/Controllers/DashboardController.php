<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request): RedirectResponse
    {
        $role = $request->user()->role?->name;

        return match ($role) {
            'tu' => redirect()->route('tu.dashboard'),
            'guru' => redirect()->route('guru.dashboard'),
            'kepala_sekolah' => redirect()->route('kepala.dashboard'),
            'perpustakaan' => redirect()->route('perpustakaan.dashboard'),
            'siswa' => redirect()->route('siswa.dashboard'),

            default => abort(403, 'User belum memiliki role yang valid.'),
        };
    }
}