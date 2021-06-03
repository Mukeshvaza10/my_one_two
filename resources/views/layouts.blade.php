<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Generate Time Table</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">        

        <!-- Styles -->
        <style>
        	.footer {
			   	position: fixed; left: 0; bottom: 0; 
			   	width: 100%; height: 6%; background-color: #ffcce0;
			   	text-align: center;
			}
        </style>
    </head>
    
    <body>                
        <!-- Main Container -->
        <div class="container-fluid pl-0 pr-0">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
                <a class="navbar-brand" href="{!! url('/')!!}">GIRIRAJ</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="{!! url('/')!!}">HOME</a>
                        <a class="nav-item nav-link" href="{!! url('/generatedTimeTable/list')!!}">LIST</a>
                    </div>
                </div>
            </nav>
            <!-- Navbar end -->

            <!-- For content -->
            @yield('content')

            <!-- Footer start -->
            <footer class="footer mt-5">
		      	<div class="container pl-0 pt-2">
		        	<span class="text-primary">&copy; {{strtoupper('giriraj digital ahmedabad')}}</span> &emsp;
                    <span class="text-muted">{{strtoupper('by mukesh vaza')}}</span>
		      	</div>
		    </footer>
		    <!-- Footer end -->

        </div>
        <!-- Main Container end-->
        
        <!-- Script -->
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
                
        <script>
            $(document).ready(function(){
               
            });
        </script>
        <!-- Script end -->
    </body>
</html>
