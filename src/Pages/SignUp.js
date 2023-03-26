import React from 'react';

function SignUp() {
	return (
		<>
			<h1 className='header'>Sing Up</h1>
			<center>
				<section>
					<form>
						<input type="text" required placeholder="Full name" size="100" /><br />
						<input type="email" required placeholder="Email" size="100" /><br />
						<input type="password" required placeholder="Password" size="100" /><br />
						<input type="password" required placeholder="Repeate password" size="100" /><br />

						<input className='button' type="submit" name="Submit" value="Зарегистрироваться" /><br />
					</form>
				</section>
			</center>
			
		</>
	);
}

export default SignUp;