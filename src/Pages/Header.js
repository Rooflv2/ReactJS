import React from 'react';

function Header(props) {
	return (
		<nav>
			<li><a href="/SignIn">Sign In</a></li>
			<li><a href="/SignUp">Sign Up</a></li>
			<li><a href="/ToDo">To Do List</a></li>
		</nav>
	);
}

export default Header;