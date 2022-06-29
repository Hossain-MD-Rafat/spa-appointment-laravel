<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
                        $data['time'] = "Zeitraum 1: 10:00 Uhr bis 14 Uhr r";
                        $data['vat'] = 30.40;
                        $data['package_charge'] = 160;
                        break;
                    case 'a-2':
                        $data['package_name'] = "Montag bis Donnerstag a 4 Stunden bis 2 Personen";
                        $data['time'] = "Zeitraum 2: 15:00 Uhr bis 19 Uhr";
                        $data['vat'] = 30.40;
                        $data['package_charge'] = 160;
                        break;
                    case 'a-3':
                        $data['package_name'] = "Montag bis Donnerstag a 4 Stunden bis 2 Personen";
                        $data['time'] = "Zeitraum 3: 20:00 Uhr bis 00:00 Uhr";
                        $data['vat'] = 30.40;
                        $data['package_charge'] = 160;
                        break;
                    case 'b-1':
                        $data['package_name'] = "Freitag bis Sonntag / Feiertage a 4 Stunden bis 2 Personen";
                        $data['time'] = "Zeitraum 1: 10:00 Uhr bis 14 Uhr r";
                        $data['vat'] = 35.15;
                        $data['package_charge'] = 185;
                        break;
                    case 'b-2':
                        $data['package_name'] = "Freitag bis Sonntag / Feiertage a 4 Stunden bis 2 Personen";
                        $data['time'] = "Zeitraum 2: 15:00 Uhr bis 19 Uhr";
                        $data['vat'] = 35.15;
                        $data['package_charge'] = 185;
                        break;
                    case 'b-3':
                        $data['package_name'] = "Freitag bis Sonntag / Feiertage a 4 Stunden bis 2 Personen";
                        $data['time'] = "Zeitraum 3: 20:00 Uhr bis 00:00 Uhr";
                        $data['vat'] = 35.15;
                        $data['package_charge'] = 185;
                        break;
                    case 'c-1':
                        $data['package_name'] = "Übernachtung bis zu 2 Personen";
                        $data['time'] = "Montag bis Donnerstag 20 Uhr bis 10 Uhr";
                        $data['vat'] = 43.70;
                        $data['package_charge'] = 230;
                        break;
                    case 'c-2':
                        $data['package_name'] = "Übernachtung bis zu 2 Personen";
                        $data['time'] = "Freitag bis Sonntag / Feiertage 20 Uhr bis 10 Uhr";
                        $data['vat'] = 46.55;
                        $data['package_charge'] = 245;
                        break;
                    default:
                        break;
                }

                if (!empty($req->post('extra_person'))) {
                    switch ($req->post('extra_person')) {
                        case '1':
                            $data['extra_person'] = 1;
                            if ($req->post('timeline') != 'c-1' || $req->post('timeline') != 'c-2') {
                                $data['extra_person_charge'] = 45;
                            } else {
                                $data['extra_person_charge'] = 60;
                            }
                            break;
                        case '2':
                            $data['extra_person'] = 2;
                            if ($req->post('timeline') != 'c-1' || $req->post('timeline') != 'c-2') {
                                $data['extra_person_charge'] = 45;
                            } else {
                                $data['extra_person_charge'] = 60;
                            }
                            break;
                        default:
                            break;
                    }
                }
                if (!empty($req->post('extra_booking'))) {
                    switch ($req->post('extra_booking')) {
                        case '3':
                            $data['extra_booking'] = "1 Bademantel";
                            $data['extra_booking_charge'] = 3;
                            break;
                        case '4':
                            $data['extra_booking'] = "1 Badehandtuch";
                            $data['extra_booking_charge'] = 2;
                            break;
                        case '5':
                            $data['extra_booking'] = "Weiteres Getränke Paket ( 1 Flasche Wasser, 1 Saft, 1 Softgetränk)";
                            $data['extra_booking_charge'] = 6;
                            break;
                        default:
                            break;
                    }
                }
                session()->put('data', $data);
                return view('form');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something was wrong');
        }
    }
    public function handleUser(Request $req)
    {
        if(true){
            return view('thankyou');
        }
        

        // try {
        //     $validator = Validator::make($req->all(), [
        //         'firstname' => 'required',
        //         'lastname' => 'required',
        //         'email' => 'email:rfc,dns',
        //         'phone' => 'required',
        //         'dob' => 'required',
        //     ]);
        //     if ($validator->fails()) {
        //         return redirect()->back()->withErrors($validator->errors());
        //     } else {
        //         return view('thankyou');
        //     }
        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', 'Something was wrong');
        // }
    }
}
