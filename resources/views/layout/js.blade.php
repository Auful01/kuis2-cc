<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

    $('.btn-editDokter').on('click', function () {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var url = $(this).data('url');
        var photo = $(this).data('photo');
        var price = $(this).data('price');
        var specialist = $(this).data('specialist');
        $('.name').val(name);
        $('.url').attr('action', url);
        $('.photo').attr('src', photo);
        $('.specialist').val(specialist);
        $('.price').val(price);

    })

    $('.btn-editTreatment').on('click', function () {
        var name = $(this).data('name')
        var desc = $(this).data('description')
        var photo = $(this).data('photo')
        var cat = $(this).data('kategori')
        var price = $(this).data('harga')
        var url = $(this).data('url')
        $('.name').val(name)
        $('.description').val(desc)
        $('.photo').attr('src',photo)
        $('.cat').val(cat)
        $('.price').val(price)
        $('.url').attr('action', url)
        // console.log(cat);

        $.ajax({
            url : "/category",
            type : "GET",
            dataType : "json",
            success: function (data) {
                var formOpt = "";
                $.each(data, function (idx, obj) {
                    if (obj.id == cat.id) {
                        formOpt += "<option value='" + obj.id + "' selected>" + obj.category + "</option>"
                    }else{
                        formOpt += "<option value='" + obj.id + "'>" + obj.category + "</option>"
                    }
                });
                $('#treatment-select').append(formOpt);
            }
        })
    })

    $('.add-schedule').on('click', function () {
        var id = $(this).data('id')
        $('.id').val(id)
    })

    function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        const picker = document.getElementById('date1');
        picker.addEventListener('input', function(e){
        var day = new Date(this.value).getUTCDay();
        if([6,0].includes(day)){
            e.preventDefault();
            this.value = '';
            swal({
                title: "Error!",
                text: "Weekend Libur!",
                icon: "error",
                button: "ok",
                });
        }
        });

        $('.btn-order').on('click', function () {
            var harga = $(this).data('harga')
            $('.price').val(harga)
        })

        $('.btn-reservasi').on('click', function () {
            var harga = $(this).data('harga')
            $('.price').val(harga)
        })

</script>

 <!-- jQuery -->
 {{-- <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> --}}
 <!-- jQuery UI 1.11.4 -->
 <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <!-- ChartJS -->
 <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
 <!-- Sparkline -->
 <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
 <!-- JQVMap -->
 <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
 <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
 <!-- jQuery Knob Chart -->
 <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
 <!-- daterangepicker -->
 <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
 <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
 <!-- Summernote -->
 <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
 <!-- overlayScrollbars -->
 <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
 <!-- AdminLTE App -->
 <script src="{{asset('dist/js/adminlte.js')}}"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{asset('dist/js/demo.js')}}"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
