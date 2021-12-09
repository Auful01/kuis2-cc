<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- <div class="row"> -->
    <div class="text-center">
        <h2 align="center">BeautyCenter</h2>
        <h3 align="center">Data Treatment</h3>
    </div>
    <!-- </div> -->
    <br><br>
    <ul style="list-style: none">
        <li>Nama Pasien : {{$treatment->user->name}}</li>
        <li>Tanggal Pesan : {{$treatment->created_at}} </li>
    </ul>
    <div class="row d-flex justify-content-around">
        <div class="col-md-6">
            <table class="table table-striped">
                <tr>
                    <td>Treatment</td>
                    <td>{{$treatment->treatment->name}}</td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>{{$treatment->treatment->category->category}}</td>
                </tr>
                <tr>
                    <td>Tanggal Treatment</td>
                    <td>{{$treatment->date}}</td>
                </tr>
                <tr>
                    <td>Waktu Treatment</td>
                    <td>{{$treatment->time}}</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>{{$treatment->treatment->price}}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>@if ($treatment->status == 0)
                        Dibatalkan
                        @elseif ($treatment->status == 1)
                        Proses
                        @else
                        Selesai
                    @endif </td>
                </tr>
            </table>
            {{-- </td> --}}

        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstdap@4.6.1/dist/js/bootstdap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script>
</body>

</html>
