<?php
?>

<div id="container" style="width: 75%;">
    <canvas id="canvas"></canvas>
</div>
<!-- Tags for the seccond dropdown list, and for text-content -->
<span id="slist2"></span> <div id="scontent"></div>

<script>document.getElementById('realtxt').onkeyup = searchSel;
    function searchSel()
    {
        var input = document.getElementById('realtxt').value.toLowerCase();

        len = input.length;
        output = document.getElementById('realitems').options;
        for(var i=0; i<output.length; i++)
            if (output[i].text.toLowerCase().indexOf(input) != -1 ){
                output[i].selected = true;
                break;
            }
        if (input == '')
            output[0].selected = true;
    }</script>
<script>
    //script js using chart js to create graph
    var barChartData = {
        labels: [ <?php for($i=0;$i<sizeof($tablQ);$i++) //x axe data
        {
            echo '"'.$tablQ[$i][1].'",';
        }?>],
        datasets: [{
            label: 'Consomation',
            type: 'bar',
            backgroundColor: "rgba(0,255,0,0.5)",
            data: [<?php //y axe data
                for($i=0;$i<sizeof($tablQ);$i++)
                {
                    echo $tablQ[$i][0].',';
                }
                ?>]
        }]
    };
    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                // Elements options apply to all of the options unless overridden in a dataset
                // In this case, we are setting the border of each bar to be 2px wide and green
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                legend: {
                    position: 'top',
                },
                //title: {
                //    display: true,
                //   text: 'Chart.js Bar Chart'
                //},
                pan: {
                    enabled: true,
                    mode: 'xy'
                },
                zoom: {
                    enabled: true,
                    mode: 'y',
                    limits: {
                        max: 10,
                        min: 0.5
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            min: 'February',
                            max: 'June'
                        }
                    }]
                }
            }
        });
    };
</script>
</body>

</html>