<!DOCTYPE html>
<html>
<head>
  <title>Results</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <h2>Live Results</h2>
  <canvas id="resultsChart" width="400" height="200"></canvas>

  <script>
    fetch('results.php')
      .then(res => res.json())
      .then(data => {
        const ctx = document.getElementById('resultsChart');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: Object.keys(data),
            datasets: [{
              label: 'Votes',
              data: Object.values(data),
            }]
          }
        });
      });
  </script>
  <br>
  <a href="index.html">Back</a>
</body>
</html>
