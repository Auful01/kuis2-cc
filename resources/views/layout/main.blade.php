<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- HEADER -->
    @include('layout.header')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <style>


        .main-footer{
            background-color: #F8C471;
        }
    </style>
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('images/relax.png')}}" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        @include('layout.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4" style="
        background-color: #F8C471;">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{asset('images/relax.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">BeautyCenter</span>
            </a>

            <!-- Sidebar -->
            @include('layout.sidebar')
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" >
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <section class="">
                @yield('content')
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            @yield('modal')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="row d-flex justify-content-around">
                <div class="col-md-2">
                    <h3>BeautyCare</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti quibusdam quaerat, ut magnam natus sapiente quisquam totam odio obcaecati, officiis maxime nemo blanditiis officia eaque? Harum animi perferendis modi aut?</p>
                </div>
                <div class="col-md-2">
                    <h3>Link Populer</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus, animi aliquid tenetur aperiam alias sapiente quos vitae odit quam ex in illum repellat assumenda? Corrupti sed dignissimos doloribus quasi eum.</p>
                </div>
                <style>
                    .nav-black{
                        color: #000000;
                    }
                </style>
                <div class="col-md-2">
                    <h3>Menu</h3>
                    {{-- <ul style=: none"> --}}
                        <a href="" class="nav-black">Home</a><br>
                        <a href="" class="nav-black">About</a><br>
                        <a href="" class="nav-black">Treatments</a><br>
                        <a href="" class="nav-black">Reservasi</a><br>
                        <a href="" class="nav-black">Contact</a><br>
                    {{-- </ul> --}}
                </div>
                <div class="col-md-2">
                    <h3>Ajukan Pertanyaan</h3>
                    <div class="row d-flex justify-content-around">
                        <div class="col-md-2">
                            <i class="fas fa-location-arrow"></i>
                        </div>
                        <div class="col-md-10">
                            Jl. Sumpah Pemuda III Kota Malang
                        </div>
                        <div class="col-md-2">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="https://wa.me/6285466721345" class="nav-black">085466721345</a>
                        </div>
                        <div class="col-md-2">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="col-md-10">
                            beautycare@gmail.com
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('layout.js')
    <!-- JS -->
</body>

</html>
