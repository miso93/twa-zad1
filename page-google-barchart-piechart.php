<?php require_once "function.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Zadanie č.1 - (Google Charts)</title>

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
<article>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header">
                    <h1 class="text-center">Zadanie č.1 - (Google Charts)</h1>
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
                <div class="col-md-6 col-md-offset-0 col-sm-8 col-sm-offset-2 text-center">
                    <div class="google-chart center-block" id="columnchart<?php echo $year; ?>"></div>
                </div>
                <div class="col-md-6 col-md-offset-0 col-sm-8 col-sm-offset-2 text-center">
                    <div class="google-chart center-block" id="piechart<?php echo $year; ?>"></div>
                </div>
                <div class="col-sm-12"><hr></div>
            </div>

        <?php endforeach; ?>
    </div>
</article>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<?php //$data = ["Cooper", 8.95, "#b873333"]?>
<?php $google_data = [];?>
<?php foreach($data as $year => $d): ?>
    <?php $i = 0;?>
    <?php foreach($d['data'] as $key => $value): ?>
    <?php $google_data[$year][] = [$key, $value, $colors[$i++]]?>
    <?php endforeach; ?>
<?php endforeach; ?>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    <?php foreach($google_data as $year => $google_data_year): ?>
    google.charts.setOnLoadCallback(drawChart<?php echo $year; ?>);
    function drawChart<?php echo $year; ?>() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "počet študentov", { role: "style" } ],
            <?php foreach($google_data_year as $row): ?>
                <?php echo json_encode($row)?>,
            <?php endforeach; ?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            { calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation" },
            2]);

        var options = {
            title: "<?php echo $data[$year]["title"]?>",
            width: 700,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
            is3D: true
        };

        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart<?php echo $year; ?>"));
        var chart2 = new google.visualization.PieChart(document.getElementById('piechart<?php echo $year; ?>'));
        chart.draw(view, options);
        chart2.draw(data, options);
    }
    <?php endforeach; ?>
</script>

</body>
</html>