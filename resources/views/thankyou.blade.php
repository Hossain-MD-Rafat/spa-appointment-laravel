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
    <style>
        * {
            box-sizing: border-box;
            /* outline:1px solid ;*/
        }

        body {
            background: #ffffff;
            background: linear-gradient(to bottom, #ffffff 0%, #e1e8ed 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#e1e8ed', GradientType=0);
            height: 100%;
            margin: 0;
            background-repeat: no-repeat;
            background-attachment: fixed;

        }

        .wrapper-1 {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .wrapper-2 {
            padding: 30px;
            text-align: center;
        }

        h1 {
            font-family: 'Kaushan Script', cursive;
            font-size: 4em;
            letter-spacing: 3px;
            color: #5892FF;
            margin: 0;
            margin-bottom: 20px;
        }

        .wrapper-2 p {
            margin: 0;
            font-size: 1.3em;
            color: #aaa;
            font-family: 'Source Sans Pro', sans-serif;
            letter-spacing: 1px;
        }

        .go-home {
            text-decoration: none;
            color: #fff;
            background: #5892FF;
            border: none;
            padding: 10px 50px;
            margin: 30px 0;
            border-radius: 30px;
            text-transform: capitalize;
            box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
        }
        .go-home:hover{
            color: #fff;
        }

        .footer-like {
            margin-top: auto;
            background: #D7E6FE;
            padding: 6px;
            text-align: center;
        }

        .footer-like p {
            margin: 0;
            padding: 4px;
            color: #5892FF;
            font-family: 'Source Sans Pro', sans-serif;
            letter-spacing: 1px;
        }

        .footer-like p a {
            text-decoration: none;
            color: #5892FF;
            font-weight: 600;
        }

        @media (min-width:360px) {
            h1 {
                font-size: 4.5em;
            }

            .go-home {
                margin-bottom: 20px;
            }
        }

        @media (min-width:600px) {
            .content {
                max-width: 1000px;
                margin: 0 auto;
            }

            .wrapper-1 {
                height: initial;
                max-width: 620px;
                margin: 0 auto;
                margin-top: 50px;
                box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
            }
        }
    </style>
</head>

<body>
    <header class="container-fluid">
        <div class="logo-img"><a href="http://welltimeprivatespa.de/"><img src="{{asset('assets/images/logo.png')}}" alt="" /></a></div>
        <ul class="nav-menu">
            <li class="phase-active">1</li>
            <span class="line-active"></span>
            <li class="phase-active">2</li>
            <span class="line-active"></span>
            <li class="phase-active">3</li>
        </ul>
    </header>

    <section class="container form-section">
        <div class=content>
            <div class="wrapper-1">
                <div class="wrapper-2">
                    <h1>Vielen Dank!</h1>
                    <p>Vielen Dank für Ihre Terminbuchung</p>
                    <p class="mb-4">Sie sollten bald eine E-Mail erhalten</p>
                    <a class="go-home" href="http://welltimeprivatespa.de/">
                        nach Hause gehen
                    </a>
                </div>
                {{-- <div class="footer-like">
                    <p>E-Mail nicht erhalten?
                        <a href="{{route('home')}}">Buchen Sie einen weiteren Termin</a>
                    </p>
                </div> --}}
            </div>
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
