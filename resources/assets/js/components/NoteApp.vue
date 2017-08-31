<template>
  <div class="col-md-12 contain nopadding">
  	<note-sidebar v-if="notes" :initialnotes="notes" @noteChosen="noteSelected" :user="user"></note-sidebar>
  	<note-editor v-if="firstNote" :note="firstNote"/>
  </div>

</template>
<script>
import NoteEditor from './NoteEditor.vue';
import NoteSidebar from './NoteSidebar';
import axios from 'axios';

import _ from 'lodash';


export default {
  name: 'note-app',
  props:['user'],
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
      notes:null,
      currentNote:null
  }},

  methods:{
  	noteSelected: function(value){
  		this.firstNote = value;
  	}
  },
  created() {
    //do something after creating vue instance
    axios.get('/api/notes').then((res)=>{
      console.log(res.data.data)
      this.notes = res.data.data;
    })
  }
}
</script>
<style lang="scss" scoped>
</style>
