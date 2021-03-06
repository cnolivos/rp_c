    <!DOCTYPE HTML>
	<html lang="es">
    <head>
        
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Capremci</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
    <?php include("view/modulos/links_css.php"); ?>		
     
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
   
 
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
        <li class="active">Productos</li>
      </ol>
     </section>
   

     <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registrar Comprobantes</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        
        <div class="box-body">
             <div class="col-lg-12 col-md-12 col-xs-12">
	         <div class="panel panel-primary">
	         <div class="panel-heading">
	          <h4><i class='glyphicon glyphicon-edit'></i>  Nuevo Comprobante</h4>
			 </div>
		     <div class="panel-body">
		     <div class="row">
	         <div class="col-md-2 col-lg-2 col-xs-12">
	              <label for="id_tipo_comprobantes" class="control-label">Tipo:</label>
				  <select name="id_tipo_comprobantes" id="id_tipo_comprobantes"  class="form-control">
				  <option value="0" selected="selected">--Seleccione--</option>
                     <?php foreach($resultTipCom as $res) {?>
					  <option value="<?php echo $res->id_tipo_comprobantes; ?>" ><?php echo $res->nombre_tipo_comprobantes; ?> </option>
					 <?php } ?>
				   </select> 
                   <div id="mensaje_id_tipo_comprobantes" class="errores"></div>
             </div>
             
             <div id="div_datos" style="display: none;">
             <div class="col-md-2 col-lg-2 col-xs-12">
		     					   <label for="numero_ccomprobantes" class="control-label">Número:</label>
		        				   <input type="text" class="form-control" id="numero_ccomprobantes" name="numero_ccomprobantes" value=""  readonly>
             </div>
	         </div>
             
             <div class="col-md-2 col-lg-2 col-xs-12">
		     					   <label for="fecha_ccomprobantes" class="control-label">Fecha:</label>
		
		     					   
		        				   <input type="date" class="form-control" id="fecha_ccomprobantes" name="fecha_ccomprobantes" min="<?php echo date('Y-m-d', mktime(0,0,0, date('m'), date("d", mktime(0,0,0, date('m'), 1, date('Y'))), date('Y'))); ?>" max="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d');?>" >
             					   <div id="mensaje_fecha_ccomprobantes" class="errores"></div>
             </div>
	         
  		     <div class="col-xs-12 col-md-8 col-lg-8">
		     <div class="form-group">
		                          <label for="concepto_ccomprobantes" class="control-label">Concepto de Pago:</label>
                                  <input type="text" class="form-control" id="concepto_ccomprobantes" name="concepto_ccomprobantes" value=""  placeholder="Concepto de Pago">
                                  <div id="mensaje_concepto_ccomprobantes" class="errores"></div> 
             </div>
		     </div>
		
		    <div class="col-xs-2 col-md-2 col-lg-2">
		     <div class="form-group">
		                          <label for="nombre_proveedores" class="control-label">Nombre de Proveedor:</label>
                                  <input type="text" class="form-control" id="nombre_proveedores" name="nombre_proveedores" value=""  placeholder="Nombre Proveedores">
                                  <div id="mensaje_nombre_proveedores" class="errores"></div> 
             </div>
		     </div>
	
		   <div class="col-xs-12 col-md-2 col-lg-2">
		     <div class="form-group">
		                          <label for="identificacion_proveedores" class="control-label">Ruc de Proveedor:</label>
                                  <input type="text" class="form-control" id="identificacion_proveedores" name="identificacion_proveedores" value=""  placeholder="Ruc Proveedores">
                                  <div id="mensaje_identificacion_proveedores" class="errores"></div> 
             </div>
		     </div>
	
	   <div class="col-xs-12 col-md-2 col-lg-2">
		     <div class="form-group">
		                          <label for="retencion_ccomprobantes" class="control-label">Retención Proveedor:</label>
                                  <input type="text" class="form-control" id="retencion_ccomprobantes" name="retencion_ccomprobantes" value=""  placeholder="Retencion Comprobantes">
                                  <div id="mensaje_retencion_ccomprobantes" class="errores"></div> 
             </div>
		     </div>
	
	  <div class="col-xs-12 col-md-2 col-lg-2">
		     <div class="form-group">
		                          <label for="referencia_doc_ccomprobantes" class="control-label">Referencia Doc:</label>
                                  <input type="text" class="form-control" id="referencia_doc_ccomprobantes" name="referencia_doc_ccomprobantes" value=""  placeholder="Referencia Comprobantes">
                                  <div id="mensaje_referencia_doc_ccomprobantes" class="errores"></div> 
             </div>
		     </div>
	
	   <div class="col-md-2 col-lg-2 col-xs-2">
	              <label for="id_forma_pago" class="control-label">Forma de Pago:</label>
				  <select name="id_forma_pago" id="id_forma_pago"  class="form-control">
				  <option value="0" selected="selected">--Seleccione--</option>
                     <?php foreach($resultFormaPago as $res) {?>
					  <option value="<?php echo $res->id_forma_pago; ?>" ><?php echo $res->nombre_forma_pago; ?> </option>
					 <?php } ?>
				   </select> 
                   <div id="mensaje_id_forma_pago" class="errores"></div>
             </div>
     
	
	  <div class="col-xs-12 col-md-2 col-lg-2">
		     <div class="form-group">
		                          <label for="numero_cuenta_banco_ccomprobantes" class="control-label">Número de Cuenta:</label>
                                  <input type="text" class="form-control" id="numero_cuenta_banco_ccomprobantes" name="numero_cuenta_banco_ccomprobantes" value=""  placeholder="Número Cuenta">
                                  <div id="mensaje_numero_cuenta_banco_ccomprobantes" class="errores"></div> 
             </div>
		     </div>
	
	  <div class="col-xs-12 col-md-2 col-lg-2">
		     <div class="form-group">
		                          <label for="numero_cheque_ccomprobantes" class="control-label">Número de Cheque:</label>
                                  <input type="text" class="form-control" id="numero_cheque_ccomprobantes" name="numero_cheque_ccomprobantes" value=""  placeholder="Número Cheque">
                                  <div id="mensaje_numero_cheque_ccomprobantes" class="errores"></div> 
             </div>
		     </div>
	
	  <div class="col-xs-12 col-md-10 col-lg-10">
		     <div class="form-group">
		                          <label for="observaciones_ccomprobantes" class="control-label">Observación:</label>
                                  <input type="text" class="form-control" id="observaciones_ccomprobantes" name="observaciones_ccomprobantes" value=""  placeholder="Observación">
                                  <div id="mensaje_observaciones_ccomprobantes" class="errores"></div> 
             </div>
		     </div>
		    
  		     <div class="col-md-12 col-lg-12 col-xs-12">
					<div class="pull-right">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
						 <span class="glyphicon glyphicon-search"></span> Buscar Cuentas
						</button>
					</div>	
			 </div>	
			 	
		 </div> 
		</div>
	   </div>
	  </div>
	         
	       
  			 
	         <div class="col-lg-12 col-md-12 col-xs-12">
	         <div class="panel panel-primary">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Buscar Cuentas</h4>
	         </div>
	         <div class="panel-body">
  			 <div class="row">
  			 <div class="form-group" style="margin-top:13px">
             <div class="col-xs-2 col-md-2 col-lg-2">
                                  <label for="id_plan_cuentas" class="control-label" >#Cuenta: </label>
                                  <input type="text" class="form-control" id="id_plan_cuentas" name="id_plan_cuentas" value=""  placeholder="Search">
                                  <div id="mensaje_id_plan_cuentas" class="errores"></div>
                                  <input type="hidden" class="form-control" id="plan_cuentas" name="plan_cuentas" value="0"  placeholder="Search">
                                  <span class="help-block"></span>
             </div>
             </div>
		     
		     <div class="form-group">
		     <div class="col-xs-3 col-md-3 col-lg-3">                     
                                  <label for="nombre_plan_cuentas" class="control-label">Nombre: </label>
                                  <input type="text" class="form-control" id="nombre_plan_cuentas" name="nombre_plan_cuentas" value=""  placeholder="Search">
                                  <span class="help-block"></span>
             </div>
		     </div>
		     
		     <div class="form-group">
             <div class="col-xs-3 col-md-3 col-lg-3">
		                          <label for="descripcion_dcomprobantes" class="control-label">Descripción: </label>
                                  <input type="text" class="form-control" id="descripcion_dcomprobantes" name="descripcion_dcomprobantes" value=""  placeholder="">
                                  <span class="help-block"></span>
             </div>
		     </div>
		
		     
		     <div class="form-group">
             <div class="col-xs-2 col-md-2 col-lg-2">
		                          <label for="debe_dcomprobantes" class="control-label">Debe: </label>
                                  <input type="text" class="form-control cantidades1" id="debe_dcomprobantes" name="debe_dcomprobantes" value='0.00' 
                                        data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false" onfocus="validardebe(this);">
                                   <div id="mensaje_debe_dcomprobantes" class="errores"></div>
                                 
             </div>
		     </div>
		     
		     
		     <div class="form-group">
             <div class="col-xs-2 col-md-2 col-lg-2">
		                          <label for="haber_dcomprobantes" class="control-label">Haber: </label>
                                   <input type="text" class="form-control cantidades1" id="haber_dcomprobantes" name="haber_dcomprobantes" value='0.00' 
                                        data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false" onfocus="validardebe(this);">
                                   <div id="mensaje_haber_dcomprobantes" class="errores"></div>
             </div>
		     </div>
		     </div>
		     
		     
		    <div class="row">
		    <div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center;">
		    <div class="form-group">
                  <button type="button" onclick="agregar_temp_comprobantes();" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
		    </div>
		    </div>
		    
		    <div class="row">
		            <div class="pull-right" style="margin-right:15px;">
						<input type="text" value="" class="form-control" id="search_temp_comprobantes" name="search_temp_comprobantes" onkeyup="load_temp_comprobantes(1)" placeholder="search.."/>
					</div>
					<div id="load_temp_comprobantes_registrados" ></div>	
					<div id="temp_comprobantes_registrados"></div>	
		    </div>
		    </div>
	        </div>
	        </div>
	     
	      
		   <div class="row">
		   <div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center; margin-top:20px" > 
           <div class="form-group">
            					  <button type="button" onclick="insertar_comprobantes();" class="btn btn-success">Guardar</button>
           </div>
           </div>
           </div>     
          
	     
	
	 </div>
	 </div>
	 </section>
	 </div>
 
 
 
 <!-- para modales -->
 
 
 
 	       	<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Buscar Cuentas</h4>
				  </div>
				
				  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="q" placeholder="Buscar Plan de Cuentas" onkeyup="load_plan_cuentas(1)">
						</div>
						<button type="button" class="btn btn-default" onclick="load_plan_cuentas(1)"><span class='glyphicon glyphicon-search'></span></button>
					  </div>
					
					<div id="load_plan_cuentas" ></div>
					<div id="cargar_plan_cuentas" ></div>
					</form>
				  </div>
				<br>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				  </div>
				
				</div>
			  </div>
			</div>
	
	
 
 	<?php include("view/modulos/footer.php"); ?>	

   <div class="control-sidebar-bg"></div>
 </div>
     
   
    <?php include("view/modulos/links_js.php"); ?>
   	 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="view/Contable/FuncionesJS/ComprobanteContable.js"></script>
    
   
	<script src="view/bootstrap/otros/inputmask_bundle/jquery.inputmask.bundle.js"></script>
       <script>
      $(document).ready(function(){
      $(".cantidades1").inputmask();
      });
	  </script>
	
 </body>
</html>