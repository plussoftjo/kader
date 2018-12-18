<template>
  <v-tabs
    dark
    color="blue lighten-2"
    show-arrows
  >
    <v-tabs-slider color="blue darken-4"></v-tabs-slider>

    <v-tab
      v-for="(i,index) in catgs"
      :key="index"
      class="font-weight-black ff title ff"
    >
        {{i.title}}
    </v-tab>
  </v-tabs>
</template>
<script>
  export default {
    data () {
        return {
          catgs:[
          {title:'طب اسنان'},
          {title:'طب اعام '},
          ]
        }      
    }
  }
</script>