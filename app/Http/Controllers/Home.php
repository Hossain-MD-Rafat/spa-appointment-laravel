<?php

namespace App\Http\Controllers;

use App\Mail\SendPdf;
use App\Services\PdfMailService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use PDF;

class Home extends Controller
{
    public function handleAppointment(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'timeline' => 'required',
                'extra_person' => 'numeric',
                'extra_booking' => 'numeric',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            } else {
                $data = array();
                switch ($req->post('timeline')) {
                    case 'a-1':
                        $data['package_name'] = "Montag bis Donnerstag a 4 Stunden bis 2 Personen";
                        $data['time'] = "Zeitraum 1: 10:00 Uhr bis 14 Uhr";
                        $data['vat'] = 31.13;
                        $data['package_charge'] = 163.87;
                        break;
                    case 'a-2':
                        $data['package_name'] = "Montag bis Donnerstag a 4 Stunden bis 2 Personen";
                        $data['time'] = "Zeitraum 2: 15:00 Uhr bis 19 Uhr";
                        $data['vat'] = 31.13;
                        $data['package_charge'] = 163.87;
                        break;
                    case 'a-3':
                        $data['package_name'] = "Montag bis Donnerstag a 4 Stunden bis 2 Personen";
                        $data['time'] = "Zeitraum 3: 20:00 Uhr bis 00:00 Uhr";
                        $data['vat'] = 31.13;
                        $data['package_charge'] = 163.87;
                        break;
                    case 'b-1':
                        $data['package_name'] = "Freitag bis Sonntag / Feiertage a 4 Stunden bis 2 Personen";
                        $data['time'] = "Zeitraum 1: 10:00 Uhr bis 14 Uhr";
                        $data['vat'] = 35.13;
                        $data['package_charge'] = 184.87;
                        break;
                    case 'b-2':
                        $data['package_name'] = "Freitag bis Sonntag / Feiertage a 4 Stunden bis 2 Personen";
                        $data['time'] = "Zeitraum 2: 15:00 Uhr bis 19 Uhr";
                        $data['vat'] = 35.13;
                        $data['package_charge'] = 184.87;
                        break;
                    case 'b-3':
                        $data['package_name'] = "Freitag bis Sonntag / Feiertage a 4 Stunden bis 2 Personen";
                        $data['time'] = "Zeitraum 3: 20:00 Uhr bis 00:00 Uhr";
                        $data['vat'] = 35.13;
                        $data['package_charge'] = 184.87;
                        break;
                    case 'c-1':
                        $data['package_name'] = "Übernachtung bis zu 2 Personen";
                        $data['time'] = "Montag bis Donnerstag 20 Uhr bis 10 Uhr";
                        $data['vat'] = 47.90;
                        $data['package_charge'] = 252.10;
                        break;
                    case 'c-2':
                        $data['package_name'] = "Übernachtung bis zu 2 Personen";
                        $data['time'] = "Freitag bis Sonntag / Feiertage 20 Uhr bis 10 Uhr";
                        $data['vat'] = 54.29;
                        $data['package_charge'] = 285.71;
                        break;
                    default:
                        break;
                }

                if (!empty($req->post('extra_person'))) {
                    switch ($req->post('extra_person')) {
                        case '1':
                            $data['extra_person_charge'] = 30;
                            $data['extra_person'] = 1;
                            break;
                        case '2':
                            $data['extra_person_charge'] = 30;
                            $data['extra_person'] = 2;
                            break;
                        case '3':
                            $data['extra_person_charge'] = 30;
                            $data['extra_person'] = 3;
                            break;
                        case '4':
                            $data['extra_person_charge'] = 30;
                            $data['extra_person'] = 4;
                            break;
                        default:
                            break;
                    }
                }
                if (!empty($req->post('extra_booking'))) {
                    switch ($req->post('extra_booking')) {
                        case '5':
                            $data['extra_booking'] = "1 Bademantel";
                            $data['extra_booking_charge'] = 5;
                            break;
                        case '6':
                            $data['extra_booking'] = "1 Badehandtuch";
                            $data['extra_booking_charge'] = 3;
                            break;
                        case '7':
                            $data['extra_booking'] = "Weiteres Getränke Paket ( 1 Flasche Wasser, 1 Saft, 1 Softgetränk)";
                            $data['extra_booking_charge'] = 6;
                            break;
                        default:
                            break;
                    }
                }
                $data['dateTime'] = $req->post('datetime');
                session()->put('data', $data);
                return view('form');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something was wrong');
        }
    }
    public function handleUser(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'email:rfc,dns',
                'phone' => 'required',
                'dob' => 'required',
            ]);
            if ($validator->fails()) {
                return view('form')->with('errors', $validator->errors());
            } else {
                $data = session()->get('data');
                $data['firstname'] = $req->post('firstname');
                $data['lastname'] = $req->post('lastname');
                $data['email'] = $req->post('email');
                $data['phone'] = $req->post('phone');
                $data['dob'] = $req->post('dob');
                if (!empty($req->post('message'))) {
                    $data['message'] = $req->post('message');
                }
                session()->put('data', $data);
                // $pdf = PDF::loadView('template/invoicepdf', ['data' => $data]);
                // return $pdf->download('trips.pdf');
                $pdfService = new PdfMailService($data);
                $pdfService->sendPdf();
                return view('thankyou');
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
