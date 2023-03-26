import React,{useState} from 'react';
import Main from './Pages/Main';
import SignUp from './Pages/SignUp';
import SignIn from './Pages/SignIn';
import ToDo from './Pages/ToDo';
import Error from './Pages/Error';
import './App.css';

import { BrowserRouter as Router, Switch, Route, NavLink} from 'react-router-dom';

function App() {
	const [loading,setloading] = useState(true);
	const spinner = document.getElementById('spinner');
	if(spinner) {
		setTimeout(() => {
			spinner.style.display="none";
			setloading(false);
		},1000)
	}
  return (
		!loading && (
			<Router>
				<nav>
					<li><NavLink to="/" exact activeClassName='activeNav'>Main</NavLink></li>
					<li><NavLink to="/signup" activeClassName='activeNav'>SignUp</NavLink></li>
					<li><NavLink to="/signin" activeClassName='activeNav'>SignIn</NavLink></li>
					<li><NavLink to="/todo" activeClassName='activeNav'>ToDo</NavLink></li>
				</nav>
				<Switch>
					<Route exact path="/" component={Main} />
					<Route path="/signup" component={SignUp} />
					<Route path="/signin" component={SignIn} />
					<Route path="/todo" component={ToDo} />
					<Route component={Error} />
				</Switch>
			</Router>
		)
	);
}

export default App;
