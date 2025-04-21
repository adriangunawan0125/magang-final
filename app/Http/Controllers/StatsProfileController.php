<?php

namespace App\Http\Controllers;

use App\Models\Statsprofile; // Disesuaikan dengan nama class model
use Illuminate\Http\Request;

class StatsProfileController extends Controller
{
    public function edit()
    {
        $statistic = Statsprofile::first(); 
        return view('profile.admin.statistik.edit', compact('statistic'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'peserta_didik' => 'required|integer',
            'rombel' => 'required|integer',
            'guru_tenaga_kependidikan' => 'required|integer',
        ]);

        $statistic = Statsprofile::first();

        if ($statistic) {
            $statistic->update([
                'peserta_didik' => $request->peserta_didik,
                'rombel' => $request->rombel,
                'guru_tenaga_kependidikan' => $request->guru_tenaga_kependidikan,
            ]);
        } else {
            Statsprofile::create([
                'peserta_didik' => $request->peserta_didik,
                'rombel' => $request->rombel,
                'guru_tenaga_kependidikan' => $request->guru_tenaga_kependidikan,
            ]);
        }

        return redirect()->route('admin.statistik_profile.edit')->with('success', 'Statistik berhasil diperbarui');
    }
}
