import Reflux from 'reflux';
//import $ from 'jquery';
import io from 'socket.io-client';
import PeopleActions from '../actions/PeopleActions.js';
let PeopleStore=Reflux.createStore({
	listenables:[PeopleActions],
	fetchPeople:function(){
		let self=this;
		this.socket=io('http://localhost:3000')
		this.socket.on('people',(people)=>{
			var people=JSON.parse(people)
			people=people.results[0]
			this.trigger(people)
		})
	},
	askForPeople:function(){
		
		this.socket.emit('ask');
	}
});
export default PeopleStore