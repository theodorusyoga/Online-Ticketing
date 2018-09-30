<?php

namespace App\Exports;

use App\Volunteer;
use App\UserType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VolunteersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            '#',
            'Nama Lengkap',
            'Email',
            'Nomor HP',
            'Bergabung Sebagai',
            'Created Date',
            'Modified Date'
        ];
    }
    public function collection()
    {
        $volunteers = Volunteer::all();
        foreach ($volunteers as $volunteer) {
            $volunteer->usertypeid = UserType::where('id', $volunteer->usertypeid)->first()->type;
        }
        return $volunteers;
    }
}
