<template>
	<div class="col-md-3 nopadding">
		<div class="note-container">
			<div class="note-title">
				<div class="col-md-12">
					<h3>Real Notes</h3>
					<span class="user-logged">user :{{user.name}}</span>
				</div>
				<div class="col-md-12"><span class="user-logged" style="cursor:pointer" @click="Logout">Logout</span></div>
			</div>
			<div class="notes-items" v-for="(note,index) in notes" @click="selectNotes(note)">
				<h5 class="font-fa">{{note.title}}</h5>
				<span @click="remove(note,index)">click to remove</span>
			</div>
			<div class="add-note" @click="createNote">New Note?</div>
		</div>
	</div>
</template>
<script>
import axios from 'axios';

export default{
	props:['initialnotes','user'],
	data: function(){
		return {
			notes:this.initialnotes
		}
	},
	methods:{
		selectNotes:function(note){
			this.$emit('noteChosen',note);
		},
		Logout:function(){
			axios.post('/logout').then(response => {
                location.reload();
            }).catch(error => {
                location.reload();
            });
		},
		remove: function(note,index){
			axios.delete('/api/notes/delete/'+note.id).then((res)=>{
				console.log(res.data);
				this.notes.splice(index,1);
			})
		},
		createNote:function(){
			axios.post('/api/notes/create',{
				title:'What\' on your mind',
				content:'Say something Nice'
			}).then((res)=>{
				this.notes.push({
					title:'What\' on your mind',
					content:'Say something Nice'
				});
			})
		}
	}
}
</script>