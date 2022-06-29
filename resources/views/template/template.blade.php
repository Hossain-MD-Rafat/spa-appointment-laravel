<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- fontawesome cdn -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <!-- main css -->
    <link rel="stylesheet" href={{ asset('assets/css/style.css') }} />

    <title></title>
  </head>
  <body>
    <header class="container-fluid">
      <div class="logo-img"><img src="logo.png" alt="" /></div>
      <ul class="nav-menu">
        <li>1</li>
        <span></span>
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
        <form action="" class="row mt-5">
          <div class="col-md-7">
            <div class="row">
              <div class="form-group col-md-12" onclick="showDropdown(this)">
                <div class="dropdown-header w-100">
                  <span class="dropdown-icon"
                    ><i class="fas fa-chevron-right"></i
                  ></span>
                  <span class="dropdown-title"
                    >Montag bis Donnerstag a 4 Stunden bis 2 Personen</span
                  >
                </div>
                <div class="dropdown-content">
                  <div class="w-9"></div>
                  <div class="w-90">
                    <li>
                      <input type="radio" name="timeline"/>Zeitraum 1: 10:00 Uhr bis 14 Uhr r
                    </li>
                    <li>
                      <input type="radio" name="timeline"/>Zeitraum 2: 15:00 Uhr bis 19 Uhr
                    </li>
                    <li>
                      <input type="radio" name="timeline"/>Zeitraum 3: 20:00 Uhr bis 00:00 Uhr
                    </li>
                  </div>
                </div>
              </div>
              <!-- <div
                class="form-group col-md-6 additional-person"
                onclick="showDropdown(this)"
              >
                <div class="dropdown-header">
                  <span class="dropdown-icon"
                    ><i class="fas fa-chevron-right"></i
                  ></span>
                  <span class="dropdown-title"
                    >Montag bis Donnerstag a 4 Stunden bis 2 Personen</span
                  >
                </div>
                <div class="dropdown-content">
                  <input type="radio" />Add Extra 1 person
                  <br />
                  <input type="radio" />Add Extra 2 Person
                </div>
              </div> -->
            </div>
          </div>
          <div class="col-md-5"></div>
          <div class="form-group col-md-12 mt-5">
            <input
              class="continue-btn"
              type="submit"
              name=""
              value="JETZT BUCHEN"
            />
          </div>
        </form>
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
      $(document).ready(function () {
        $(".dropdown-content").click((e) => {
          e.stopPropagation();
        });
      });
      function showDropdown(e) {
        e.querySelector(".dropdown-content").classList.toggle("show");
      }
    </script>
  </body>
</html>
