<div>


    <canvas height="200px" id={{ $dataArray['id'] }}></canvas>
    <script>
        var dataArray= @json($dataArray);
    var ctx = document.getElementById(dataArray.id);
    var myChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
            labels: dataArray.lebels,
            datasets: dataArray.datasets,
        },
        options: {
            scales: {
                yAxes: [{
                    display: false,
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
   


        
    });
    
    </script>




</div>

