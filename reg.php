<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<title>Регистрация</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-12 mt-4">
					<form action="reg.php" method="POST">
						<div class="form-floating mb-3">
							<input type="login" name="login" class="form-control" class="form-control form-control-lg" id="floatingInput" placeholder="Login" maxlength="36">
							<label for="floatingInput">Login</label>
						</div>
						<div class="form-floating mb-3">
							<input type="mail" name="mail" class="form-control form-control-lg" id="floatingInput" placeholder="Email" maxlength="36">
							<label for="floatingInput">name@example.com</label>
						</div>
						<div class="form-floating mb-3">
							<input type="password" name="password" class="form-control form-control-lg" id="floatingPassword" placeholder="Password" maxlength="36">
							<label for="floatingPassword">Password</label>
						</div>
						<div class="form-floating mb-3">
							<input type="password" name="password_check" class="form-control form-control-lg" id="floatingPassword" placeholder="Repeat password" maxlength="36">
							<label for="floatingPassword">Repeat password</label>
						</div>
						<button type="submit" name="submit" class="btn btn-default btn-md btn-secondary">Enter</button>
						<div>
							<label>Если у вас уже есть аккаунт, то перейдите по </label>
							<a href="log.php">ссылке на страничку для авторизации</a>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<?php session_start();
		if (isset($_POST["login"]) && isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["password_check"])) {
			if (isset($_POST["submit"])) {
				if (!empty($_POST["login"]) && !empty($_POST["mail"]) && !empty($_POST["password"]) && !empty($_POST["password_check"]) ) {
					$login = $_POST["login"];
					$usermail = $_POST["mail"];
					$password = $_POST["password"];

					$password_check = $_POST["password_check"];
					if ($password == $password_check) {
						$dsh = new PDO('mysql:host=localhost;dbname=rvpdubna', "root", "");
						$query = 'INSERT INTO usersreg (login, mail, password) VALUES (?, ?, ?);';
						$result = $dsh->prepare($query);
						$result->execute([$login, $usermail, $password]);
						print_r($result);
						if ($result != null){
							$_SESSION['login'] = $login;
							$_SESSION['password'] = $password;
							header('Location: http://localhost/RVP/todo.php');
						}
					} else {
					echo '<script> alert("Пароли не совпадают") </script>';
					}
					$dsh -> close();
				}
				else{
					echo '<script> alert("Заполните все поля!") </script>';
				}
			}
		}
	?>
	</body>
</html>
