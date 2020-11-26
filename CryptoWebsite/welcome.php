<?php
    include 'includes/dbhBtcData.inc.php';
    include 'header.php';

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
            hAxis : {showTextEvery : 40}
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
             width: '95%', 
             height: '85%', 
            legend: 'none', 
             focusTarget: 'category', 
             chartArea: {top: 20, height: '80%'}, 
            hAxis : {showTextEvery : 8}
          };
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }

    </script>
<style>
  .side{
    margin-left: 50px;
  }
</style>
</head>
<body>

<div class="clearfix">
<div class="float-left side"><h3>Chart of KCE</h3></div>
<div class="float-right">
  <form action="">
    <div class="form-row">
    <div class="col-2">
    <input class="form-control input-lg" type="date" name="from" >
    </div>
    <div class="col-2">
    <input class="form-control" type="date" value = "2018-12-31" name="to">
    
    </div>
    <div><button class=" btn btn-primary" id="insert">Insert</button></div>
    </div>
    </form>
    </div>
</div>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
    
</body>
<script>
  
  var vars;
  var anotherUrl = "chartData2.php";
    var btn = document.getElementById('insert');
    btn.addEventListener('click', function(){
      event.preventDefault();
      Pace.restart();
        vars = $('form').serialize();
        console.log(vars);

        drawChartFiltered();
       
    })
    
  </script>
</html>