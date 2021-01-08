<div>    
    <canvas height="200px" id={{ $dataArray['id'] }}></canvas>
    <script>
        var dataArray= @json( $dataArray );

    var ctx = document.getElementById(dataArray.id);
    console.log(dataArray.datasets);
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dataArray.lebels,
            datasets: dataArray.datasets,
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>

</div>