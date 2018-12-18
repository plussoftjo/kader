<template>
	<div class="index">
		<tools></tools>

		<headBox></headBox>
		<howWeAre></howWeAre>
		<topLession></topLession>
		<timeline></timeline>
		<contactus></contactus>

		 <v-footer class="pa-3 blue lighten-2">
		    <v-spacer></v-spacer>
		    <div class="white--text font-weight-black">&copy; {{ new Date().getFullYear() }}</div>
		  </v-footer>		
	</div>
</template>
<script>
	import tools from '../Global/tools'
	import headBox from './part/head_box'
	import howWeAre from './part/how_are_we'
	import topLession from './part/top_lession'
	import timeline from './part/timeline'
	import contactus from './part/contactus'
	export default {
		components:{tools,headBox,howWeAre,topLession,timeline,contactus}
	}
</script>