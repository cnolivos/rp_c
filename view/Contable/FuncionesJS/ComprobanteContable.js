	
  // INICIALIZAR EL JAVA SCRIPT
	  
      $(document).ready(function(){ 	 
	     load_temp_comprobantes(1);
	  }); 

    
   
   // FUNCIONES USADAS EN TODO EL FORMULARIO COMPROBANTES CONTABLES

        
      function limpiar() {
       
    	$('#plan_cuentas').val("0");
		$('#id_plan_cuentas').val("");
		$('#nombre_plan_cuentas').val("");
		$('#descripcion_dcomprobantes').val("");
		$('#debe_dcomprobantes').val("0.00");
		$('#haber_dcomprobantes').val("0.00");
      
      }
      
      
   
   // AUTOCOMPLETE CODIGO PLAN CUENTAS
	  
	       $( "#id_plan_cuentas" ).autocomplete({
					source: 'index.php?controller=ComprobanteContable&action=AutocompleteComprobantesCodigo',
					minLength: 1
			});
	
			$("#id_plan_cuentas").focusout(function(){
				
				$.ajax({
					url:'index.php?controller=ComprobanteContable&action=AutocompleteComprobantesDevuelveNombre',
					type:'POST',
					dataType:'json',
					data:{codigo_plan_cuentas:$('#id_plan_cuentas').val()}
				}).done(function(respuesta){
	
					$('#nombre_plan_cuentas').val(respuesta.nombre_plan_cuentas);
					$('#plan_cuentas').val(respuesta.id_plan_cuentas);
				
				}).fail(function(respuesta) {
					  
					$('#plan_cuentas').val("0");
					$('#id_plan_cuentas').val("");
					$('#nombre_plan_cuentas').val("");
					$('#descripcion_dcomprobantes').val("");
					$('#debe_dcomprobantes').val("0.00");
					$('#haber_dcomprobantes').val("0.00");
					
				});
				
			});   
	 	



    // AUTOCOMPLETE NOMBRE PLAN CUENTAS
   
		
			$("#nombre_plan_cuentas").autocomplete({
					source: 'index.php?controller=ComprobanteContable&action=AutocompleteComprobantesNombre',
					minLength: 1
			});
	
			$("#nombre_plan_cuentas").focusout(function(){
				$.ajax({
					url:'index.php?controller=ComprobanteContable&action=AutocompleteComprobantesDevuelveCodigo',
					type:'POST',
					dataType:'json',
					data:{nombre_plan_cuentas:$('#nombre_plan_cuentas').val()}
				}).done(function(respuesta){
	
					$('#id_plan_cuentas').val(respuesta.codigo_plan_cuentas);
					$('#plan_cuentas').val(respuesta.id_plan_cuentas);
				
				}).fail(function(respuesta) {
					$('#plan_cuentas').val("0");
					$('#id_plan_cuentas').val("");
					$('#nombre_plan_cuentas').val("");
					$('#descripcion_dcomprobantes').val("");
					$('#debe_dcomprobantes').val("0.00");
					$('#haber_dcomprobantes').val("0.00");
					
				});
				 
				
			});   
			
	

	
	
	// VALIDAR QUE VAYA SOLO EL DEBE O SOLO HABER
	
	  function validardebe(field) {
			var nombre_elemento = field.id;
			if(nombre_elemento=="debe_dcomprobantes")
			{
				$("#haber_dcomprobantes").val("0.00");
				
			}else
			{
				$("#debe_dcomprobantes").val("0.00");
			}
		  }
	
	
	
	
	  // PARA CARGAR CONSULTA PLAN DE CUENTAS AL MODAL
	  
	   $('#myModal').on('show.bs.modal', function (event) {
      	load_plan_cuentas(1);
      	  var modal = $(this)
      	  modal.find('.modal-title').text('Plan de Cuentas')
      
      	});
            
	
		function load_plan_cuentas(pagina){
		 var search=$("#q").val();
		 var con_datos={
					  action:'ajax',
					  page:pagina
					  };
		$("#load_plan_cuentas").fadeIn('slow');
		$.ajax({
		         beforeSend: function(objeto){
		           $("#load_plan_cuentas").html('<center><img src="view/images/ajax-loader.gif"> Cargando...</center>');
		         },
		         url: 'index.php?controller=ComprobanteContable&action=consulta_plan_cuentas&search='+search,
		         type: 'POST',
		         data: con_datos,
		         success: function(x){
		           $("#cargar_plan_cuentas").html(x);
		           $("#load_plan_cuentas").html("");
		           $("#tabla_plan_cuentas").tablesorter(); 
		           
		         },
		        error: function(jqXHR,estado,error){
		          $("#cargar_plan_cuentas").html("Ocurrio un error al cargar la información de Plan de Cuentas..."+estado+"    "+error);
		        }
		      });
		
		 }
	
	
	
	   // CARGAR TEMPORAL COMPROBANTES REGISTRADOS
	
	    function load_temp_comprobantes(pagina){
	        
           	var search=$("#search_temp_comprobantes").val();
           
            $("#load_temp_comprobantes_registrados").fadeIn('slow');
            
            $.ajax({
                    beforeSend: function(objeto){
                      $("#load_temp_comprobantes_registrados").html('<center><img src="view/images/ajax-loader.gif"> Cargando...</center>');
                    },
                    url: 'index.php?controller=ComprobanteContable&action=consulta_temp_comprobantes&search='+search,
                    type: 'POST',
                    data: {action:'ajax', page:pagina},
                    success: function(x){
                      $("#temp_comprobantes_registrados").html(x);
                      $("#load_temp_comprobantes_registrados").html("");
                      $("#tabla_temp_comprobantes").tablesorter(); 
                      
                    },
                   error: function(jqXHR,estado,error){
                     $("#temp_comprobantes_registrados").html("Ocurrio un error al cargar la información de Cuentas Registradas..."+estado+"    "+error);
                   }
             });
        }

	// AGREGAR REGISTRO DE TABLA TEMPORAL
	    

	 	function agregar_temp_comprobantes ()
		{
			var plan_cuentas=document.getElementById('plan_cuentas').value;
			var descripcion_dcomprobantes=document.getElementById('descripcion_dcomprobantes').value;
			var debe_dcomprobantes=document.getElementById('debe_dcomprobantes').value;
			var haber_dcomprobantes=document.getElementById('haber_dcomprobantes').value;
			
			var error="TRUE";
			
			if (plan_cuentas == 0)
	    	{
		    	
	    		$("#mensaje_id_plan_cuentas").text("Seleccione Cuenta");
	    		$("#mensaje_id_plan_cuentas").fadeIn("slow"); //Muestra mensaje de error
	            
	    		error ="TRUE";
	    		return false;
		    }
	    	else 
	    	{
	    		$("#mensaje_id_plan_cuentas").fadeOut("slow"); //Oculta mensaje de error
	    		error ="FALSE";
			}   
			
			
			if (debe_dcomprobantes == 0.00 && haber_dcomprobantes == 0.00)
	    	{
		    	
	    		$("#mensaje_debe_dcomprobantes").text("Ingrese Valor en Debe o en Haber");
	    		$("#mensaje_debe_dcomprobantes").fadeIn("slow"); //Muestra mensaje de error
	            error ="TRUE";
	            return false;
		    }
	    	else 
	    	{
	    		$("#mensaje_debe_dcomprobantes").fadeOut("slow"); //Oculta mensaje de error
	    		error ="FALSE";
			}   
			
			
			
			if(error == "FALSE"){
				
				$.ajax({
		            type: "POST",
		            url: 'index.php?controller=ComprobanteContable&action=insertar_temp_comprobantes',
		            data: "plan_cuentas="+plan_cuentas+"&descripcion_dcomprobantes="+descripcion_dcomprobantes+"&debe_dcomprobantes="+debe_dcomprobantes+"&haber_dcomprobantes="+haber_dcomprobantes,
		        	
		            success: function(datos){
		            	limpiar();
		            	load_temp_comprobantes(1);
		            	
		            }
				});
				
			}
			
			
		}
	 	
	 	
	 	 $( "#id_plan_cuentas" ).focus(function() {
			  $("#mensaje_id_plan_cuentas").fadeOut("slow");
		  });
	 	
	 	 $( "#debe_dcomprobantes" ).focus(function() {
			  $("#mensaje_debe_dcomprobantes").fadeOut("slow");
		  });
	 	
	
	// ELIMINAR REGISTRO DE TABLA TEMPORAL
	    
	    function eliminar_temp_comprobantes(id)
		{
			$.ajax({
	            type: "POST",
	            url: 'index.php?controller=ComprobanteContable&action=eliminar_temp_comprobantes',
	            data: "id_temp_comprobantes="+id,
	        	 success: function(datos){
	        		 	load_temp_comprobantes(1);
	        	 }
			});
		}
	
	    
	    
	  // PARA CONSULTAR NUMERO DE COMPROBANTES
	    
	    
       function load_consecutivo_comprobantes(id_tipo_comprobantes){
	     
    	   $.ajax({
                    url: 'index.php?controller=ComprobanteContable&action=consulta_consecutivos',
                    type: 'POST',
                    data: {action:'ajax', id_tipo_comprobantes:id_tipo_comprobantes},
                    success: function(x){
                      $("#numero_ccomprobantes").val(x);
                      
                    }
             });
        }
	    
	    
	    // PARA HABILITAR NUMERO DE COMPROBANTES    
    
	      $("#id_tipo_comprobantes").click(function() {
			
	    	  var id_tipo_comprobantes = $(this).val();
				
	          if(id_tipo_comprobantes > 0 )
	          {
	           load_consecutivo_comprobantes(id_tipo_comprobantes);
	       	   $("#div_datos").fadeIn("slow");
	       	   
	          }
	       	  else
	          {
	       	   $("#div_datos").fadeOut("slow");
	          }
	         
		    });
		    
		    $("#id_tipo_comprobantes").change(function() {
				  
	              var id_tipo_comprobantes = $(this).val();
					
	              if(id_tipo_comprobantes > 0)
	              {
	               load_consecutivo_comprobantes(id_tipo_comprobantes);
	   	       	   $("#div_datos").fadeIn("slow");
	              }
	              else
	              {
	           	   $("#div_datos").fadeOut("slow");
	              }
	              
	        });
		
	      
		    
		
		    
		 // INSERTAR COMPROBANTES PROCESO FINAL
		       
			function insertar_comprobantes()
			{
					
				var id_tipo_comprobantes=document.getElementById('id_tipo_comprobantes').value;
				var fecha_ccomprobantes=document.getElementById('fecha_ccomprobantes').value;
				var concepto_ccomprobantes=document.getElementById('concepto_ccomprobantes').value;
				
				var error="TRUE";
				
				if (id_tipo_comprobantes == 0)
		    	{
			    	
		    		$("#mensaje_id_tipo_comprobantes").text("Seleccione Tipo");
		    		$("#mensaje_id_tipo_comprobantes").fadeIn("slow"); //Muestra mensaje de error
		            
		    		error ="TRUE";
		    		return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_id_tipo_comprobantes").fadeOut("slow"); //Oculta mensaje de error
		    		error ="FALSE";
				}
				
								
							
			}
		  
		      
			 $( "#id_tipo_comprobantes" ).focus(function() {
				  $("#mensaje_id_tipo_comprobantes").fadeOut("slow");
			  });
		      
		      
		      
		  
		    
		    
		    
		    
	