<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Khorcha App</title>
    <link rel="stylesheet" href="{{ asset('admin') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/css/style.css">

    {{-- cdn link  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  </head>
  <body>
    <header>
        <div class="container-fluid header_part">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-7"></div>
                <div class="col-md-3 top_right_menu text-end">
                    <div class="dropdown">
                      <button class="btn dropdown-toggle top_right_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="{{ asset('admin') }}/images/avatar.png" class="img-fluid">
                          {{ Auth::user()->name }}
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-tie"></i> My Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Manage Account</a></li>
                        <li><a href="#" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 {{ csrf_field() }}
                         </form>
                        </ul>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </header>
    <section>
        <div class="container-fluid content_part">
            <div class="row">
                <div class="col-md-2 sidebar_part">
                    <div class="user_part">
                        <img class="" src="{{ asset('admin') }}/images/avatar.png" alt="avatar"/>
                        <h5>{{ Auth::user()->name }}</h5>
                        <p><i class="fas fa-circle"></i> Online</p>
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                            {{-- <i class="fas fa-list-ul"></i> --}}
                            @if (Auth::user()->role==1)
                            <li><a href="{{ url('dashboard/all/user') }}"><i class="fas fa-user-circle"></i>Users</a></li>
                            @endif
                            @if (Auth::user()->role<=2)
                            <li><a href="{{ url('all/income/category') }}"><i class="fas fa-clipboard-list"></i> Income Category</a></li>
                            <li><a href="{{ url('all/income') }}"><i class="fas fa-coins"></i> Income</a></li>
                            <li><a href="{{ url('all/expense/category') }}"><i class="fas fa-clipboard-list"></i> Expense Category</a></li>
                            <li><a href="{{ url('all/expense') }}"><i class="fas fa-coins"></i> Expense</a></li>
                            @endif
                            @if (Auth::user()->role==1)
                            <li><a href="{{ url('dashboard/report') }}"><i class="fas fa-list-ul"></i>Report</a></li>
                            @endif
                            <li><a href="{{ url('dashboard/social') }}"><i class="fas fa-share-alt-square"></i> Social Media</a></li>
                            <li><a href="{{ url('dashboard/basic/info') }}"><i class="fab fa-adn"></i> App Information</a></li>

                            <li><a href="{{ url('dashboard/contact/info') }}"><i class="fas fa-address-book"></i> Contact Information</a></li>

                            <li><a href="{{ url('recyle/bin') }}"><i class="fas fa-recycle"></i> Recyle Bin</a></li>
                            {{--<li><a href="#"><i class="fas fa-comments"></i> Contact Message</a></li>
                            <li><a href="#"><i class="fas fa-globe"></i> Live Site</a></li> --}}
                            <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     {{ csrf_field() }}
                             </form>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 content">
                    <div class="row">
                        <div class="col-md-12 breadcumb_part">
                            <div class="bread">
                                <ul>
                                    <li><a href=""><i class="fas fa-home"></i>Home</a></li>
                                    <li><a href=""><i class="fas fa-angle-double-right"></i>Dashboard</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container-fluid footer_part">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10 copyright">
                    <p>Copyright &copy; 2022 | All rights reserved by Dashboard | Development By <a href="#">Creative System Limited.</a></p>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('admin') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin') }}/js/custom.js"></script>


{{-- jquery cdn --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


{{-- toaster cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- sweetalert cdn --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
        title: "Are you Want to delete?",
        text: "Once Delete, This will be Permanently Delete!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
        if (willDelete) {
        window.location.href = link;
        } else {
        swal("Safe Data!");
        }
      });
    });
    </script>

    {{-- Restore  --}}
    <script>
        $(document).on("click", "#restore", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
            title: "Are you Want to Restore?",
            text: "Once Rstore, This will be Safe Your Data!",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
            if (willDelete) {
            window.location.href = link;
            } else {
            swal("Safe Data!");
            }
          });
        });
        </script>
    {{-- before logout showing alert message --}}
    <script>
    $(document).on("click", "#logout", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
        title: "Are you Want to logout?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
        window.location.href = link;
        } else {
        swal("Not Logout!");
        }
     });
    });
    </script>
    <script>
    @if(Session::has('messege'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
    case 'info':
    toastr.info("{{ Session::get('messege') }}");
    break;
    case 'success':
    toastr.success("{{ Session::get('messege') }}");
    break;
    case 'warning':
    toastr.warning("{{ Session::get('messege') }}");
    break;
    case 'error':
    toastr.error("{{ Session::get('messege') }}");
    break;
    }
    @endif
</script>
@yield('script')
  </body>
</html>
