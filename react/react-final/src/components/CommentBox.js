import React from 'react';
import CommentForm from './CommentForm.js';
import CommentList from './CommentList.js';
export default class CommentBox extends React.Component{
	constructor(){
		super();
	}

	render(){
		return(
			<div class='commentBox'>
				<CommentForm onSubmit={this.props.onSubmit}/>
				<CommentList data={this.props.data}/>
			</div>
			);
	}
}