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

    /*
     Property with options for the Seccond select list
     The key in this object must be the same with the values of the options added in the first select
     The values in the array associated to each key represent options of the seccond select
     */
    SList.slist2 = {
        "Amenagement/service urbain": ['Parking des Halles','14302529','Services Techniques Vrignaud',
            '14304449','Centre Municipal de Restauration','Serres Municipales','14311555','14341076',
            '14341594'],

        "Services Generaux": ['14303631','Hotel De Ville','14309693','14341424'],

        "Sport et jeunesse": ['Stade Henri Desgrange','14303524','Piscine Patinoire Arago',
            'Centre Equestre', 'Stade St Andre D Ornay','Salle de Tennis de Table','Stade Rivoli',
            'Salle Omnisports','T.E.Y. Courts Couverts','Salle Philibert Pele','14310370','Complexe Sportif Terres Noires'
            ,'14341437','14341903','14341922'],

        "Action economique": ['Cite Mitterrand','Espace Prevert','14309748','14341820'],

        "Enseignement-Formation": ['Ecole Elementaire Victor Hugo','14302357','Groupe Scolaire Marcel Pagnol','Groupe Scolaire Generaudiere','Groupe Scolaire Jean Moulin',
            'Groupe Scolaire Laennec','Groupe Scolaire Pyramides','Groupe Scolaire Rivoli','Groupe Scolaire Pont Boileau',
            'Groupe Scolaire Moulin Rouge', 'Groupe Scolaire Monjoie','Groupe Scolaire Jean Yole','Groupe Scolaire Flora Tristan',
            'Ecole Elementaire Jean Roy'],

        "Famille": ['14310021', 'Espace Famille'],

        "Culture": ['14305225','Ecole Nationale de Musique','Mediatheque','14310480'],

        "Logement": ['Residence Andre Boutelier','Residence La Vigne Aux Rose','Residence Moulin Rouge',
            'Residence St Andre D Ornay'],

        "Interv. sociales et sante": ['14312962'],

        "Autre": ['Batiment Piobetta Ex College','14341835','14341887'],
    };

    /*
     Property with text-content associated with the options of the 2nd select list
     The key in this object must be the same with the values (options) added in each Array in "slist2" above
     The values of each key represent the content displayed after the user selects an option in 2nd dropdown list
     */
    SList.scontent = {
        "Services Techniques Vrignaud": 'www.marplo.net/ajax/',
        "games": 'www.marplo.net/jocuri/',
        "anime": 'www.marplo.net/anime/',
        "php-mysql": 'coursesweb.net/php-mysql/',
        "javascript": 'coursesweb.net/javascript/',
        "flash-as3": 'coursesweb.net/flash/'
    };

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
            backgroundColor: "rgba(0,255,0,0.5)",
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