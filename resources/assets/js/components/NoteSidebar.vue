<template>
	<div class="col-md-3 nopadding">
		<div class="note-container">
			<div class="note-title">Real Notes</div>
			<div class="notes-items" v-for="(note,index) in notes" @click="selectNotes(note)">
				{{note.title}} 
				<span @click="remove(note,index)">remove</span>
			</div>
			<div class="add-note" @click="createNote">New Note?</div>
		</div>
	</div>
</template>
<script>
export default{
	props:['initialnotes'],
	data: function(){
		return {
			notes:this.initialnotes
		}
	},
	methods:{
		selectNotes:function(note){
			this.$emit('noteChosen',note);
		},
		remove: function(note,index){
			this.notes.splice(index,1);
		},
		createNote:function(){
			this.notes.push({
				title:'What\' on your mind',
				content:'Say something Nice'
			});
		}
	}
}
</script>