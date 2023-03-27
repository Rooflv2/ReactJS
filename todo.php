<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>To Do List</title>
  </head>
  <body>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<table>
			<tr>
				<th>№</th>
				<th href="?text">Задание</th>
				<th href="?data">Дата</th>
			</tr>
			<?php
				$mysql = new mysqli('localhost', 'root', '', 'rvpdubna');
				// Сохранение нового (до получения!):
				if (!empty($_POST)) {
					$text = $_POST['text'];
					$data = $_POST['data'];
					
					$query = "INSERT INTO todo (text, data) VALUES ($text, $data);";
					mysqli_query($mysql, $query) or die(mysqli_error($mysql));
				}
				
				// Удаление по id (до получения!):
				if (isset($_GET['del'])) {
					$del = $_GET['del'];
					$query = "DELETE FROM todo WHERE id=$del";
					mysqli_query($mysql, $query) or die(mysqli_error($mysql));
				}

				// Получение всех заданий:
				$query = "SELECT * FROM todo";
				$result = mysqli_query($mysql, $query) or die(mysqli_error($mysql));
				for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

				// Вывод на экран:
				$result = '';
				foreach ($data as $elem) {
					$result .= '<tr>';
					
					$result .= '<td>' . $elem['id'] . '</td>';
					$result .= '<td>' . $elem['text'] . '</td>';
					$result .= '<td>' . $elem['data'] . '</td>';
					$result .= '<td><a href="?del='.$elem['id'].'">удалить</a></td>';

					$result .= '</tr>';
				}
				echo $result;
			?>
		</table>
		<form action="" method="POST">
			<input name="text" placeholder="Задание">
			<input name="data" placeholder="Дата">
			<input type="submit" value="Добавить задание">
		</form>
		<a href="log.php">Сменить пользователя или выйти</a>
  </body>
</html>
