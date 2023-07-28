<div>
<canvas id="myChartTwo" style="height:400px;width:100%"></canvas>
</div>
<script>
    var pp='<?php echo $data ?>';
    var ctx = document.getElementById('myChartTwo');
      var obj=JSON.parse(pp);
      console.log(obj);
      new Chart(ctx, {
         type: 'pie',
         data: {
          labels:obj.month,
          datasets: obj.dataSetOne,

        }
    
  });
</script>
