<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Byte CLoud RMS - @yield('maintitle', 'Home')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/simple-datatables/style.css') }} " rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/assets/css/style.css') }} " rel="stylesheet">

    <!-- FontAwesome 6.2.0 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- (Optional) Use CSS or JS implementation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        tr {
            text-align: center;
        }
    </style>

</head>

<body>

    @include('admin.partials.header')
    @include('admin.partials.sidebar')



    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">@yield('title')</a></li>
                    <li class="breadcrumb-item active">@yield('subtitle')</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">

            @yield('content')


        </section>
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>ByteCloud Restraunt</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a class="footer-link" href="https://www.nzdevelopers.com/">ByteCloud Developers</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/assets/vendor/apexcharts/apexcharts.min.js') }} "></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('/assets/vendor/chart.js/chart.min.js') }} "></script>
    <script src="{{ asset('/assets/vendor/echarts/echarts.min.js') }} "></script>
    <script src="{{ asset('/assets/vendor/quill/quill.min.js') }} "></script>
    <script src="{{ asset('/assets/vendor/simple-datatables/simple-datatables.js') }} "></script>
    <script src="{{ asset('/assets/vendor/tinymce/tinymce.min.js') }} "></script>
    <script src="{{ asset('/assets/vendor/php-email-form/validate.js') }} "></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/assets/js/main.js') }} "></script>

    <script>
        // Get the reference to the div element
        const myDiv = document.getElementById("alert");

        // Hide the div after 3 seconds
        setTimeout(() => {
            myDiv.style.display = "none";
        }, 3000);
    </script>


</body>

</html>
