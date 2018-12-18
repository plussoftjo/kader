<template>
	<div class="catgs">
		<tools></tools>

		<tap></tap>
		<headLine></headLine>
		<course></course>
		<person></person>

			 <v-footer class="pa-3 blue lighten-2">
		    <v-spacer></v-spacer>
		    <div class="white--text font-weight-black">&copy; {{ new Date().getFullYear() }}</div>
		  </v-footer>	
	</div>
</template>
<script>
	import tools from '../Global/tools'
	import tap from './part/tap'
	import headLine from './part/headLine'
	import course from './part/course'
	import person from './part/person'
	export default {
		components:{tools,tap,headLine,course,person},
		
	}
</script>