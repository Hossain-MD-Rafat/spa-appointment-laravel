<link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/png">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>

<?php $total = 0; ?>
<div class="page-container hidden-on-narrow">
    <div class="pdf-page size-a4">
        <page size="A4">
            <!-- PDF CONTENT START -->
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h4>Buchungsdaten</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <div>
                                    <strong>{{ isset($data['firstname']) && isset($data['lastname']) ? $data['firstname'] . ' ' . $data['lastname'] : '' }}</strong>
                                </div>
                                <div><small>Telefon : {{ isset($data['phone']) ? $data['phone'] : '' }}</small></div>
                                <div><small>Email : {{ isset($data['email']) ? $data['email'] : '' }}</small></div>
                                <div><small>Geburtsdatum : {{ isset($data['dob']) ? $data['dob'] : '' }}</small></div>
                                @if (isset($data['message']))
                                    <div><small>Nachricht :
                                            {{ isset($data['message']) ? $data['message'] : '' }}</small></div>
                                @endif

                            </div>
                        </div>
                        <div class="table-responsive-sm  table-bordered">
                            <table class="table table-striped ">
                                {{-- <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Item Details</th>
                                        <th class="right">Amount</th>
                                    </tr>
                                </thead> --}}
                                <tbody>
                                    <tr>
                                        <td class="center">Paket : {{ $data['package_name'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="center">Zeit : {{ $data['time'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="center">Paketgeb??hr : {{ $data['package_charge'] }}???</td>
                                        <?php $total += $data['package_charge']; ?>
                                    </tr>
                                    @if (isset($data['extra_person']))
                                        <tr>
                                            <td class="center">Zus??tzliche Personen : {{ $data['extra_person'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="center">Geb??hr f??r zus??tzliche Personen :
                                                {{ $data['extra_person_charge'] }}???</td>
                                        </tr>
                                        <?php $total += $data['extra_person_charge'] * $data['extra_person']; ?>
                                    @endif
                                    @if (isset($data['extra_booking']))
                                        <tr>
                                            <td class="center">Zus??tzliche Buchung : {{ $data['extra_booking'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="center">Zus??tzliche Buchungsgeb??hr :
                                                {{ $data['extra_booking_charge'] }}???</td>
                                        </tr>
                                        <?php $total += $data['extra_booking_charge']; ?>
                                    @endif
                                    <tr>
                                        <td class="center">Mehrwersteuer : {{ $data['vat'] }}???</td>
                                        <?php $total += $data['vat']; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5">
                            </div>
                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table  table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="left">
                                                <strong>Gesamt</strong>
                                            </td>
                                            <td class="right">
                                                <strong><?= $total ?>???</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PDF CONTENT END -->
        </page>
    </div>
</div>

<script>
    function getPDF(selector) {
        kendo.drawing.drawDOM($(selector)).then(function(group) {
            kendo.drawing.pdf.saveAs(group, 'report.pdf');
        });
    }
</script>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Montserrat', sans-serif;
    }

    page[size="A4"] {
        width: 790px;
        height: 1000px;
    }

    page {
        background: white;
        display: block;
        margin: 0 auto;
    }

    .pdf-page {
        font-family: "DejaVu Sans", "Arial", sans-serif;
    }
</style>
