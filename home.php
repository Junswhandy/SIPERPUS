<!--HTML TAG-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
    <!--Akhir Bootstrap-->

    <!--Js-->
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
      integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
      crossorigin="anonymous"
    ></script>
    <script src="bootstrap.bundle.min.js"></script>
    <scripts src="bootstrap.min.js"></scripts>

    <!--AKHIR JAVA SCRIPT-->

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!--AKHIR   CSS-->

    
  </head>
  <body>
    <!--Slider-->
    <section class="jumbotron text-center" style="padding-top: 2rem; z-index:998;">
      <div
        style="padding-top: 2rem"
        id="carouselExampleIndicators"
        class="carousel slide"
        data-ride="carousel"
      >
        <ol class="carousel-indicators">
          <li
            data-target="#carouselExampleIndicators"
            data-slide-to="0"
            class="active"
          ></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/BANNER1.png" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="images/BANNER1.png" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="images/BANNER1.png" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="images/BANNER1.png" class="d-block w-100" alt="..." />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-target="#carouselExampleIndicators"
          data-slide="prev"
        >
          <span
            class="carousel-control-prev-icon bg-dark"
            aria-hidden="true"
          ></span>
          <span class="sr-only">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-target="#carouselExampleIndicators"
          data-slide="next"
        >
          <span
            class="carousel-control-next-icon bg-dark"
            aria-hidden="true"
          ></span>
          <span class="sr-only">Next</span>
        </button>
      </div>
    </section>
    <!--ujung Slider-->

    <!--News-->
    <section id="news">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>News</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="images/komputer1.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Libero exercitationem vel eos ex, voluptatum excepturi quos
                  ipsam, consequuntur vitae debitis nostrum animi, veritatis
                  enim sit optio itaque sunt dolorum blanditiis.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="images/komputer1.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet
                  mollitia error minus nam esse iusto ipsa reiciendis soluta,
                  quae atque dolorem illo architecto ullam vel consequuntur
                  corrupti aliquid dignissimos adipisci.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="images/komputer1.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-text">
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Facere quos obcaecati hic dolor itaque qui vero odio id
                  explicabo in optio, unde quae officia reprehenderit rem
                  libero, error voluptatem. Maiores.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Akhir News-->

    
  </body>
</html>
