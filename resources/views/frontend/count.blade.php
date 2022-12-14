@extends('layouts.app')
@section('content')
    <div class="map_canvas">

        <canvas id="myChart" width="auto" height="100"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($options); ?>,
                datasets: [{
                    label: '',
                    data: <?php echo json_encode($votes); ?>,
                    backgroundColor: [
                        'rgba(31, 58, 147, 1)',
                        'rgba(37, 116, 169, 1)',
                        'rgba(92, 151, 191, 1)',
                        'rgb(200, 247, 197)',
                        'rgb(77, 175, 124)',
                        'rgb(30, 130, 76)'
                    ],
                    borderColor: [
                        'rgba(31, 58, 147, 1)',
                        'rgba(37, 116, 169, 1)',
                        'rgba(92, 151, 191, 1)',
                        'rgb(200, 247, 197)',
                        'rgb(77, 175, 124)',
                        'rgb(30, 130, 76)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        max: 10,
                        min: 0,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    title: {
                        display: false,
                        text: 'Custom Chart Title'
                    },
                    legend: {
                        display: false,
                    }
                }
            }
        });
    </script>
@endsection
