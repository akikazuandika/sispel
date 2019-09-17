<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $title ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- <script type="text/javascript" src="/https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script> -->


    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
    <div onclick="hideToastr()" class="toast" style="position: fixed; top: 0; right: 0; margin-right:30px; margin-top:50px; z-index:9999; width:300px" data-delay="1500">
        <div class="toast-header" style="height:50px">
            <strong class="mr-auto">Hello, world! This is a toast message.</strong>
        </div>
    </div>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li <?php if ($active == "dashboard") echo 'class="active"'; ?>>
                        <a href="/keamanan"><i class="menu-icon fa fa-tachometer"></i>Dashboard </a>
                    </li>
                    <li <?php if ($active == "room") echo 'class="active"'; ?>>
                        <a href="/keamanan/room"><i class="menu-icon fa fa-hotel"></i>Kamar </a>
                    </li>
                    <li <?php if ($active == "staff") echo 'class="active"'; ?>>
                        <a href="/keamanan/staff"><i class="menu-icon fa fa-users"></i>Pengasuh </a>
                    </li>
                    <li <?php if ($active == "violation") echo 'class="active"'; ?>>
                        <a href="/keamanan/violation"><i class="menu-icon fa fa-times-circle"></i>Pelanggaran </a>
                    </li>
                    <li <?php if ($active == "santri") echo 'class="active"'; ?>>
                        <a href="/keamanan/santri"><i class="menu-icon fa fa-users"></i>Santri </a>
                    </li>
                    <li>
                        <a style="cursor:pointer" data-toggle="modal" data-target="#modal-default"><i class="menu-icon fa fa-gears"></i>Ganti Password</a>
                    </li>
                    <li>
                        <a href="/keamanan/logout"><i class="menu-icon fa fa-sign-out"></i>Logout </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="/images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="/images/logo2.png" alt="Logo"></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="/images/keamanan.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->

        <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Ganti Password</h4>
                      </div>
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="oldPass">Password Sekarang</label>
                              <input type="password" class="form-control" id="oldPass" placeholder="Password Sekarang...">
                          </div>
                          <div class="form-group">
                              <label for="newPass">Password Baru</label>
                              <input type="password" class="form-control" id="newPass" placeholder="Password Baru...">
                          </div>
                          <div class="form-group">
                              <label for="confirmNewPass">Konfirmasi Password Baru</label>
                              <input type="password" class="form-control" id="confirmNewPass" placeholder="Konfirmasi Password Baru...">
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          <button type="button" onclick="changePassword()" class="btn btn-primary">Save changes</button>
                      </div>
                  </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->