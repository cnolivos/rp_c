<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Capremci</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    
    
   <?php include("view/modulos/links_css.php"); ?>
   
  </head>

  <body class="hold-transition skin-blue fixed sidebar-mini">   
  <?php
        
        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
        ?>
    
    <div class="wrapper">
  		<header class="main-header">
          <?php include("view/modulos/logo.php"); ?>
          <?php include("view/modulos/head.php"); ?>	    
  		</header>
   		<aside class="main-sidebar">
    		<section class="sidebar">
             <?php include("view/modulos/menu_profile.php"); ?>
              <br>
             <?php include("view/modulos/menu.php"); ?>
            </section>
         </aside>

  	  <div class="content-wrapper">
        <section class="content-header">
          <h1>
            
            <small><?php echo $fecha; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $helper->url("Usuarios","Bienvenida"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Grupos</li>
          </ol>
        </section>
        
        <section class="content">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Registrar Solicitud Detalle</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                
              </div>
            </div>
            
            <div class="box-body">
            
                <form action="<?php echo $helper->url("SolicitudDetalle","InsertaSolicitudDetalle"); ?>" method="post" class="col-lg-12 col-md-12 col-xs-12">
          		 	 <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
              		 	 
              		 	 <div class="row">
                         	<div class="col-xs-12 col-md-3 col-md-3 ">
                            	<div class="form-group">
                                	<label for="cantidad_solicitud_detalle" class="control-label">Cantidad Detalle</label>
                                    <input type="text" class="form-control" id="cantidad_solicitud_detalle" name="cantidad_solicitud_detalle" value="<?php echo $resEdit->cantidad_solicitud_detalle; ?>"  placeholder="Cantidad Solicitud Detalle">
                                    <input type="hidden" name="cantidad_solicitud_detalle" id="cantidad_solicitud_detalle" value="<?php echo $resEdit->cantidad_solicitud_detalle; ?>" class="form-control"/>
    					            <div id="mensaje_cantidad_solicitud_detalle" class="errores"></div>
                                 </div>
                             </div>
                          </div>
                           <div class="row">
                         	<div class="col-xs-12 col-md-3 col-md-3 ">
                            	<div class="form-group">
                                	<label for="id_solicitud_cabeza" class="control-label">Cantidad Detalle</label>
                                    <input type="text" class="form-control" id="id_solicitud_cabeza" name="id_solicitud_cabeza" value="<?php echo $resEdit->id_solicitud_cabeza; ?>"  placeholder="Cantidad Solicitud Detalle">
                                    <input type="hidden" name="id_solicitud_cabeza" id="id_solicitud_cabeza" value="<?php echo $resEdit->id_solicitud_cabeza; ?>" class="form-control"/>
    					            <div id="mensaje_id_solicitud_cabeza" class="errores"></div>
                                 </div>
                             </div>
                          </div>
                      <?php } } else {?>                		    
                      	  <div class="row">
                		  	<div class="col-xs-12 col-md-3 col-md-3 ">
                    			<div class="form-group">
                                  <label for="cantidad_solicitud_detalle" class="control-label">Cantidad Solicitud Detalle</label>
                                  <input type="text" class="form-control" id="cantidad_solicitud_detalle" name="cantidad_solicitud_detalle" value=""  placeholder="Cantidad Solicitud Detalle">
                                  <div id="mensaje_cantidad_solicitud_detalle" class="errores"></div>
                                 </div>
                             </div>
                            </div>	
                              <div class="row">
                		  	<div class="col-xs-12 col-md-3 col-md-3 ">
                    			<div class="form-group">
                                  <label for="id_solicitud_cabeza" class="control-label">Id Solicitud Cabeza</label>
                                  <input type="text" class="form-control" id="id_solicitud_cabeza" name="id_solicitud_cabeza" value=""  placeholder="Id Solicitud Cabeza">
                                  <div id="mensaje_id_solicitud_cabeza" class="errores"></div>
                                 </div>
                             </div>
                            </div>	
                    		            
                    		            
                     <?php } ?>
                     	<div class="row">
            			    <div class="col-xs-12 col-md-4 col-md-4 " style="margin-top:15px;  text-align: center; ">
                	   		    <div class="form-group">
            	                  <button type="submit" id="Guardar" name="Guardar" class="btn btn-success">Guardar</button>
        	                    </div>
    	        		    </div>
            		    </div>
          		 	
          		 	</form>
          
        			</div>
      			</div>
    		</section>
    		
    <!-- seccion para el listado de roles -->
      <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Listado de Solicitud Detalle</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        
        <div class="box-body">
        
        
       <div class="ibox-content">  
      <div class="table-responsive">
        
		<table  class="table table-striped table-bordered table-hover dataTables-example">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Cantidad</th>
						  <th>Solicitud Cabeza</th>

                        </tr>
                      </thead>


                      <tbody>
                      <?php $i=0;?>
    						<?php if (!empty($resultSet)) {  foreach($resultSet as $res) {?>
    						<?php $i++;?>
            	        		<tr>
            	                   <td > <?php echo $i; ?>  </td>
            		               <td > <?php echo $res->cantidad_solicitud_detalle; ?>     </td> 
            		               <td > <?php echo $res->id_solicitud_cabeza; ?>     </td> 
            		              
            		               <td>
            			           		<div class="right">
            			                    <a href="<?php echo $helper->url("SolicitudDetalle","index"); ?>&id_solicitud_detalle=<?php echo $res->id_solicitud_detalle; ?>" class="btn btn-warning" style="font-size:65%;"data-toggle="tooltip" title="Editar"><i class='glyphicon glyphicon-edit'></i></a>
            			                </div>
            			            
            			             </td>
            			             <td>   
            			                	<div class="right">
            			                    <a href="<?php echo $helper->url("SolicitudDetalle","borrarId"); ?>&id_solicitud_detalle=<?php echo $res->id_solicitud_detalle; ?>" class="btn btn-danger" style="font-size:65%;"data-toggle="tooltip" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>
            			                </div>
            			              
            		               </td>
            		    		</tr>
            		        <?php } } ?>
                    
                    </tbody>
                    </table>
       
        </div>
         </div>
        
        
        </div>
        </div>
        </section>
  		</div>
  
  
 
 	<?php include("view/modulos/footer.php"); ?>	

   <div class="control-sidebar-bg"></div>
 </div>
    
    
   <?php include("view/modulos/links_js.php"); ?>
    	
  </body>
</html>

<!-- script pagina anterior -->
<script type="text/javascript">
     
        	   $(document).ready( function (){
        		   pone_espera();
        		   
	   			});

        	   function pone_espera(){

        		   $.blockUI({ 
        				message: '<h4><img src="view/images/load.gif" /> Espere por favor, estamos procesando su requerimiento...</h4>',
        				css: { 
        		            border: 'none', 
        		            padding: '15px', 
        		            backgroundColor: '#000', 
        		            '-webkit-border-radius': '10px', 
        		            '-moz-border-radius': '10px', 
        		            opacity: .5, 
        		            color: '#fff',
        		           
        	        		}
        	    });
            	
		        setTimeout($.unblockUI, 3000); 
		        
        	   }

 </script>
       
       
      
 



