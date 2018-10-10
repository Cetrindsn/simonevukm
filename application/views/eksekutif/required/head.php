<!--HEAD-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIMONEV UKM</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/datepicker/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css"/>
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/font-awesome.css" rel="stylesheet" type="text/css"/>
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" type="text/css"/>
        <!-- CUSTOM STYLES-->
        <link href="<?php echo base_url();?>assets/admin/assets/css/custom.css" rel="stylesheet" />
         <!-- GOOGLE FONTS-->
       <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


    <script src="<?php echo base_url(); ?>assets/pustakaFC/js/fusioncharts.js"></script>
    <script src="<?php echo base_url(); ?>assets/pustakaFC/js/themes/fusioncharts.theme.fint.js"></script>
    <script>

      FusionCharts.ready(function(){
      var type = window.document.getElementById('type');
      var tema = window.document.getElementById('tema');
      var chart = new FusionCharts(
          {
            "type":type.value,
            "renderAt":"chartContainer",
            "width":"600",
            "height":"300",
            "dataFormat":"jsonurl",
            "dataSource":"<?php echo site_url('Eksekutif/json');?>"
          }
          );
          chart.render();
          type.onchange = function (){
            var chart = new FusionCharts(
              {
              "type":type.value,
              "renderAt":"chartContainer",
              "width":"600",
              "height":"300",
              "dataFormat":"jsonurl",
              "dataSource":"<?php echo site_url('Eksekutif/json');?>"
              }
            );
          chart.render();
          }

      });
  </script>


</head>
