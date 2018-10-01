<?php

namespace App\Exports;

use App\OrderDetails;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderDetailsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            '#',
            'Kode Booking',
            'Jenis Pendaftaran',
            'Status Pekerjaan',
            'Nama Grup',
            'Jenis Tiket',
            'Jumlah Tiket',
            'Transportasi ke Hotel',
            'Created Date',
            'Modified Date'
        ];
    }
    public function collection()
    {
        $orderdetails = OrderDetails::all();
        foreach ($orderdetails as $order) {
            $order->registration_type = $order->registration_type == 1 ? 'Perseorangan' : 'Grup';
        }
        return $orderdetails;
    }
}
