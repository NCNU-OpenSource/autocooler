<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<script src="https://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
<style>
        canvas{
                -moz-user-select: none;
                -webkit-user-select: none;
                -ms-user-select: none;
        }
        </style>
</head>
<body align="center">
<div style="width:75%;margin:auto;">
                <center><canvas id="canvas"></canvas></center>
        </div>
<script>
        <?php
        $host = 'localhost';
        $user = 'cooler';
        $pass = 'etKxcHNnOura1Bxn';
        $db = 'cooler';
        $conn = mysqli_connect($host, $user, $pass, $db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
        mysqli_query($conn,"SET NAMES utf8");
        $sql="SELECT *, CONVERT(SUBSTRING_INDEX(timestamp,':',1),UNSIGNED INTEGER) AS num1,
        CONVERT(SUBSTRING_INDEX(timestamp,':',-1),UNSIGNED INTEGER) AS num2
        FROM `record`";
        $result = mysqli_query($conn,$sql)or die('Error with MySQL connection');

        $count=0;
        $num=0;
        while($row = mysqli_fetch_array($result)){
                $time[$count++]=$row[2];
                if($num==0)
                        echo "var MONTHS = ['".$time[$num++];
                else{
                        echo "','".$time[$num++];
                }
        }
        echo "'];\n";
        $num=0;
        ?>
                var config = {
                        type: 'line',
                        data: {
                                labels: [<?php
                                for($i=0;$i<$count;$i++){
                                        if($num==0)
                                                echo "'".$time[$num++];
                                        else{
                                                echo "','".$time[$num++];
                                        }
                                }
                                echo "'";
                                ?>],
                                datasets: [{
                                        label: 'Temp',
                                        backgroundColor: "rgb(75, 192, 192)",
                                        borderColor: "rgb(75, 192, 192)",
                                        data: [
                                <?php
                                $result = mysqli_query($conn,$sql)or die('Error with MySQL connection');
                                $num=0;
                                while($row = mysqli_fetch_array($result)){
                                        if($num++==0)
                                                echo $row[1];
                                        else
                                                echo ','.$row[1];
                                }
                                ?>
                                        ],
                                        fill: false,
                                }]
                        },
                        options: {
                                responsive: true,
                                title: {
                                        display: true,
                                        text: '溫度變化紀錄',
										fontSize: 24
                                },
                                tooltips: {
                                        mode: 'index',
                                        intersect: false,
                                },
                                hover: {
                                        mode: 'nearest',
                                        intersect: true
                                },
                                scales: {
                                        xAxes: [{
                                                display: true,
                                                scaleLabel: {
                                                        display: true,
                                                        labelString: 'Time'
                                                }
                                        }],
                                        yAxes: [{
                                                display: true,
                                                scaleLabel: {
                                                        display: true,
                                                        labelString: 'Temperature'
                                                }
                                        }]
                                }
                        }
                };

                window.onload = function() {
                        var ctx = document.getElementById('canvas').getContext('2d');
                        window.myLine = new Chart(ctx, config);
                };

        </script>

</body>
</html>
