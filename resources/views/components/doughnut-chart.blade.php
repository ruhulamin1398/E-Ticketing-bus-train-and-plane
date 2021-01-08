<div style="height: 100%">


    <canvas height="500px" id={{ $dataArray['id'] }} ></canvas>
    <script>
        var dataArray= @json($dataArray);
    var ctx = document.getElementById(dataArray.id);
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: dataArray.lebels,
            datasets: dataArray.datasets,
        }
    });
    </script>




</div>


