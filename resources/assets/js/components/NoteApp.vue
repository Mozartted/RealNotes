<template>
  <div class="col-md-12 contain nopadding">
  	<note-sidebar :initialnotes="notes" @noteChosen="noteSelected"></note-sidebar>
  	<note-editor :note="firstNote"/>
  </div>

</template>
<script>
import NoteEditor from './NoteEditor.vue';
import NoteSidebar from './NoteSidebar';

import _ from 'lodash';


export default {
  name: 'note-app',
  components:{
  	NoteEditor,
  	NoteSidebar
  },
  computed: {
      firstNote:{
        get:function(){
          if(this.currentNote == null){
            return _.first(this.notes);
          }
          return this.currentNote;
        },
        set: function(value) {
          this.currentNote = value;
        }
      }
  },
  data: function(){
    return{
  	notes:[
  	{
  		'title':'The base',
  		'content':'base Stuffs'
  	},
  	{
  		'title':'The House',
  		'content':'base Stuffs'
  	},
  	{
  		'title':'The Action',
  		'content':'base Stuffs'
  	}
  	],
    currentNote:null
  }},

  methods:{
  	noteSelected: function(value){
  		this.firstNote = value;
  	}
  },

  created() {
    //do something after creating vue instance
    // this.notes =

  }
}
</script>
<style lang="scss" scoped>
</style>
