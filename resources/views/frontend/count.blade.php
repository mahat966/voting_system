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
                    option: '',
                    data: <?php echo json_encode($votes); ?>,
                    backgroundColor: [
                        'rgba(1, 2, 3, 4)',
                        'rgba(1, 2, 3, 4)',
                        'rgba(1, 2, 3, 4)',
                        'rgb(4, 5, 6)',
                        'rgb(7, 8, 9)',
                        'rgb(10, 2, 3)'
                    ],
                    borderColor: [
                        'rgba(1, 2, 3, 4)',
                        'rgba(1, 2, 3, 4)',
                        'rgba(1, 2, 3, 4)',
                        'rgb(4, 5, 6)',
                        'rgb(7, 8, 9)',
                        'rgb(10, 2, 3)'
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
                        display: true,
                        text: 'Total Answer Count'
                    },
                    legend: {
                        display: false,
                    }
                }
            }
        });
    </script>
@endsection
