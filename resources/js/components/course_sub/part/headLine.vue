<template>
	<div class="head_line_line text-xs-right" >
		<v-card class="blue lighten-4">
			<v-container grid-list-md>
				<v-layout row wrap>
					<v-flex md4>
						<v-img
						:src="course.image"
						height="200px"
						contain></v-img>
					</v-flex>
					<v-flex md8>
						<v-card-title>
							<div class="fsize-2 ff " style="width: 100%;">
							 <span class="font-weight-black">{{$vuetify.lang.current.course_g.name }} : </span>	{{course.title}}
							</div>
							<div class="title ff  pt-2" style="width: 100%;">
								<span class="font-weight-black">{{$vuetify.lang.current.course_g.little }} :</span>{{course.litleDes}}
							</div>
							<div class="title ff pt-5">
								<span class="font-weight-black">{{$vuetify.lang.current.course_g.trainer }}: </span>{{course.trainers.name}}
							</div>
						</v-card-title>
					</v-flex>
				</v-layout>
			</v-container>
		</v-card>
	</div>
</template>
<script>
	export default {
		props:['course']
	}
</script>