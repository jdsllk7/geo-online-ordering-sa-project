<?php
include_once 'includes/connect.php';

$ordersPending = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `orders` WHERE orderStatus = 0"));
$ordersCompleted = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `orders` WHERE orderStatus = 1"));
$ordersAll = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `orders`"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin| Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb5QTtOqAeW7jvKamFDHUWXHSuvxT5__A&callback=initMap&libraries=&v=weekly" defer></script>
  <script>
    let marker, lat0, lng0;

    function initMap() {}

    function reload(lat, lng) {
      lat0 = lat;
      lng0 = lng;
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: {
          lat: Number(lat),
          lng: Number(lng)
        },
      });
      marker = new google.maps.Marker({
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: {
          lat: Number(lat),
          lng: Number(lng)
        },
      });
      marker.addListener("click", toggleBounce);
      marker.setMap(null);
      marker.setMap(map);
    }

    function toggleBounce() {
      if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
      } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
      }
    }

    function reload2() {
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: {
          lat: Number(lat0),
          lng: Number(lng0)
        },
      });
      marker = new google.maps.Marker({
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: {
          lat: Number(lat0),
          lng: Number(lng0)
        },
      });
      marker.addListener("click", toggleBounce);
      marker.setMap(null);
      marker.setMap(map);
    }
  </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Admin Home 
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php" class="nav-link"> 
                <i class="nav-icon fas fa-th"></i>
                <p>
                  User Home
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark dashboardLabel">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-dark">
                <div class="inner">
                  <h3 class="ordersPending"><?php echo $ordersPending; ?></h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="fas fa-shopping-cart  text-light"></i>
                </div>
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-dark">
                <div class="inner">
                  <h3 class="ordersCompleted"><?php echo $ordersCompleted; ?></h3>
                  <p>Delivered</p>
                </div>
                <div class="icon">
                  <i class="fas fa-handshake text-light"></i>
                </div>
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-dark">
                <div class="inner">
                  <h3 class="deliveryRate"><?php echo round((($ordersCompleted / $ordersAll) * 100), 0); ?>%</h3>
                  <p>Delivery Rate</p>
                </div>
                <div class="icon">
                  <i class="fas fa-lightbulb text-light"></i>
                </div>
              </div>
            </div>

            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

              <!-- TO DO List -->
              <div class="card">
                <div class="card-header bg-light">
                  <h3 class="card-title">
                    <i class="ion ion-clipboard mr-1"></i>
                    Orders
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <ul class="todo-list" data-widget="todo-list">

                    <?php
                    $data = mysqli_query($conn, "SELECT * FROM `orders` ORDER BY orderStatus ASC");
                    if (mysqli_num_rows($data) != 0) {
                      $count = 1;
                      while ($ordersResult = mysqli_fetch_assoc($data)) {

                        $items = '';
                        $itemsList = '';
                        $data1 = mysqli_query($conn, "SELECT * FROM `items` WHERE ordersId = " . $ordersResult["ordersId"]);
                        if (mysqli_num_rows($data1) != 0) {
                          $itemsList .= '<ul>';
                          $count1 = 1;
                          while ($itemsResult = mysqli_fetch_assoc($data1)) {
                            $itemsList .= '<li>(' . $itemsResult["quantity"] . ') ' . $itemsResult["name"] . ' @ K' . $itemsResult["itemPrice"] . '</li>';
                            if ($count1 == mysqli_num_rows($data1)) {
                              $items .= $itemsResult["name"];
                            } else {
                              $items .= $itemsResult["name"] . ', ';
                            }

                            $count1++;
                          }
                          $itemsList .= '</ul>';
                        }

                        if (!empty($items) && !empty($itemsList)) { //if order has elements
                          $checked = '';
                          if ($ordersResult["orderStatus"] == 1) {
                            $checked = 'checked';
                          }
                          echo '<li>
                                  <span class="handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                  </span>
                                  <div class="icheck-primary d-inline ml-2" data-toggle="tooltip" title="Mark as complete">
                                    <input class="ordersCheckbox" type="checkbox" value="' . $ordersResult["ordersId"] . '" name="todo' . $ordersResult["ordersId"] . '" id="todoCheck' . $ordersResult["ordersId"] . '" ' . $checked . '>
                                    <label for="todoCheck' . $ordersResult["ordersId"] . '"></label>
                                  </div>
                                  <a href="#" class="text text-darkish hand hover-color-info" title="Ordered Items" data-toggle="popover" data-trigger="focus" data-html="true" data-content="' . $itemsList . '">' . $count . '. ' . $items . '</a>
                                  <small class="badge badge-info"><i class="far fa-clock"></i> ' . getTimeAgo($ordersResult["orderDate"]) . '</small>
                                  <div class="tools" onclick="reload(' . $ordersResult["lat"] . ',' . $ordersResult["lng"] . ')" data-toggle="modal" data-target="#myModal">
                                    <i class="fas fa-map-marker-alt text-dark font-x-large hover-color-info" data-toggle="tooltip" title="View Location"></i>
                                  </div>
                                </li>';
                          $count++;
                        }
                      } //end while()
                    } //end if()
                    ?>

                  </ul>
                </div>
              </div>
              <!-- /.card -->

              <!-- The Modal -->
              <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Order Location
                        <button class="btn btn-small btn-light" onclick="reload2()">Reload</button>
                      </h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <div id="map" class="col-md-12" style="height: 400px;"></div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>


            </section>
            <!-- /.Left col -->

          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      Developed By Stone & Jdslk
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="js/init.js"></script>
  <script src="js/markDelivered.js"></script>

</body>

</html>