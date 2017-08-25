<template>
<div class="col-md-9 nopadding">
	<div class="col-md-12">
		<input class="top-input" type="" name="" :value="note.title" v-model="note.title">
	</div>
	<textarea class="main-text" v-model="note.content">
	</textarea>

</div>
</template>
<script>
import axios from 'axios';

export default{
	props:['note'],
	data:() => ({

	}),

	created(){

	},
	methods :{
		Updated: function(event){
			
		}
	}
}
</script>