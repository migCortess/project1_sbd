<section class="seccion contenedor">
    <h2>Informacion Registrada:</h2>

        <?php
            try {

                require_once('includes/funciones/bd_conexion.php');
                $sql = " SELECT * FROM registro ";
                $resultado = $conn->query($sql);
            } catch(\Exception $e) {
                echo $e->getMessage();
            }
        ?>

        <div class='registro'>
            <?php
                $usuarios = array();
                $id = $registrados['register_id'];
                while($registrados = $resultado->fetch_assoc()){ 
                    $registro = array(
                        'nombre'=> $registrados['full_name'],
                        'correo'=> $registrados['email'],
                        'password'=> $registrados['pass']
                        

                    );
                    $usuarios[$id][] = $registro;

                    ?>

                      
            <?php } //informacion de la tabla ?>
            <?php
                //imprimir los registros recuperados
                foreach($usuarios as $reg => $usuario_registrado){ ?>
                    <?php foreach($usuario_registrado as $registro){ ?>
                        
                        <h3>NOMBRE: </h3>
                        <p><?php echo $registro['nombre']; ?></p>
                        <h3>CORREO: </h3>    
                        <p><?php echo $registro['correo']; ?></p>
                        <h3>PASSWORD: </h3>    
                        <p><?php echo $registro['password']; ?></p>
                        

                    <?php } ?>
                <?php } ?>
        </div>
        <?php
            $conn->close();
        ?>
</section>
