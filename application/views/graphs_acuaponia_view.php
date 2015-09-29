<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Gráficos</title>
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/examples.css" rel="stylesheet" type="text/css">
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../../excanvas.min.js"></script><![endif]-->
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/flot/jquery.flot.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/flot/jquery.flot.resize.js"></script>
    <script type="text/javascript">

    $(function() {

        // We use an inline data source in the example, usually data would
        // be fetched from a server

        var data = [],
            totalPoints = 50;

        function getRandomData() {

            if (data.length > 0)
                data = data.slice(1);

            // Do a random walk

            while (data.length < totalPoints) {

                var prev = data.length > 0 ? data[data.length - 1] : 50,
                    y = prev + Math.random() * 10 - 5;

                if (y < 0) {
                    y = 0;
                } else if (y > 100) {
                    y = 100;
                }

                data.push(y);
            }

            // Zip the generated y values with the x values

            var res = [];
            for (var i = 0; i < data.length; ++i) {
                res.push([i, data[i]])
            }

            return res;
        }

        // Set up the control widget

        var updateInterval = 1000;
        $("#updateInterval").val(updateInterval).change(function () {
            var v = $(this).val();
            if (v && !isNaN(+v)) {
                updateInterval = +v;
                if (updateInterval < 1) {
                    updateInterval = 1;
                } else if (updateInterval > 2000) {
                    updateInterval = 2000;
                }
                $(this).val("" + updateInterval);
            }
        });

        var plot = $.plot("#placeholder", [ getRandomData() ], {
            series: {
                shadowSize: 0   // Drawing is faster without shadows
            },
            yaxis: {
                min: 0,
                max: 100
            },
            xaxis: {
                show: false
            }
        });

        function update() {

            plot.setData([getRandomData()]);

            // Since the axes don't change, we don't need to call plot.setupGrid()

            plot.draw();
            setTimeout(update, updateInterval);
        }

        update();

        // Add the Flot version string to the footer

        $("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
    });

    </script>
</head>
<body>        
    <div class="container">
        <div class="row">
          <div class="span2">        
            <img src="<?php echo base_url();?>img/TOClogo.png" alt="Logo TOC" width="400" heigth="350"/><br>
          </div>
          <div class="span8">        
            <h2>Sistema de monitoreo de Productos Piloto de Sustentabilidad Social</h2>
          </div>
          <div class="span2">
            <a href="home/logout">Cerrar Sesión</a></h6>
          </div>      
        </div>
    </div>
    <div class="container">
        <h4>Gráfico Acuaponía- Tiempo Real</h4>
        <div class="demo-container">
            <div id="placeholder" class="demo-placeholder"></div>
        </div>        
        
        <a class="btn btn-large btn-primary" href="<?php echo site_url('acuaponia') ?>"><i class="icon-arrow-left icon-white"></i> Regresar</a>
    </div>
    <footer class="piePagina">       
    <address>
    <strong>&copy; Copyright 2013 Todos los derechos Reservados.TOC Technology Outsourcing Center</strong><br>
    Calle México # 34,Colonia Pumar, Xalapa , Veracruz, México    
    <abbr title="Teléfono">Tel:</abbr> +052 (228) 8419919<br>
    www.tocveracruz.com.mx, RFC: TTO0804297VA<br>
    <a href="mailto:#">contacto@tocveracruz.com.mx</a>
    </address>                  
  </footer>
</body>
</html>