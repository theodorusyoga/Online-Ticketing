<?php

namespace App\Exports;

use App\Donation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DonationsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            '#',
            'Nama sesuai rekening',
            'Bank',
            'Nominal',
            'Tanggal Transfer',
            'Bukti Transfer',
            'Catatan',
            'Created Date',
            'Modified Date'
        ];
    }
    public function collection()
    {
        $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] ;
        $donations = Donation::all();
        foreach ($donations as $donation) {
            $donation->file = str_replace('/storage/', '/storage/app/public/', $donation->file);
            $donation->file = $root . $donation->file;
        }
        return $donations;
    }
}
