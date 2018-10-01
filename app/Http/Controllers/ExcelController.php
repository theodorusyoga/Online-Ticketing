<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DonationsExport;
use App\Exports\VolunteersExport;
use App\Exports\OrderDetailsExport;
use App\Exports\PersonalDataExport;

class ExcelController extends Controller
{
    public function downloadDonations(Request $req){
      return Excel::download(new DonationsExport, 'donations.xlsx');
    }
    public function downloadVolunteers(Request $req){
        return Excel::download(new VolunteersExport, 'volunteers.xlsx');
    }
    public function downloadOrderDetails(Request $req){
        return Excel::download(new OrderDetailsExport, 'orderdetails.xlsx');
    }
    public function downloadPersonalData(Request $req){
        return Excel::download(new PersonalDataExport, 'personaldata.xlsx');
    }
}
