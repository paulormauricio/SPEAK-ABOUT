<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <title>Administração</title>

    <!-- Core CSS - Include with every page -->
    {{ HTML::style('/assets/css/bootstrap.min.css') }}
    {{ HTML::style('/assets/font-awesome/css/font-awesome.css') }}

    <!-- Page-Level Plugin CSS - Tables -->
    {{ HTML::style('/assets/css/plugins/dataTables/dataTables.bootstrap.css') }}

    <!-- Page-Level Plugin CSS - Date picker -->
    <!-- {{ HTML::style('/assets/css/dateinput.css') }} -->
    {{ HTML::style('/assets/css/datetimepicker.css') }}

    <!-- SB Admin CSS - Include with every page -->
    <!-- <link href="/assets/css/admin.css" rel="stylesheet"> -->
    {{ HTML::style('/assets/css/admin.css') }}

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">

            @include('layouts.admin-header')

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">

                    @include('layouts.admin-sidebar')

                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        @yield('title')
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="top-action-buttons">
                @yield('top-action-buttons-content')
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                        @yield('table-content')
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->

<!--{{ HTML::script('/assets/js/jquery.tools.min.js') }} -->
    {{ HTML::script('/assets/js/jquery-1.10.2.js') }}
    {{ HTML::script('/assets/js/jquery.datetimepicker.js') }}
    {{ HTML::script('/assets/js/bootstrap.min.js') }}
    {{ HTML::script('/assets/js/plugins/metisMenu/jquery.metisMenu.js') }}

    <!-- Page-Level Plugin Scripts - Tables -->
    {{ HTML::script('/assets/js/plugins/dataTables/jquery.dataTables.js') }}
    {{ HTML::script('/assets/js/plugins/dataTables/dataTables.bootstrap.js') }}


    <!-- SB Admin Scripts - Include with every page -->
    <!-- <script src="assets/js/admin.js"></script> -->
    {{ HTML::script('/assets/js/admin.js') }}

    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });

        @yield('javascript-content')

    </script>

</body>

</html>