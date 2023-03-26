import React from 'react';

function ToDo() {
	return (
		<>
			<h1 className='header'>To Do List</h1>
			<center>
				<section>
					<form className='' action='send.php' method='post'>
						<input type="password" required placeholder="Сделать ..." size="100" /><br />

						<input className='button' type="submit" name="Submit" value="Добавить" /><br />
					</form>
				</section>
			</center>
		</>
	);
}

export default ToDo;