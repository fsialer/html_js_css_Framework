import React from "react";
import ReactDOM from "react-dom";
class Layout extends React.Component{
	constructor(){
		super();
		this.nombre="Fernando Sialer";
	}
	obtenerNombre(){
		return "FConsulting";
	}
	render() {
		return(
			<h1>Hola {this.obtenerNombre()}</h1>
			);
	}
}
const app=document.getElementById('app');
ReactDOM.render(<Layout/>,app);

