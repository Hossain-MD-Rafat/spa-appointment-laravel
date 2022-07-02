<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- main css -->
    <link rel="stylesheet" href={{ asset('assets/css/style.css') }} />

    <title></title>
</head>

<body>
    <header class="container-fluid">
        <div class="logo-img"><a href="{{route('home')}}"><img src="{{asset('assets/images/logo.png')}}" alt="" /></a></div>
        <ul class="nav-menu">
            <li class="phase-active">1</li>
            <span class="line-active"></span>
            <li>2</li>
            <span></span>
            <li>3</li>
        </ul>
    </header>

    <section class="container form-section">
        <div class="form-div">
            <h2>AUSZEIT BUCHEN</h2>
            <h4>
                Buche jetzt Deine ganz persönliche Suite zu Deinem Wunschtermin.
            </h4>
            <form action="{{ route('submit_appointment') }}" method="POST" class="row mt-5">
                @csrf
                <div class="col-md-7">
                    <div class="row">
                        <div class="form-group col-md-12 mb-2" onclick="showDropdown(this)">
                            <div class="dropdown-header w-100">
                                <span class="dropdown-icon"><i class="fas fa-chevron-right"></i></span>
                                <span class="dropdown-title">Montag bis Donnerstag a 4 Stunden bis 2 Personen</span>
                            </div>
                            <div class="dropdown-content">
                                <div class="w-9"></div>
                                <div class="w-90">
                                    <li>
                                        <input type="radio" name="timeline" required value="a-1"
                                            onchange="showAdditionalPerson(this)" />Zeitraum 1: 10:00 Uhr bis 14 Uhr
                                    </li>
                                    <li>
                                        <input type="radio" name="timeline" required value="a-2"
                                            onchange="showAdditionalPerson(this)" />Zeitraum 2: 15:00 Uhr bis 19 Uhr
                                    </li>
                                    <li>
                                        <input type="radio" name="timeline" required value="a-3"
                                            onchange="showAdditionalPerson(this)" />Zeitraum 3: 20:00 Uhr bis 00:00 Uhr
                                    </li>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12 mt-2 mb-2" onclick="showDropdown(this)">
                            <div class="dropdown-header w-100">
                                <span class="dropdown-icon"><i class="fas fa-chevron-right"></i></span>
                                <span class="dropdown-title">Freitag bis Sonntag / Feiertage a 4 Stunden bis 2 Personen</span>
                            </div>
                            <div class="dropdown-content">
                                <div class="w-9"></div>
                                <div class="w-90">
                                    <li>
                                        <input type="radio" name="timeline" required value="b-1"
                                            onchange="showAdditionalPerson(this)" />Zeitraum 1: 10:00 Uhr bis 14 Uhr
                                    </li>
                                    <li>
                                        <input type="radio" name="timeline" required value="b-2"
                                            onchange="showAdditionalPerson(this)" />Zeitraum 2: 15:00 Uhr bis 19 Uhr
                                    </li>
                                    <li>
                                        <input type="radio" name="timeline" required value="b-3"
                                            onchange="showAdditionalPerson(this)" />Zeitraum 3: 20:00 Uhr bis 00:00 Uhr
                                    </li>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12 mt-2 mb-2" onclick="showDropdown(this)">
                            <div class="dropdown-header w-100">
                                <span class="dropdown-icon"><i class="fas fa-chevron-right"></i></span>
                                <span class="dropdown-title">Übernachtung bis zu 2 Personen</span>
                            </div>
                            <div class="dropdown-content">
                                <div class="w-9"></div>
                                <div class="w-90">
                                    <li>
                                        <input type="radio" name="timeline" required value="c-1"
                                            onchange="showAdditionalPerson(this)" />Montag bis Donnerstag 20 Uhr bis 10
                                        Uhr
                                    </li>
                                    <li>
                                        <input type="radio" name="timeline" required value="c-2"
                                            onchange="showAdditionalPerson(this)" />Freitag bis Sonntag / Feiertage 20
                                        Uhr bis 10 Uhr
                                    </li>
                                </div>
                            </div>
                        </div>
                        {{-- hide --}}
                        <div class="form-group col-md-12 mt-2 mb-2 disable-option" onclick="showDropdown(this)"
                            id="additional-person">
                            <div class="dropdown-header w-100">
                                <span class="dropdown-icon"><i class="fas fa-chevron-right"></i></span>
                                <span class="dropdown-title">Zusätzliche Person</span>
                            </div>
                            <div class="dropdown-content">
                                <div class="w-9"></div>
                                <div class="w-90">
                                    <li>
                                        <input type="radio" name="extra_person" value="1"
                                            onchange="showAdditionalBookings(this)" />Buchen Sie für 1 Person extra
                                    </li>
                                    <li>
                                        <input type="radio" name="extra_person" value="2"
                                            onchange="showAdditionalBookings(this)" />Buchen Sie für 2 Personen
                                        zusätzlich
                                    </li>
                                </div>
                            </div>
                        </div>
                        {{-- hide --}}
                        <div class="form-group col-md-12 mt-2 mb-2 disable-option" onclick="showDropdown(this)"
                            id="additional-booking">
                            <div class="dropdown-header w-100">
                                <span class="dropdown-icon"><i class="fas fa-chevron-right"></i></span>
                                <span class="dropdown-title">Zusätzliche Buchungen</span>
                            </div>
                            <div class="dropdown-content">
                                <div class="w-9"></div>
                                <div class="w-90">
                                    <li>
                                        <input type="radio" name="extra_booking"
                                            onchange="showAdditionalBookings(this)" value="3" />1 Bademantel (3
                                        Euro)
                                    </li>
                                    <li>
                                        <input type="radio" name="extra_booking"
                                            onchange="showAdditionalBookings(this)" value="4" />1 Badehandtuch (2
                                        Euro)
                                    </li>
                                    <li>
                                        <input type="radio" name="extra_booking"
                                            onchange="showAdditionalBookings(this)" value="5" />Weiteres Getränke Paket ( 1 Flasche Wasser, 1 Saft, 1 Softgetränk) (6 Euro)
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="right-calculation">
                        <span class="calculation-row" id="package">Paket: <span class="value">Nicht
                                vergeben</span>
                        </span>
                        <span class="calculation-row d-none" id="time">Zeit: <span class="value">Nicht
                                vergeben</span>
                        </span>
                        <span class="calculation-row" id="extra-person">Zusätzliche Personen: <span class="value">0</span>
                        </span>
                        <span class="calculation-row" id="additional-booking">Zusätzliche Buchung: <span
                                class="value">Nicht vergeben</span> </span>
                        <span class="calculation-row" id="vat">Mehrwersteuer: <span class="value">0</span>€
                        </span>
                        <hr class="w-100">
                        <span class="calculation-row-total" id="total">Gesamt: <span
                                class="value">0</span>€</span>
                    </div>
                </div>
                <div class="form-group col-md-12 z-index mt-5 mb-5 disable-option" id="continue-btn">
                    <input class="continue-btn" type="submit" name="" value="JETZT BUCHEN" />
                </div>
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
        let package = '';
        let total = 0;
        let addtional_person = 0;
        let addtional_booking = "Nicht vergeben";
        let additional_amount_person = 0;
        let additional_amount_booking = 0;
        let additional_amount = 0;
        $(document).ready(function() {
            $(".dropdown-content").click((e) => {
                e.stopPropagation();
            });
        });

        function showDropdown(e) {
            e.querySelector(".dropdown-content").classList.toggle("show");
            let arrow = e.querySelector(".dropdown-header .fas");
            if (arrow.classList.contains('fa-chevron-right')) {
                arrow.classList.remove('fa-chevron-right');
                arrow.classList.add('fa-chevron-down');
            } else if (arrow.classList.contains('fa-chevron-down')) {
                arrow.classList.remove('fa-chevron-down');
                arrow.classList.add('fa-chevron-right');
            }
        }

        function showAdditionalPerson(e) {
            let element = document.getElementById('additional-person');
            let btn = document.getElementById('continue-btn');
            if (element.classList.contains('disable-option')) {
                element.classList.remove('disable-option');
            }
            if (btn.classList.contains('disable-option')) {
                btn.classList.remove('disable-option');
            }
            let element1 = document.getElementById('additional-booking');
            if (element1.classList.contains('disable-option')) {
                element1.classList.remove('disable-option');
            }
            package = e.value;
            switch (e.value) {
                case 'a-1':
                    $('#package .value').text("Montag bis Donnerstag a 4 Stunden bis 2 Personen");
                    $('#time .value').text("Zeitraum 1: 10:00 Uhr bis 14 Uhr r");
                    $('#time').removeClass('d-none');
                    $('#vat .value').text(30.40);
                    $('#extra-person .value').text(addtional_person);
                    $('#additional-booking .value').text(addtional_booking);
                    total = 30.40 + 160;
                    $('#total .value').text(total + additional_amount);
                    break;
                case 'a-2':
                    $('#package .value').text("Montag bis Donnerstag a 4 Stunden bis 2 Personen");
                    $('#time .value').text("Zeitraum 2: 15:00 Uhr bis 19 Uhr");
                    $('#time').removeClass('d-none');
                    $('#vat .value').text(30.40);
                    $('#extra-person .value').text(addtional_person);
                    $('#additional-booking .value').text(addtional_booking);
                    total = 30.40 + 160;
                    $('#total .value').text(total + additional_amount);
                    break;
                case 'a-3':
                    $('#package .value').text("Montag bis Donnerstag a 4 Stunden bis 2 Personen");
                    $('#time .value').text("Zeitraum 3: 20:00 Uhr bis 00:00 Uhr");
                    $('#time').removeClass('d-none');
                    $('#vat .value').text(30.40);
                    $('#extra-person .value').text(addtional_person);
                    $('#additional-booking .value').text(addtional_booking);
                    total = 30.40 + 160;
                    $('#total .value').text(total + additional_amount);
                    break;
                case 'b-1':
                    $('#package .value').text("Freitag bis Sonntag / Feiertage a 4 Stunden bis 2 Personen");
                    $('#time .value').text("Zeitraum 1: 10:00 Uhr bis 14 Uhr r");
                    $('#time').removeClass('d-none');
                    $('#vat .value').text(35.15);
                    $('#extra-person .value').text(addtional_person);
                    $('#additional-booking .value').text(addtional_booking);
                    total = 35.15 + 185;
                    $('#total .value').text(total + additional_amount);
                    break;
                case 'b-2':
                    $('#package .value').text("Freitag bis Sonntag / Feiertage a 4 Stunden bis 2 Personen");
                    $('#time .value').text("Zeitraum 2: 15:00 Uhr bis 19 Uhr");
                    $('#time').removeClass('d-none');
                    $('#vat .value').text(35.15);
                    $('#extra-person .value').text(addtional_person);
                    $('#additional-booking .value').text(addtional_booking);
                    total = 35.15 + 185;
                    $('#total .value').text(total + additional_amount);
                    break;
                case 'b-3':
                    $('#package .value').text("Freitag bis Sonntag / Feiertage a 4 Stunden bis 2 Personen");
                    $('#time .value').text("Zeitraum 3: 20:00 Uhr bis 00:00 Uhr");
                    $('#time').removeClass('d-none');
                    $('#vat .value').text(35.15);
                    $('#extra-person .value').text(addtional_person);
                    $('#additional-booking .value').text(addtional_booking);
                    total = 35.15 + 185;
                    $('#total .value').text(total + additional_amount);
                    break;
                case 'c-1':
                    $('#package .value').text("Übernachtung bis zu 2 Personen");
                    $('#time .value').text("Montag bis Donnerstag 20 Uhr bis 10 Uhr");
                    $('#time').removeClass('d-none');
                    $('#vat .value').text(43.70);
                    $('#extra-person .value').text(addtional_person);
                    $('#additional-booking .value').text(addtional_booking);
                    total = 35.15 + 230;
                    $('#total .value').text(total + additional_amount);
                    break;
                case 'c-2':
                    $('#package .value').text("Übernachtung bis zu 2 Personen");
                    $('#time .value').text("Freitag bis Sonntag / Feiertage 20 Uhr bis 10 Uhr");
                    $('#time').removeClass('d-none');
                    $('#vat .value').text(46.55);
                    $('#extra-person .value').text(addtional_person);
                    $('#additional-booking .value').text(addtional_booking);
                    total = 46.55 + 245;
                    $('#total .value').text(total + additional_amount);
                    break;
                default:
                    break;
            }
        }

        function showAdditionalBookings(e) {
            switch (e.value) {
                case '1':
                    if (package && (package != 'c-1' || package != 'c-2')) {
                        $('#extra-person .value').text(1);
                        additional_amount -= additional_amount_person;
                        additional_amount += 45;
                        additional_amount_person = 45;
                        $('#total .value').text(total + additional_amount);
                    } else {
                        $('#extra-person .value').text(1);
                        additional_amount -= additional_amount_person;
                        additional_amount += 60;
                        additional_amount_person = 60;
                        $('#total .value').text(total + additional_amount);
                    }
                    break;
                case '2':
                    if (package && (package != 'c-1' || package != 'c-2')) {
                        $('#extra-person .value').text(2);
                        additional_amount -= additional_amount_person;
                        additional_amount += 45 * 2;
                        additional_amount_person = 45 * 2;
                        $('#total .value').text(total + additional_amount);
                    } else {
                        $('#extra-person .value').text(2);
                        additional_amount -= additional_amount_person;
                        additional_amount += 60 * 2;
                        additional_amount_person = 60 * 2;
                        $('#total .value').text(total + additional_amount);
                    }
                    break;
                case '3':
                    additional_booking = "1 Bademantel (3 Euro)";
                    $('#additional-booking .value').text(additional_booking);
                    additional_amount -= additional_amount_booking;
                    additional_amount += 3;
                    additional_amount_booking = 3;
                    $('#total .value').text(total + additional_amount);
                    break;
                case '4':
                    additional_booking = "1 Badehandtuch (2 Euro)";
                    $('#additional-booking .value').text(additional_booking);
                    additional_amount -= additional_amount_booking;
                    additional_amount += 2;
                    additional_amount_booking = 2;
                    $('#total .value').text(total + additional_amount);
                    break;
                case '5':
                    additional_booking = "Weiteres Getränke Paket ( 1 Flasche Wasser, 1 Saft, 1 Softgetränk) (6 Euro)";
                    $('#additional-booking .value').text(additional_booking);
                    additional_amount -= additional_amount_booking;
                    additional_amount += 6;
                    additional_amount_booking = 6;
                    $('#total .value').text(total + additional_amount);
                    break;
                default:
                    break;
            }
        }
    </script>
</body>

</html>
