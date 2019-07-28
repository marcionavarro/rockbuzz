<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
  </head>

  <body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <h1><a class="navbar-brand" href="{{ url('/') }}">RockBuzz</a></h1>
        </div>

        <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>

          <ul class="nav nav-navbar">
            <li class="nav-item">
              <a class="nav-link" href="#">Demos <span class="arrow"></span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="#">Blog <span class="arrow"></span></a>
              <nav class="nav">
                <a class="nav-link" href="../blog/classic.html">Classic</a>
                <a class="nav-link" href="../blog/grid.html">Grid</a>
                <a class="nav-link" href="../blog/list.html">List</a>
                <a class="nav-link" href="../blog/sidebar.html">Sidebar</a>
                <div class="nav-divider"></div>
                <a class="nav-link active" href="../blog/post-1.html">Post 1</a>
                <a class="nav-link" href="../blog/post-2.html">Post 2</a>
              </nav>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Shop <span class="arrow"></span></a>
              <nav class="nav">
                <a class="nav-link" href="../shop/list.html">List</a>
                <a class="nav-link" href="../shop/item.html">Item</a>
                <a class="nav-link" href="../shop/cart.html">Cart</a>
                <a class="nav-link" href="../shop/checkout.html">Checkout</a>
              </nav>
            </li>

            <li class="nav-item nav-mega">
              <a class="nav-link" href="#">Blocks <span class="arrow"></span></a>
              <nav class="nav px-lg-2 py-lg-4">
                <div class="container-fluid">
                  <div class="row">

                    <div class="col-lg">
                      <nav class="nav flex-column">
                        <a class="nav-link" href="../block/blog.html">Blog</a>
                        <a class="nav-link" href="../block/career.html">Career</a>
                        <a class="nav-link" href="../block/contact.html">Contact</a>
                        <a class="nav-link" href="../block/content.html">Content</a>
                        <a class="nav-link" href="../block/counter.html">Counter</a>
                        <a class="nav-link" href="../block/cover.html">Cover</a>
                        <a class="nav-link" href="../block/cta.html">Call to action</a>
                        <a class="nav-link" href="../block/download.html">Download</a>
                        <a class="nav-link" href="../block/explore.html">Explore</a>
                        <a class="nav-link" href="../block/faq.html">FAQ</a>
                      </nav>
                    </div>

                    <div class="col-lg">
                      <nav class="nav flex-column">
                        <a class="nav-link" href="../block/feature-text.html">Feature textual</a>
                        <a class="nav-link" href="../block/feature.html">Feature</a>
                        <a class="nav-link" href="../block/footer.html">Footer</a>
                        <a class="nav-link" href="../block/gallery.html">Gallery</a>
                        <a class="nav-link" href="../block/header.html">Header</a>
                        <a class="nav-link" href="../block/map.html">Map</a>
                        <a class="nav-link" href="../block/modal.html">Modal</a>
                        <a class="nav-link" href="../block/offcanvas.html">Offcanvas</a>
                        <a class="nav-link" href="../block/partner.html">Partner</a>
                        <a class="nav-link" href="../block/popup.html">Popup</a>
                      </nav>
                    </div>

                    <div class="col-lg">
                      <nav class="nav flex-column">
                        <a class="nav-link" href="../block/portfolio.html">Portfolio</a>
                        <a class="nav-link" href="../block/pricing.html">Pricing</a>
                        <a class="nav-link" href="../block/process.html">Process</a>
                        <a class="nav-link" href="../block/service.html">Service</a>
                        <a class="nav-link" href="../block/shop.html">Shop</a>
                        <a class="nav-link" href="../block/signup.html">Signup</a>
                        <a class="nav-link" href="../block/subscribe.html">Subscribe</a>
                        <a class="nav-link" href="../block/team.html">Team</a>
                        <a class="nav-link" href="../block/testimonial.html">Testimonial</a>
                        <a class="nav-link" href="../block/video.html">Video</a>
                      </nav>
                    </div>

                  </div>
                </div>
              </nav>
            </li>

            <li class="nav-item nav-mega">
              <a class="nav-link" href="#">UI Kit <span class="arrow"></span></a>
              <nav class="nav px-lg-2 py-lg-4">
                <div class="container-fluid">
                  <div class="row">

                    <div class="col-lg-3">
                      <nav class="nav flex-column">
                        <a class="nav-link" href="../uikit/accordion.html">Accordion</a>
                        <a class="nav-link" href="../uikit/alert.html">Alert</a>
                        <a class="nav-link" href="../uikit/badge.html">Badge</a>
                        <a class="nav-link" href="../uikit/button.html">Button</a>
                        <a class="nav-link" href="../uikit/card.html">Card</a>
                        <a class="nav-link" href="../uikit/color.html">Colors</a>
                        <a class="nav-link" href="../uikit/constellation.html">Constellation</a>
                        <a class="nav-link" href="../uikit/content.html">Content</a>
                        <a class="nav-link" href="../uikit/countdown.html">Count down</a>
                        <a class="nav-link" href="../uikit/countup.html">Count up</a>
                      </nav>
                    </div>

                    <div class="col-lg-3">
                      <nav class="nav flex-column">
                        <a class="nav-link" href="../uikit/dropdown.html">Dropdown</a>
                        <a class="nav-link" href="../uikit/form.html">Form</a>
                        <a class="nav-link" href="../uikit/gallery.html">Gallery</a>
                        <a class="nav-link" href="../uikit/granim.html">Granim</a>
                        <a class="nav-link" href="../uikit/icon.html">Icon</a>
                        <a class="nav-link" href="../uikit/image.html">Image</a>
                        <a class="nav-link" href="../uikit/lightbox.html">Lightbox</a>
                        <a class="nav-link" href="../uikit/map.html">Map</a>
                        <a class="nav-link" href="../uikit/misc.html">Miscellaneous</a>
                        <a class="nav-link" href="../uikit/modal.html">Modal</a>
                      </nav>
                    </div>

                    <div class="col-lg-3">
                      <nav class="nav flex-column">
                        <a class="nav-link" href="../uikit/nav.html">Nav</a>
                        <a class="nav-link" href="../uikit/navbar.html">Navbar</a>
                        <a class="nav-link" href="../uikit/offcanvas.html">Offcanvas</a>
                        <a class="nav-link" href="../uikit/overlay.html">Overlay</a>
                        <a class="nav-link" href="../uikit/popup.html">Popup</a>
                        <a class="nav-link" href="../uikit/pricing.html">Pricing</a>
                        <a class="nav-link" href="../uikit/process.html">Process</a>
                        <a class="nav-link" href="../uikit/progress.html">Progress</a>
                        <a class="nav-link" href="../uikit/scroll.html">Scroll</a>
                        <a class="nav-link" href="../uikit/section.html">Section</a>
                      </nav>
                    </div>

                    <div class="col-lg-3">
                      <nav class="nav flex-column">
                        <a class="nav-link" href="../uikit/shuffle.html">Shuffle</a>
                        <a class="nav-link" href="../uikit/slider.html">Slider</a>
                        <a class="nav-link" href="../uikit/social.html">Social</a>
                        <a class="nav-link" href="../uikit/tab.html">Tab</a>
                        <a class="nav-link" href="../uikit/table.html">Table</a>
                        <a class="nav-link" href="../uikit/topbar.html">Topbar</a>
                        <a class="nav-link" href="../uikit/typing.html">Typing</a>
                        <a class="nav-link" href="../uikit/typography.html">Typography</a>
                        <a class="nav-link" href="../uikit/utility.html">Utility</a>
                        <a class="nav-link" href="../uikit/video.html">Video</a>
                      </nav>
                    </div>

                  </div>
                </div>
              </nav>
            </li>

          </ul>
        </section>

        <a class="btn btn-xs btn-round btn-success" href="https://themeforest.net/item/thesaas-responsive-bootstrap-saas-software-webapp-template/19778599?license=regular&open_purchase_for_item_id=19778599&purchasable=source&ref=thethemeio">Buy Now</a>

      </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
        @yield('header')
    <!-- /.header -->


    <!-- Main Content -->
    @yield('content')


    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-6 col-lg-3">
            <a href="../index.html"><img src="../assets/img/logo-dark.png" alt="logo"></a>
          </div>

          <div class="col-6 col-lg-3 text-right order-lg-last">
            <div class="social">
              <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
              <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
              <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
              <a class="nav-link" href="../uikit/index.html">Elements</a>
              <a class="nav-link" href="../block/index.html">Blocks</a>
              <a class="nav-link" href="../page/about-1.html">About</a>
              <a class="nav-link" href="../blog/grid.html">Blog</a>
              <a class="nav-link" href="../page/contact-1.html">Contact</a>
            </div>
          </div>

        </div>
      </div>
    </footer><!-- /.footer -->


    <!-- Scripts -->
    <script src="{{ asset('js/page.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

  </body>
</html>
