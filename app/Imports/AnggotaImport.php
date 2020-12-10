<?php

namespace App\Imports;

use App\Anggota;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AnggotaImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if ($key == 0) {
                continue;
            }
            set_time_limit(0);

            $data = [
                'nama'  => $row[1],
                'nim'   => $row[2],
                'nia'   => $row[3],
            ];

            $anggota = Anggota::where('nia', $row[3])->first();

            if ($anggota) {
                $anggota->update($data);
            } else {
                $data['foto'] = 'public/noavatar.jpg';
                Anggota::create($data);
            }
        }
    }
}
