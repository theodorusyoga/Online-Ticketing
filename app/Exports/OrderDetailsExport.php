<?php

namespace App\Exports;

use App\OrderDetails;
use App\PersonalData;
use App\PaymentData;
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
            'No KTP/Kartu Pelajar (Sesuai Jenis Pekerjaan)',
            'Foto KTP/Kartu Pelajar (Sesuai Jenis Pekerjaan)',
            'Nama Lengkap',
            'Email',
            'Nomor HP',
            'Provinsi',
            'Kabupaten/Kota',
            'Umur',
            'Payment Status',
            'Step 1 Completed Date',
            'Step 2 Completed Date',
            'Payment Completed Date'
        ];
    }
    public function collection()
    {
        $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] ;
        $orderdetails = OrderDetails::all();
        foreach ($orderdetails as $order) {
            $order->registration_type = $order->registration_type == 1 ? 'Perseorangan' : 'Grup';

            // save data
            $created_at = $order->created_at;
            $updated_at = $order->updated_at;

            // unset unnecessary data
            unset($order['created_at']);
            unset($order['updated_at']);

            // get personal data
            $personal = PersonalData::where('user_id', $order->user_id);
            if($personal->count() > 0){
                $personal = $personal->first();
                $order->identity_card = $personal->identity_card;
                $order->identity_card_photo = $root . str_replace('/storage/', '/storage/app/public/', $personal->identity_card_photo);
                $order->fullname = $personal->fullname;
                $order->email = $personal->email;
                $order->phone_number = $personal->phone_number;
                $order->domicile = $personal->domicile;
                $order->domicile_city = $personal->domicile_city;
                $order->age = $personal->age;
            }

            // get payment data
            $payment = PaymentData::where('user_id', $order->user_id);
            if($payment->count() > 0){
                $payment = $payment->first();
                if($payment->status_code == 200){
                    $order->payment_status = 'Completed';
                } else {
                    $order->payment_status = 'Failed';
                }
            } else {
                $order->payment_status = 'Not Yet Paid';
            }

            // set date
            $order->step1_completed = $created_at;
            if($personal->count() > 0){
                $order->step2_completed = $personal->created_at;
            }
            if($payment->count() > 0){
                $order->step3_completed = $payment->created_at;
            }
        }
        return $orderdetails;
    }
}
