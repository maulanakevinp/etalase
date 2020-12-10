<?php

namespace App\Exports;

use App\Anggota;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;

class AnggotaExport implements WithCustomValueBinder,FromView,ShouldAutoSize
{
    public function bindValue(Cell $cell, $value)
    {
        $cell->setValueExplicit($value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        return true;
    }

    public function view(): View
    {
        $anggota = Anggota::all();
        return view('anggota.export', compact('anggota'));
    }
}
