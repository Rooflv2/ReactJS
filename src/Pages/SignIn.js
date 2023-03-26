import React from 'react';

function SignIn() {
	return (
		<>
			<h1 className='header'>Sign In</h1>
			<center>
				<section>
					<form>
						<input type="email" required placeholder="Email" size="100" /><br />
						<input type="password" required placeholder="Password" size="100" /><br />

						<input className='button' type="submit" name="Submit" value="Войти" /><br />
					</form>
				</section>
			</center>
		</>
	);
}

export default SignIn;