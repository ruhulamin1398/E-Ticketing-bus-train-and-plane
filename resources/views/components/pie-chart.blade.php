<div>


    <canvas id={{ $dataArray['id'] }}></canvas>
    <script>
        var dataArray= @json($dataArray);
    var ctx = document.getElementById(dataArray.id);
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: dataArray.lebels,
            datasets: dataArray.datasets,
        }
    });
    </script>




</div>