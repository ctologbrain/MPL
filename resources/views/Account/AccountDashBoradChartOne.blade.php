<div>
<canvas id="myChart" style="height:400px;width:100%"></canvas>
</div>
<script>
    var pp='<?php echo $PPPP; ?>';
    var ctx = document.getElementById('myChart');
      var obj=JSON.parse(pp);
      console.log(obj.month);
      new Chart(ctx, {
         type: 'bar',
         data: {
          labels:obj.month,
          datasets: obj.dataSetOne,

        },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
