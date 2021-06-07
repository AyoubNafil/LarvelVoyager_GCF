<?php
/* Database connection settings */
$host = 'localhost:3306';
$user = 'root';
$pass = '';
$db = 'blog2';
($mysqli = new mysqli($host, $user, $pass, $db)) or die($mysqli->error);

$data1 = '';
$data2 = '';

$sql = 'SELECT count(nom) as a ,filiere as b from classses group by filiere; ';
$result = mysqli_query($mysqli, $sql);

//loop through the returned data
while ($row = mysqli_fetch_array($result)) {
$data1 = $data1 . '"' . $row['a'] . '",';
$data2 = $data2 . '"' . $row['b'] . '",';
}

$data1 = trim($data1, ',');
$data2 = trim($data2, ',');
?>
@extends('voyager::master')

@section('content')
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
		<script type="text/javascript" src="{{ voyager_asset('js/Chart.js') }}"></script>
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Statistique</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="mb-10">
            <h4 class=" text-center  text-secondary mb-0">Nombre des classes par filieres</h4>
        </div>

        <canvas id="myChart" width="450" height="200"></canvas>
        <script>
            var haha = [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ];
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [ <?php echo $data2; ?> ],
                    datasets: [{
                        data: [ <?php echo $data1; ?> ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {

                    plugins: {
                        legend: {
                            display: true,
                            position: 'right',
                            labels: {
                                generateLabels: function(myChart) {
                                    return myChart.data.labels.map(function(label, i) {
                                        return {

                                            text: label,
                                            fillStyle: haha[i]

                                        };
                                    });
                                }
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: "Nombre des classes par filieres "
                    },
                },
                scales: {

                    x: {
                        title: {
                            display: true,
                            text: 'filiere'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Nombre des classes'
                        }
                    }
                }


            });

        </script>


    @stop
