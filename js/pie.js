<script>
        var chart; 
        $(document).ready(function() {
              chart = new Highcharts.Chart(
              {
                  
                 chart: {
                    renderTo: 'mygraph',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'Internet Browser Statistics '
                 },
                 tooltip: {
                    formatter: function() {
                        return '<b>'+
                        this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
                    }
                 },
                 
                
                 plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: 'green',
                            formatter: function() 
                            {
                                return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
                            }
                        }
                    }
                 },
       
                    series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: [
                    <?php
                        include "conf/koneksi.php";
                        $query = mysqli_query($con,"SELECT from browser");
                     
                        while ($row = mysqli_fetch_array($query)) {
                            $browsername = $row['browsername'];
                         
                            $data = mysqli_fetch_array(mysqli_query($con,"SELECT total from browser where browsername='$browsername'"));
                            $jumlah = $data['total'];
                            ?>
                            [ 
                                '<?php echo $browsername ?>', <?php echo $jumlah; ?>
                            ],
                            <?php
                        }
                        ?>
             
                    ]
                }]
              });
        }); 
    </script>