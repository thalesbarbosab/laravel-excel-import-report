<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @yield('title')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="/vendor/toast/toast.css">
        <link rel="stylesheet" href="/vendor/toastr/toastr.css">
    </head>
    <body>
        <div class="container">
            @yield('body')
        </div>
        <!-- customize js -->
        @yield('js')
        <!-- Bootstrap 5 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <!-- jQuery 3.4.1 -->
        <script src="/vendor/jquery/jquery.min.js"></script>
        <!-- Plugin Toast JS -->
        <script src="/vendor/toast/toast.js"></script>
        <!-- Plugin Toastr -->
        <script src="/vendor/toastr/toastr.js"></script>
        <!-- Showing the validation messages-->
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <script type="text/javascript">
                    $(function() {
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": true,
                            "onclick": true,
                            "showDuration": "800",
                            "hideDuration": "1000",
                            "timeOut": "8000",
                            "extendedTimeOut": "1500",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr.error('<b>@lang("validation.generic.verify_data")</b><br><p>{{$error}}</p><br>')
                    })
                </script>
            @endforeach
        @endif
        <!-- Showing the notification messages-->
        @if(Session::has('message'))
            <script type="text/javascript">
                $(function() {
                    var message = "<b>{{ Session::get("title") }}</b><br><p>{{ Session::get("message") }}</p>";
                    var type = "{{ Session::get('alert-type', 'default') }}"
                    new Toast({
                        message: message,
                        type: type
                    });
                })
            </script>
        @endif
    </body>
</html>
