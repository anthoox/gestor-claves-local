<?php include_once 'C:\wamp64\www\gestor-claves-local\app\views\components\head.php'; ?>
<?php require_once 'C:\wamp64\www\gestor-claves-local\core\helpers\helpers.php'; ?>
<!-- Conexión a la base de datos -->
<?php require_once 'C:\wamp64\www\gestor-claves-local\core\Database.php'; ?>

<?php
if (isset($_POST) && !empty($_POST)) {
  var_dump($_POST);
  // die();

  $user = isset($_POST['username']) ? $_POST['username'] : false;
  $email = isset($_POST['email']) ? $_POST['email'] : false;
  $password = isset($_POST['password']) ? $_POST['password'] : false;

  // Array de errores
  $errors = array();

  // Validar los datos
  if (!empty($user) && !is_numeric($user) && preg_match("/[a-zA-Z0-9]+/", $user)) {
    echo 'Usuario válido: ';
    $user_validated = true;
  } else {
    $user_validated = false;
    $errors['username'] = 'El usuario no válido';
  }

  if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'email válido: ';
    $email_validated = true;
  } else {
    $email_validated = false;
    $errors['email'] = 'El email no válido';
  }


  if (!empty($password)) {
    echo 'contraseña válida: ';
    $password_validated = true;
    // Cifrado de la contraseña
    $password_secure = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);


    // Insetar datos por ahora
    $pdo = Database::getInstance()->getConnection();
    $sql = "INSERT INTO users (email, username, password_hash) VALUES (:username, :email, :password)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $user); // ojo, aquí usabas $username que no está definido
    $stmt->bindParam(':password', $password_secure);
    
    if ($stmt->execute()) {
      echo "Usuario guardado correctamente.";
    } else {
      echo "Error al guardar el usuario.";
    }
    
  } else {
    $password_validated = false;
    $errors['password'] = 'Contraseña no válida';
  }

  $save_user = false;
  if (count($errors) == 0) {
    $save_user = true;
  } else {
    $_SESSION['errors'] = $errors;
    header('Location: index.php');
  }
}


?>
<div class="container-fluid  d-flex align-items-center flex-column mt-5 p-3">
  <div class="text-center mb-4">
    <h1>Registro</h1>
  </div>
  <form id="register" method="post" action="register.php" class="col-10">
    <div class="mb-3">
      <label for="username" class="form-label">Usuario</label>
      <input type="text" class="form-control" id="username" name="username" required>
      <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'username') : ''; ?>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Correo</label>
      <input type="email" class="form-control" id="email" name="email" required>
      <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : ''; ?>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Contraseña</label>
      <input type="password" class="form-control" id="password" name="password" required>
      <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'password') : ''; ?>
    </div>
    <button type="submit" class="btn btn-primary w-100" name="submit">Guardar</button>
  </form>
</div>