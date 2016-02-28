<?php require_once "function.php" ?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Zadanie č.1 - PHP (GDlib) | Michal Čech</title>

    <!-- Bootstrap -->
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <h1 class="text-center">Zadanie č.1 - PHP (GDlib)</h1>
            </div>
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Štatistiky úspešnosti študentov na predmete TWA</div>
                <div class="panel-body">
                    <p>Počas posledných troch akademických rokov študenti dosiahli na tomto predmete nasledujúce
                        výsledky:</p>
                </div>

                <!-- Table -->
                <table class="table table-striped table-responsive">
                    <thead>
                    <tr>
                        <th></th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>E</th>
                        <th>FX</th>
                        <th>FN</th>
                        <th>počet študentov</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1; ?>
                    <?php foreach ($data as $year => $d): ?>
                        <tr>
                            <td><strong><?php echo str_replace("_", "/", $year) ?>
                                    (GRAF <?php echo str_repeat("I", $count) ?>.)</strong></td>
                            <?php $sum = 0; ?>
                            <?php foreach ($d["data"] as $value): ?>
                                <?php $sum += $value; ?>
                                <td><?php echo $value; ?></td>
                            <?php endforeach; ?>
                            <td><strong class="text-warning"><?php echo $sum; ?></strong></td>
                        </tr>
                        <?php $count++; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php foreach ($data as $year => $d): ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 text-center">
                <img
                    src="chart.php?values=<?php echo implode(",", $d["data"]) ?>&labels=<?php echo implode(",", array_keys($d["data"])) ?>&title=<?php echo htmlspecialchars($d["title"]) ?>"
                    alt="graph" class="img-responsive center-block"/>
            </div>
            <div class="col-sm-12"><hr></div>
        </div>

    <?php endforeach; ?>

</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>