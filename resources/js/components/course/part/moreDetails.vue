<template>
	<div class="moreDetails text-xs-right">
		<v-container grid-list-md>
			<div class="title font-weight-black ff ">
				{{$vuetify.lang.current.course_g.req }}
			</div>	
			<ul class="listStyle ff">
				<li v-for="(c,index) in course.course_reqs" :key="index">
					{{c.title}}
				</li>
			</ul>

		</v-container>
		
	</div>
</template>
<script>
	export default {
		props:['course']
	}
</script>
<style>
	.listStyle{list-style-type: none; padding: 0px; margin:0px; padding-top:4px; font-size: 700; font-size: 18px;}
</style>