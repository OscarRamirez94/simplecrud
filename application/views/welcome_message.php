<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<html>
<head>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
</head>
<body>
<form  id='altaclienteform' >


<span class="label label-default">Nombre</span>
<input type='text' name='nombre'</input>
<br>
<span class="label label-default">Apeido Paterno</span>
<input type='text' name='apeido_paterno'</input>
<br>
<span class="label label-default">Apeido Materno</span>
<input type='text' name='apeido_materno'</input>
<br>
<span class="label label-default">Celular</span>
<input type='text' name='celular'</input>
<br>
<span class="label label-default">Correo Electronico</span>
<input type='text' name='email'</input>
<br>
<button type='button' Onclick="altaclienteform();">enviar</button>
</form>
</body>
</html>
<script type="text/javascript">
function altaclienteform() {
  console.log($('#altaclienteform').serialize());
    jQuery.ajax({
        type: 'POST',
        data: $('#altaclienteform').serialize(),

        url: 'http://localhost/examen/index.php/Welcome/altaCliente',
        success: function (data, textStatus) {
            console.log(data);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {}
    });
}
</script>
