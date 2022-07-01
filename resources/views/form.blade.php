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
        <div class="logo-img"><a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png') }}"
                    alt="" /></a></div>
        <ul class="nav-menu">
            <li class="phase-active">1</li>
            <span class="line-active"></span>
            <li class="phase-active">2</li>
            <span class="line-active"></span>
            <li>3</li>
        </ul>
    </header>

    <section class="container form-section">
        <div class="form-div">
            <form action="submit_form" method="POST" class="row mt-5">
                @csrf
                <div class="col-md-8 offset-md-2">
                    <div class="form-group row">
                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-md-6 res-mb-4">
                            <label class="control-label">Vorname</label>
                            <input type="text" name="firstname" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Nachname</label>
                            <input type="text" name="lastname" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-4 row">
                        <div class="col-md-12">
                            <label class="control-label">Email</label>
                            <input type="email" name="email" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-4 row">
                        <div class="col-md-6 res-mb-4">
                            <label class="control-label">Telefon</label>
                            <input type="text" name="phone" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Geburtsdatum</label>
                            <input type="date" name="dob" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-4 row">
                        <div class="col-md-12">
                            <label class="control-label">Nachricht</label>
                            <textarea name="message" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-8 offset-md-2 mt-5 mb-5">
                    <input class="continue-btn" type="submit" name="form_submit" value="JETZT BUCHEN">
                </div>
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
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

        function showAdditionalPerson() {
            let element = document.getElementById('additional-person');
            if (element.classList.contains('disable-option')) {
                element.classList.remove('disable-option');
            }
        }

        function showAdditionalBookings() {
            let element = document.getElementById('additional-booking');
            if (element.classList.contains('disable-option')) {
                element.classList.remove('disable-option');
            }
        }
    </script>
</body>

</html>
