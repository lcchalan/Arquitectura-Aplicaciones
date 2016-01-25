<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>UTPL - WebService</title>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    
    
</head>

<body>      
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.html">UTPL - WebService</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">    
                    <div class="input-group custom-search-form">
                        <?php
                            if (isset($_POST['buscar'])) {
                                $nombre = $_POST['buscar'];
                            }else{
                                $nombre = "";
                            }
                        ?>
                        <input type="text" id="valor" name="valor" class="form-control" value="<?php echo $nombre;?>" placeholder="<?php echo $nombre;?>" onload> 
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="obtener_datos">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>  
                </div>
                

                <div>
                    <ul id="miMenu1">   
                        <span class="glyphicon glyphicon-folder-close"></span>
                        <li> Titulo 
                            <ul>
                                <div id="titulo"></div>
                            </ul>
                        </li>
                    </ul> 

                    
                    <ul id="miMenu2">
                        <span class="glyphicon glyphicon-folder-close"></span>
                        <li>Autor
                            <ul>
                                <div id="autor"></div>
                            </ul>
                        </li>
                    </ul> 

                    
                    <ul id="miMenu3">
                        <span class="glyphicon glyphicon-folder-close"></span>
                        <li>Varios
                            <ul>
                                <li>Palabras Claves
                                    <ul>
                                        <div id="keywords"></div>
                                    </ul>
                                </li>
                                <li>Formato Doc.
                                    <ul>
                                        <div id="formato"></div>
                                    </ul>
                                </li>
                                <li>Ultima modificación
                                    <ul>
                                        <div id="modificacion"></div>
                                    </ul>
                                </li>
                                <li>ID Documento
                                    <ul>
                                        <div id="id"></div>
                                    </ul>
                                </li>
                            <ul>
                        </li>
                    </ul>
                </div>
                <div id="error">errrrrr</div>
                <div id="resultado"></div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Planes Académicos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <!-- /.panel -->
                    <div  class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-cog fa-spin"></i> Academic
                        </div>
                        <!-- /.panel-heading -->
                        <div id="accordion" class="panel-body">
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            Chat
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-refresh fa-fw"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-check-circle fa-fw"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-times fa-fw"></i> Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-clock-o fa-fw"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                            </small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <!-- /.panel-body -->

                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->    
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>


    <script>
        $(document).ready(function(){
            console.log("Modo Consola");
            $('#obtener_datos').on('click',function(event){
                $( "#accordion" );
                $("#accordion").text("Cargando...");
                $("#accordion2").text("...");
                event.preventDefault();
                $valor = $('#valor').val();
                $.ajax({
                    url : 'http://j4loxa.com/serendipity/plan/browse?q='+$valor+'&fq=keywords:Abr/2105+-+Ago/2015&wt=json&rows=12',
                    type : 'GET',
                    dataType : "jsonp",
                    jsonp:'json.wrf',/////////////CAMBIO
                    async : true,
                    success : function(data){
                        console.log(data);
                        cadena="";                      
                        $.each(data.highlighting, function(k, v){
                            //console.log(k, v);
                            //$.each(v, function(z, x){
                            cadena = cadena + "<h3>"+v.title+"</h3>";
                            cadena = cadena + "<div><p>"+v.content+"</p></div>";
                            //});
                        });
                        console.log(cadena);
                        $midiv= $('#accordion');
                        $midiv.html(cadena).accordion();

                        // TITULO
                        cadena1="";                      
                        $.each(data.response, function(k, valor){
                            console.log(k);
                            if (valor instanceof Array) {
                                console.log(valor);
                                $.each(valor, function(a, b){ 
                                        cadena1 +="<li>"+b.title+"</li>";
                                });      
                            }
                        });
                        console.log(cadena1);
                        $midiv1= $('#titulo');
                        $midiv1.html(cadena1);

                        //AUTORES
                        cadena2="";                      
                        $.each(data.response, function(k, valor){
                            console.log(k);
                            if (valor instanceof Array) {
                                console.log(valor);
                                $.each(valor, function(a, b){
                                    cadena2 += "<li>Autor 1: "+b.author+"</li>";
                                }); 
                            }
                        });
                        console.log(cadena2);
                        $midiv2= $('#autor');
                        $midiv2.html(cadena2);

                        //KEYWORDS
                        cadena3="";                      
                        $.each(data.response, function(k, valor){
                            console.log(k);
                            if (valor instanceof Array) {
                                console.log(valor);
                                $.each(valor, function(a, b){
                                    cadena3 += "<li>"+b.keywords+"</li>";                   
                                }); 
                            }
                        });
                        console.log(cadena3);
                        $midiv3= $('#keywords');
                        $midiv3.html(cadena3);

                        //FORMATO
                        cadena4="";                      
                        $.each(data.response, function(k, valor){
                            console.log(k);
                            if (valor instanceof Array) {
                                console.log(valor);
                                $.each(valor, function(a, b){
                                    cadena4 += "<li>"+b.content_type+"</li>";                    
                                }); 
                            }
                        });
                        console.log(cadena4);
                        $midiv4= $('#formato');
                        $midiv4.html(cadena4);

                        //MODIFICACION
                        cadena5="";                      
                        $.each(data.response, function(k, valor){
                            console.log(k);
                            if (valor instanceof Array) {
                                console.log(valor);
                                $.each(valor, function(a, b){
                                    cadena5 += "<li>"+b.last_modified+"</li>";                    
                                }); 
                            }
                        });
                        console.log(cadena5);
                        $midiv5= $('#modificacion');
                        $midiv5.html(cadena5);

                        //ID DOC
                        cadena6="";                      
                        $.each(data.response, function(k, valor){
                            console.log(k);
                            if (valor instanceof Array) {
                                console.log(valor);
                                $.each(valor, function(a, b){
                                    cadena6 += "<li>"+b.id+"</li>";                    
                                }); 
                            }
                        });
                        console.log(cadena6);
                        $midiv6= $('#id');
                        $midiv6.html(cadena6);
                    },
                    error:function(){
                        console.log("error");
                        $('#accordion').html("hay un error");
                    }
                });
            });
        });
    </script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  

    <script type="text/javascript" src="../js/menuarbolaccesible.js"></script> 
    <link href="../css/menuarbolaccesible.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript">
        <!--
        iniciaMenu('miMenu1');
        iniciaMenu('miMenu2');
        iniciaMenu('miMenu3');
        //-->
    </script> 
    

    
</body>

</html>
