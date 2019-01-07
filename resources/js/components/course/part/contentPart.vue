<template>
	<div class="content ">
		<v-container grid-list-md text-xs-right>
			<v-card>
				<v-card-title class="grey">
					<div style="width: 100%;" class="white--text font-weight-black ff title">
						{{$vuetify.lang.current.course_g.has }}
					</div>
				</v-card-title>
				<v-card-title class="font-weight-black ff" v-for="(c,index) in course.course_sections" :key="index">
						{{c.title}}
					<hr>
					<v-spacer></v-spacer>
				</v-card-title>
			</v-card>	
		</v-container>
		
	</div>
</template>
<script>
	export default {
		props:['course']
	}
</script>