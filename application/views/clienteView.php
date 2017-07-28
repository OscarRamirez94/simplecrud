<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Trainee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



  </head>


<body>
<div class="container">
  <div class="page-header">
		  <center><h1>CRUD <small> Cliente</small></h1></center>
	</div>
  	<div class="messages"></div>
  <!-- Button trigger modal -->


  <div class="btn-group" role="group">
      <button type="button" class="btn btn-default pull pull-right" id ='btnAgregar'>Agregar Cliente</button>
  </div>
  <table class="table table-bordered table-responsive" style="margin-top: 20px;">
  		<thead>
  			<tr>
  				<td>ID</td>
  				<td>Nombre</td>
  				<td>Apellido Paterno</td>
  				<td>Apellido Materno</td>
  				<td>Email</td>
          <td>Celular</td>
          <td>Accion</td>
  			</tr>
  		</thead>
  		<tbody id='mostrarDatos'>

  		</tbody>
  	</table>
</div>
<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Cliente</h4>
        </div>
        <div class="modal-body">
          <form id ='altaClienteForm'  action="" method="post">

            <div class="form-group">
              <label for="recipient-name" class="control-label">Nombre :</label>
              <input type="text" class="form-control" id="nombre" name='nombre'>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Apellido Paterno :</label>
              <input type="text" class="form-control" id="apeido_paterno" name='apeido_paterno'>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Apellido Materno:</label>
              <input type="text" class="form-control" id="apeido_materno" name='apeido_materno'>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Correo Electronico :</label>
              <input type="email" class="form-control" id="email" name='email'>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Celular :</label>
              <input type="number" class="form-control" id="celular" name='celular'>
            </div>
            <input type="hidden" name="id_cliente" value="0" id='id_cliente'>
            <input type="hidden" name="estatus" value="No">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" id='btnGuardar' class="btn btn-primary">Enviar</button>
        </div>
      </div>
    </div>
  </div>
  <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmacion de Eliminacion</h4>
      </div>
      <div class="modal-body">
        	¿Estas seguro de eliminar el registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
</body>
<script type="text/javascript">
$(function(){

  mostrarClientes();
  //Add New
		$('#btnAgregar').click(function(){
			$('#modalCliente').modal('show');
			$('#modalCliente').find('.modal-title').text('Agregar Cliente');
			$('#altaClienteForm').attr('action','<?php echo base_url()?>Cliente/agregarCliente');
		});
    $('#btnGuardar').click(function(){

    var url = $('#altaClienteForm').attr('action');
    var url = $('#altaClienteForm').attr('action');
    var data = $('#altaClienteForm').serialize();
    //validate form
    var  nombre = $('input[name=nombre]');
    var  apeido_paterno= $('input[name=apeido_paterno]');
    var  apeido_materno= $('input[name=apeido_materno]');
    var  email= $('input[name=email]');
    var  celular= $('input[name=celular]');
    var result = '';
    if(nombre.val()==''){
      nombre.parent().parent().addClass('has-error');
    }else{
      nombre.parent().parent().removeClass('has-error');
      result +='1';
    }
    if(apeido_paterno.val()==''){
      apeido_paterno.parent().parent().addClass('has-error');
    }else{
      apeido_paterno.parent().parent().removeClass('has-error');
      result +='2';
    }

    if(result=='12'){
      $.ajax({
        type: 'ajax',
        method: 'POST',
        url: url,
        data: data,
        async: false,
        dataType: 'json',
        success: function(response){
          if(response.success){
            $('#modalCliente').modal('hide');
            $('#altaClienteForm')[0].reset();
            if(response.type=='add'){
              var type = 'added'
            }else if(response.type=='update'){
              var type ="updated"
            }
            $('.alert-success').html('Cliente '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');
            mostrarClientes();
          }else{
            alert('Error');
          }
        },
        error: function(){
          alert('No se puedo registrar el cliente');
        }
      });
    }
  });
  //editarcliente
  $('#mostrarDatos').on('click', '.item-edit', function(){
  			var id_cliente = $(this).attr('data');
  			$('#modalCliente').modal('show');
  			$('#modalCliente').find('.modal-title').text('Editar Cliente');
  			$('#altaClienteForm').attr('action', '<?php echo base_url() ?>cliente/modificarCliente');
  			$.ajax({
  				type: 'ajax',
  				method: 'get',
  				url: '<?php echo base_url() ?>cliente/editCliente',
  				data: {id_cliente: id_cliente},
  				async: false,
  				dataType: 'json',
  				success: function(data){
            $('input[name=nombre]').val(data.nombre);
            $('input[name=apeido_paterno]').val(data.apeido_paterno);
            $('input[name=apeido_materno]').val(data.apeido_materno);
  					$('input[name=email]').val(data.email);
  					$('input[name=celular]').val(data.celular);
            $('input[name=id_cliente]').val(data.id_cliente);
  					$('input[name=estatus]').val(data.estatus);
  				},
  				error: function(){
  					alert('No se puedo editar el registro');
  				}
  			});
  		});

  		//delete-
  		$('#mostrarDatos').on('click', '.item-delete', function(){
  			var id_cliente = $(this).attr('data');
  			$('#deleteModal').modal('show');
  			//prevent previous handler - unbind()
  			$('#btnDelete').unbind().click(function(){
  				$.ajax({
  					type: 'ajax',
  					method: 'POST',
  					async: false,
  					url: '<?php echo base_url()?>cliente/eliminarCliente',
  					data:{id_cliente:id_cliente},
  					dataType: 'json',
  					success: function(response){
  						if(response.success){
  							$('#deleteModal').modal('hide');
  							$('.alert-success').html('Registro eliminado correctamente').fadeIn().delay(4000).fadeOut('slow');
  							mostrarClientes();
  						}else{
  							alert('Error');
  						}
  					},
  					error: function(){
  						alert('Error deleting');
  					}
  				});
  			});
  		});

  function mostrarClientes(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>Cliente/mostrarClientes',
				async: false,
				dataType: 'json',
				success: function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
						html +='<tr>'+
									'<td>'+data[i].id_cliente+'</td>'+
									'<td>'+data[i].nombre+'</td>'+
                  '<td>'+data[i].apeido_paterno+'</td>'+
									'<td>'+data[i].apeido_materno+'</td>'+
                  '<td>'+data[i].email+'</td>'+

									'<td>'+data[i].celular+'</td>'+
									'<td>'+
										'<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id_cliente+'">Edit</a>  '+
										'<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id_cliente+'">Delete</a>'+
									'</td>'+
							    '</tr>';
					}
					$('#mostrarDatos').html(html);
				},
				error: function(){
					alert('No se pueden mostrar clientes');
				}
			});
		}
});


</script>
</html>
