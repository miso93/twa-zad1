<?php require_once "function.php" ?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Zadanie č.1 | Michal Čech</title>

    <!-- Bootstrap -->
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header">
                <a href="/index.php">
                    <h1 class="text-center">Zadanie č.1
                        <small>vypracoval Michal Čech</small>
                    </h1>
                </a>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a href="page-php-barchart.php" class="thumbnail clearfix">
                <?php foreach ($data as $year => $d): ?>
                    <img
                        src="chart.php?values=<?php echo implode(",", $d["data"]) ?>&labels=<?php echo implode(",", array_keys($d["data"])) ?>&title=<?php echo htmlspecialchars($d["title"]) ?>"
                        alt="graph" class="img-responsive max-w-30per pull-left"/>
                <?php endforeach; ?>
                <div class="caption">
                    <h3 class="text-center">Časť PHP BarChart (GDlib)</h3>
                </div>
            </a>
        </div>
        <div class="col-sm-8 col-sm-offset-2">
            <a href="page-php-piechart.php" class="thumbnail clearfix">
                <?php foreach ($data as $year => $d): ?>
                    <img
                        src="piechart.php?values=<?php echo implode(",", $d["data"]) ?>&labels=<?php echo implode(",", array_keys($d["data"])) ?>&title=<?php echo htmlspecialchars($d["title"]) ?>"
                        alt="graph" class="img-responsive max-w-30per pull-left"/>
                <?php endforeach; ?>
                <div class="caption">
                    <h3 class="text-center">Časť PHP PieChart (GDlib)</h3>
                </div>
            </a>
        </div>
        <div class="col-sm-8 col-sm-offset-2">
            <a href="page-google-barchart-piechart.php" class="thumbnail clearfix">
                <div class="icon text-center"><span class="ion-stats-bars"></span></div>
                <div class="caption">
                    <h3 class="text-center">Časť Google Charts</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header">
                    <h1 class="text-center">BONUS
                        <small></small>
                    </h1>
            </div>
        </div>
        <div class="col-sm-8 col-sm-offset-2">
            <a href="page-php-barchart-piechart.php" class="thumbnail clearfix">
                <div class="icon text-center"><span class="ion-stats-bars"></span><span class="ion-pie-graph m-left-30"></span></div>
                <div class="caption">
                    <h3 class="text-center">Barchart a Piechart GDlib spolu na jednej stránke</h3>
                </div>
            </a>
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>