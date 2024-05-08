
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>Usuarios</title>
</head>
<body>
    <h2>Crear Nuevo Usuario</h2>
    <input type="button" value="Crear Usuario" id="botonCrearUsuario">
    <div id="modalEditar" style="display: none;">
    <h2>Editar Usuario</h2>
    <form id="formEditarUsuario"  method="POST">
        <!-- Campos de edición -->
        <input type="hidden" id="idUsuarioEditar" name="idUsuarioEditar">
        <label for="nombreEditar">Nombre:</label>
        <input type="text" id="nombreEditar" name="nombreEditar">
        <br>
        <label for="apellidoPaternoEditar">Apellido Paterno:</label>
        <input type="text" id="apellidoPaternoEditar" name="apellidoPaternoEditar">
        <br>
        <label for="apellidoMaternoEditar">Apellido Materno:</label>
        <input type="text" id="apellidoMaternoEditar" name="apellidoMaternoEditar">
        <br>
        <label for="carnetEditar">Carnet de identidad:</label>
        <input type="text" id="carnetEditar" name="carnetEditar">
        <br>
        <label for="celularEditar">Celular:</label>
        <input type="text" id="celularEditar" name="celularEditar">
        <br>
        <label for="departamentoEditar">Departamento:</label>
        <input type="text" id="departamentoEditar" name="departamentoEditar">
        <br>
        <label for="tipoCuenta">Tipo de Cuenta:</label>
        <select id="tipoCuenta" name="tipoCuenta">
        <option value="Cuenta de Ahorro">Cuenta de Ahorro</option>
        <option value="Cuenta de Inversión">Cuenta de Inversión</option>
        <option value="Cuenta Corriente">Cuenta Corriente</option>
        </select>
        <br>
        <label for="saldo">Saldo:</label>
        <input type="text" id="saldo" name="saldo">
        <br>
        <br>
            <input type="submit" value="Guardar Cambios">
        </form>
</div>
    <!-- Tabla para mostrar usuarios -->
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Carnet de Identidad</th>
            <th>Celular</th>
            <th>Departamento</th>
            <th>Cuenta</th>
            <th>Saldo</th>
            <th>Acciones</th>
        </tr>
        <?php
        include 'conexion.php';
        include 'usuarios.php';
        $personas = obtenerUsuarios($conexion);
        foreach ($personas as $usuario) {
            echo "<tr>";
            echo "<td>{$usuario['nombre']}</td>";
            echo "<td>{$usuario['apellidoPaterno']}</td>";
            echo "<td>{$usuario['apellidoMaterno']}</td>";
            echo "<td>{$usuario['ci']}</td>";
            echo "<td>{$usuario['celular']}</td>";
            echo "<td>{$usuario['departamento']}</td>";
            echo "<td>{$usuario['tipo']}</td>";
            echo "<td>{$usuario['saldo']}</td>";
            echo "<td><a href='eliminar_usuario.php?id={$usuario['id_persona']}'>Eliminar</a>
            <a href='#' class='editar' data-id='{$usuario['id_persona']}' data-nombre='{$usuario['nombre']}' data-apellido-paterno='{$usuario['apellidoPaterno']}' data-apellido-materno='{$usuario['apellidoMaterno']}' data-carnet='{$usuario['ci']}' data-celular='{$usuario['celular']}' data-departamento='{$usuario['departamento']}' data-tipo='{$usuario['tipo']}' data-saldo='{$usuario['saldo']}'>Editar</a>            
            </td>";
        }
        ?>
    </table>
    <script>
    function abrirModalUsuario(idUsuario, nombre = '', apellidoPaterno = '', apellidoMaterno = '', carnet = '', celular = '', departamento='', tipoCuenta='', saldo='', crearUsuario = false) {
        document.getElementById('idUsuarioEditar').value = idUsuario;
        document.getElementById('nombreEditar').value = nombre;
        document.getElementById('apellidoPaternoEditar').value = apellidoPaterno;
        document.getElementById('apellidoMaternoEditar').value = apellidoMaterno;
        document.getElementById('carnetEditar').value = carnet;
        document.getElementById('celularEditar').value = celular;
        document.getElementById('departamentoEditar').value = departamento;
        document.getElementById('tipoCuenta').value = tipoCuenta;
        document.getElementById('saldo').value = saldo;
        if (crearUsuario) {
            document.getElementById('modalEditar').querySelector('form').reset();
        document.getElementById('modalEditar').querySelector('form').action = 'crear_usuario.php';
        document.getElementById('modalEditar').querySelector('h2').innerText = 'Crear Nuevo Usuario';
        document.getElementById('modalEditar').querySelector('input[type="submit"]').value = 'Crear Usuario';
        } else {
            document.getElementById('modalEditar').querySelector('h2').innerText = 'Editar Usuario';
            document.getElementById('modalEditar').querySelector('form').action = 'editar_usuario.php';
            document.getElementById('modalEditar').querySelector('input[type="submit"]').value = 'Guardar cambios';
        }
        document.getElementById('modalEditar').style.display = 'block';
    }
    var enlacesEditar = document.querySelectorAll('a.editar');
    enlacesEditar.forEach(function(enlace) {
        enlace.addEventListener('click', function(event) {
            event.preventDefault(); 
            var idUsuario = enlace.dataset.id;
            var nombre = enlace.dataset.nombre;
            var apellidoPaterno = enlace.dataset.apellidoPaterno;
            var apellidoMaterno = enlace.dataset.apellidoMaterno;
            var carnet = enlace.dataset.carnet;
            var celular = enlace.dataset.celular;
            var departamento = enlace.dataset.departamento;
            var tipoCuenta= enlace.dataset.tipoCuenta;
            var saldo= enlace.dataset.saldo;
            abrirModalUsuario(idUsuario, nombre, apellidoPaterno, apellidoMaterno, carnet, celular, departamento, tipoCuenta, saldo); 
        });
    });
    var botonCrearUsuario = document.getElementById('botonCrearUsuario');
    botonCrearUsuario.addEventListener('click', function(event) {
        event.preventDefault(); 
        abrirModalUsuario('', '', '', '', '', '','','','',true); 
    });
</script>
</body>
</html>
