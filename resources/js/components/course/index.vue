<template>
	<div class="course">
		<tools></tools>

		<headLine></headLine>
		<detailsPart></detailsPart>
		<contentPart></contentPart>
		<moreDetails></moreDetails>
		<personDetails></personDetails>
		 <v-footer class="pa-3 blue lighten-2">
		    <v-spacer></v-spacer>
		    <div class="white--text font-weight-black">&copy; {{ new Date().getFullYear() }}</div>
		  </v-footer>
	</div>
</template>
<script>
	import tools from '../Global/tools'
	import headLine from './part/headLine'
	import detailsPart from './part/detailsPart'
	import contentPart from './part/contentPart'
	import moreDetails from './part/moreDetails'
	import personDetails from './part/personDetails'
	export default {
		components:{tools,headLine,detailsPart,contentPart,moreDetails,personDetails}
	}
</script>