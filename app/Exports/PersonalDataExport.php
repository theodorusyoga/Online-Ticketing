<?php

namespace App\Exports;

use App\PersonalData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersonalDataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            '#',
            'Kode Booking',
            'KTP/Kartu Pelajar',
            'File KTP/Kartu Pelajar',
            'Nama Lengkap',
            'Email',
            'Nomor HP',
            'Provinsi',
            'Kota',
            'Umur',
            'Created Date',
            'Modified Date'
        ];
    }
    public function collection()
    {
        $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] ;
        $personaldata = PersonalData::all();
        foreach ($personaldata as $data) {
            $data->identity_card_photo = str_replace('/storage/', '/storage/app/public/', $data->identity_card_photo);
            $data->identity_card_photo =  $root . $data->identity_card_photo;
        }
        return $personaldata;
    }
}
