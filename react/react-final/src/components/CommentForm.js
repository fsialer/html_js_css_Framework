import React from 'react';
export default class CommentForm extends React.Component{
	constructor(){
		super();
	}

	render(){
		return(
			<form  onSubmit={this.props.onSubmit} class='commentForm'>
			
				<input type='text' class='form-control' name="author" placeholder="Su Nombre"/>
				<input type='text' class='form-control' name="text" placeholder="firma :D"/>
				<input type='hidden'  name="id" value={Date.now()}/>
				<input class='form-control btn btn-success' type='submit' value="Enviar" />
			</form>
			);
	}
}