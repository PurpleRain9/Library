<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About</title>
    @include('userpage.css')
  </head>
  <body>
    {{-- Header Start --}}
    @include('userpage.header')
    {{-- Header End --}}

    <main>
      <section class="about-page-section">
        <div class="about-page-div container-fluid">
          <h2 class="text-center">ABOUT US</h2>
          <p class="text-center">
            <a href="{{url('/')}}" class="ms-1">Home</a>
            /
            <a href="{{url('/user-about')}}" class="text-dark">About</a>
          </p>
        </div>
        <div class="about-IandC container">
          <div class="row">
            <img src="/images/blog-5.jpg" class="col-md-6" alt="" />
            <div class="col-md-6">
              <h3 class="text-center">Since 2025</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Inventore quasi veniam molestiae excepturi eaque fuga facilis,
                porro error eum quae ducimus unde, fugit consequatur commodi
                deleniti ex dolorum tempora officiis.
              </p>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Numquam, sint commodi ab unde eligendi, magnam illo corporis
                corrupti obcaecati modi accusantium eum consequatur? Tenetur
                vero odit, porro mollitia amet soluta.
              </p>
              <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae
                mollitia ab voluptatibus minus iste eligendi, saepe architecto
                illum vero quia vitae libero reiciendis exercitationem veniam et
                sint impedit magnam repudiandae.
              </p>
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim
                eligendi ducimus, sit rem minus iusto ut, quos tenetur
                doloremque possimus atque ex, assumenda fugiat! Quam minus
                voluptas dignissimos numquam labore.
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>
    {{-- Footer Start --}}
    @include('userpage.footer')
    {{-- Footer End --}}
    @include('userpage.script')
  </body>
</html>
