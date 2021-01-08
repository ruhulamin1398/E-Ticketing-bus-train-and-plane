<div>
    
    <canvas  id={{ $dataArray['id'] }} ></canvas>
    <script>
   var dataArray= @json($dataArray);
    var ctx = document.getElementById(dataArray.id);
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dataArray.lebels,
            datasets:dataArray.datasets,
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