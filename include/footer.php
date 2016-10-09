<?php
?>

<div id="container" style="width: 75%;">
    <canvas id="canvas"></canvas>
</div>
Select category: <select name="slist1" onchange="SList.getSelect('slist2', this.value);">
    <option>- - -</option>
    <?php
    for($i=0;$i<sizeof($categorie);$i++){
        echo "<option value='".$categorie[$i][0]."'>".$categorie[$i][0]."</option>";
    }

    ?>
</select>
<!-- Tags for the seccond dropdown list, and for text-content -->
<span id="slist2"></span> <div id="scontent"></div>

<script><!--
    /* Script Double Select Dropdown List, from: coursesweb.net/javascript/ */
    var SList = new Object();             // JS object that stores data for options

    // HERE replace the value with the text you want to be displayed near Select
    var txtsl2 = 'Select Category:';


    /* From here no need to modify */

    // function to get the dropdown list, or content
    SList.getSelect = function(slist, option) {
        document.getElementById('scontent').innerHTML = '';           // empty option-content

        if(SList[slist][option]) {
            // if option from the last Select, add text-content, else, set dropdown list
            if(slist == 'scontent') document.getElementById('scontent').innerHTML = SList[slist][option];
            else if(slist == 'slist2') {
                var addata = '<option>- - -</option>';
                for(var i=0; i<SList[slist][option].length; i++) {
                    addata += '<option value="'+SList[slist][option][i]+'">'+SList[slist][option][i]+'</option>';
                }

                document.getElementById('slist2').innerHTML = txtsl2+' <select name="slist2" onchange="SList.getSelect(\'scontent\', this.value);">'+addata+'</select>';
            }
        }
        else if(slist == 'slist2') {
            // empty the tag for 2nd select list
            document.getElementById('slist2').innerHTML = '';
        }
    }
    --></script>

<script>
    //script js using chart js to create graph
    var barChartData = {
        labels: [ <?php for($i=0;$i<43920;$i++) //x axe data
        {
            echo '"'.$tablQ[$i][1].'",';
        }?>],
        datasets: [{
            label: 'Consomation',
            type: 'bar',
            backgroundColor: "rgba(8, 188, 255,1)",
            data: [<?php //y axe data
                for($i=0;$i<43920;$i++)
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
                        borderColor: 'rgb(8, 188, 255)',
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