<?php require_once 'includes/header.php';
date_default_timezone_set('Africa/Nairobi');


$sql = "SELECT * FROM product WHERE status = 1";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$orderSql = "SELECT * FROM orders WHERE order_status = 1";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;

$today = date('m/d/Y');
$date = DateTime::createFromFormat('m/d/Y',$today);
$today = $date->format("Y-m-d");

//  echo $today;

$sql = "SELECT * FROM orders WHERE order_date = '$today' and order_status = 1";
$query = $connect->query($sql);

$totalAmount = 0;
while ($result = $query->fetch_assoc()) {

    $totalAmount += $result['grand_total'];
}
//echo $totalAmount;




/*
$sql = "SELECT * FROM orders WHERE order_status = 1 AND order_date = $today ";
$result = $connect->query($sql);
$output = array('data' => array());



if($result->num_rows > 0) {
    while ($orderResult = $result ->fetch_assoc()) {

        $totalRevenue += $orderResult['paid'];
    }

}
*/
$lowStockSql = "SELECT * FROM product WHERE quantity <= 3 AND status = 1";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

$connect->close();

?>


    <style type="text/css">
        .ui-datepicker-calendar {
            display: none;
        }
    </style>

    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">


    <div class="row">

        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">

                    <a href="product.php" style="text-decoration:none;color:black;">
                        Total Product
                        <span class="badge pull pull-right"><?php echo $countProduct; ?></span>
                    </a>

                </div> <!--/panel-hdeaing-->
            </div> <!--/panel-->
        </div> <!--/col-md-4-->

        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <a href="orders.php?o=manord" style="text-decoration:none;color:black;">
                        Total Orders
                        <span class="badge pull pull-right"><?php echo $countOrder; ?></span>
                    </a>

                </div> <!--/panel-hdeaing-->
            </div> <!--/panel-->
        </div> <!--/col-md-4-->

        <div class="col-md-4">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <a href="product.php" style="text-decoration:none;color:black;">
                        Low Stock
                        <span class="badge pull pull-right"><?php echo $countLowStock; ?></span>
                    </a>

                </div> <!--/panel-hdeaing-->
            </div> <!--/panel-->
        </div> <!--/col-md-4-->

        <div class="col-md-4">
            <div class="card">
                <div class="cardHeader">

                    <script>
                        var d = new Date(<?php echo time() * 1000 ?>);
                        function digitalClock() {
                            d.setTime(d.getTime() + 1000);
                            var hrs = d.getHours();
                            var mins = d.getMinutes();
                            var secs = d.getSeconds();
                            mins = (mins < 10 ? "0" : "") + mins;
                            secs = (secs < 10 ? "0" : "") + secs;
                            var apm = (hrs < 12) ? "am" : "pm";
                            hrs = (hrs > 12) ? hrs - 12 : hrs;
                            hrs = (hrs == 0) ? 12 : hrs;
                            var ctime = hrs + ":" + mins + ":" + secs + " " + apm;
                            document.getElementById("clock").firstChild.nodeValue = ctime;
                        }
                        window.onload = function() {
                            digitalClock();
                            setInterval('digitalClock()', 1000);
                        }
                    </script>
                    <div id="clock"> </div>

                    <h2><?php echo date('l') .' ', date('d'); ?></h2>
                </div>

                <div class="cardContainer">
                    <p><?php echo date('F') .' ', date('Y'); ?></p>
                </div>
            </div>
            <br/>

            <div class="card">
                <div class="cardHeader" style="background-color:#245580;">
                    <h1><?php

                        echo $totalAmount;
                         ?></h1>
                </div>

                <div class="cardContainer">
                    <p> <i class="glyphicon glyphicon"></i> Total Revenue in Kshs</p>
                </div>
            </div>

        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> Calendar</div>
                <div class="panel-body">
                    <div id="calendar"></div>
                </div>
            </div>

        </div>


    </div> <!--/row-->

    <!-- fullCalendar 2.2.5 -->
    <script src="assests/plugins/moment/moment.min.js"></script>
    <script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>


    <script type="text/javascript">
        $(function () {
            // top bar active
            $('#navDashboard').addClass('active');

            //Date for the calendar events (dummy data)
            var date = new Date();
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();

            $('#calendar').fullCalendar({
                header: {
                    left: '',
                    center: 'title'
                },
                buttonText: {
                    today: 'today',
                    month: 'month'
                }
            });


        });
    </script>

<?php require_once 'includes/footer.php'; ?>