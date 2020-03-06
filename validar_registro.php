<?php if(isset($_POST['submit'])): 
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nombre = $_POST['displayname'];
    $dia = $_POST['dob_day'];
    $mes = $_POST['dob_month'];
    $anio = $_POST['dob_year'];
    $gender = $_POST['gender'];
    if(isset($_POST['thirdpartyemail'])){
        $share_data = "Y";
    }else {
        $share_data = "N";
    }
    $gion = '-';
    $fecha_nacimiento = $anio.$gion.$mes.$gion.$dia;
    try {
        require_once('includes/funciones/bd_conexion.php');
        $stmt = $conn->prepare("INSERT INTO registro (full_name, birth_date, gender, share_data, email, pass) VALUES (?,?,?,?,?,?) ");
        $stmt->bind_param("ssssss", $nombre, $fecha_nacimiento, $gender, $share_data, $email, $password);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header('Location: https://www.spotify.com/mx/signup/?exitoso=1');
    } catch(\Exception $e) {
        echo $e->getMessage();
    }
    ?>
<?php endif; ?>