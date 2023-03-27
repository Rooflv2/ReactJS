<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<title>Вход</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-12 mt-4">
					<form action="log.php" method="POST">
						<div class="form-floating mb-3">
							<input type="login" name="login" class="form-control form-control-lg" id="floatingInput" placeholder="Login" maxlength="36">
							<label for="floatingInput">Login</label>
						</div>
						<div class="form-floating mb-3">
							<input type="password" name="password" class="form-control form-control-lg" id="floatingPassword" placeholder="Password" maxlength="36">
							<label for="floatingPassword">Password</label>
						</div>
						<button type="submit" name="submit" class="btn btn-default btn-md btn-secondary">Enter</button>
						<div>
							<label>Если у вас еще нет аккаунта, то перейдите по </label>
							<a href="reg.php">ссылке на страничкку для регистрации</a>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<?php session_start();
			if (isset($_POST["login"]) && isset($_POST["password"]) ) {	//Проверка на существование вводов (инпутов)
				if (isset($_POST["submit"])) {	//Проверка нажалась ли кнопка
					if (!empty($_POST["login"]) && !empty($_POST["password"]) ) { //Проверка не пустые ли ячейка (инпуты)
						$login = $_POST["login"];
						$password = $_POST["password"];
						$dsh = new PDO('mysql:host=localhost;dbname=rvpdubna', "root", ""); //Путь подключения к БД
						$query = 'SELECT * FROM usersreg WHERE login = ? AND password = ?'; //БД запрос
						$result = $dsh->prepare($query); //Подключение к БД и отправка запроса
						$result->execute([$login, $password]); // сохранение данных в переменной
						$user = $result->fetch(PDO::FETCH_ASSOC); //Поиск совпадений ???
						if($user && password_verify($password, $user['password'])) { //Проверка на правильный пароль
							echo '<script> alert ("Авторизация прошла успешно") </script>'; //Вывод уведомления
							$_SESSION['login'] = $login; //глобальная переменная
							$_SESSION['password'] = $password;
							header('Location: http://localhost/RVP/todo.php'); //Куда переходить
						} else {
							echo '<script> alert ("Такой пользователь не найден") </script>';
						}
					}
					else{
						echo '<script> alert("Заполните все поля!") </script>';
					}
				}
			}
		?>
	</body>
</html>
