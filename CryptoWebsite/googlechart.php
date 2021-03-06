<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">

    <script type="text/javascript">

    
    // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});
    var givenUrl = "chartData.php";
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);
      function loadData(givenUrl){
        var jsonData = $.ajax({
          url: givenUrl,
          dataType: "json",
          async: false
          }).responseText;
          return jsonData;
      }
      function loadSelectedInput(vars){
        var json = $.ajax({
          type : 'POST',
          url : 'filtered.php',
          data : vars,
          dataType : 'json',
          async : false
        }).responseText;
        return json;
      }
      function drawChartFiltered() {
        jsonData = loadSelectedInput(vars);
        var options = {
            width: '95%', 
            height: '85%', 
            legend: 'none', 
            focusTarget: 'category', 
            chartArea: {top: 20, height: '80%'}, 
            hAxis : {showTextEvery : 40,}
          };
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data,options);
    }
    function drawChart() {
      jsonData = loadData(givenUrl);
          var options = {
            // width: '95%', 
            // height: '85%', 
            legend: 'none', 
            // focusTarget: 'category', 
            // chartArea: {top: 20, height: '80%'}, 
            hAxis : {showTextEvery : 8, slantedText:true, slantedTextAngle:80},
            explorer: { 
                    actions: ['dragToZoom', 'rightClickToReset'],
                    axis: 'horizontal',
                    keepInBounds: true,
                    maxZoomIn: 4.0
            }
          };
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }

    </script>
  </head>

  <body>
  <form action="">
  <div class="form-row">
  <div class="col-2">
  <input class="form-control" type="date" name="from">
  </div>
  <div class="col-2">
  <input class="form-control" type="date" value = "2018-12-31" name="to">
  
  </div>
  <div><button id="insert">insert</button></div>
  </div>
  </form>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
    
  </body>
  <script>
  
  //
  var vars;//vars = $('form').serialize();
  var anotherUrl = "chartData2.php";
    var btn = document.getElementById('insert');
    btn.addEventListener('click', function(){
      event.preventDefault();
        vars = $('form').serialize();
        console.log(vars);

        drawChartFiltered();
       
    })
    
  </script>
</html>
