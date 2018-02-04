import React from 'react';
import {Link} from 'react-router';
const logo_fc=require('../images/avatar.png');
export default class Home extends React.Component{
	constructor(){
		super();
	}

	render(){
		return(
			<div class='home'>
				<img class='center-block' src={logo_fc} alt='avatar'/>
				<h1 class='text-center'>React FConsulting, Pasa y firma :D</h1>
				<button class='btn btn-default btn-lg center-block'><Link to='sign'>Forma ahora</Link></button>
			</div>
			);
	}
}