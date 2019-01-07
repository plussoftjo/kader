<template>
	<div class="personDetails">
		<v-container grid-list-md>
			<v-layout row wrap>
				<v-flex md8>
					<v-card>
						<v-card-title class="blue darken-4">
							<div class="title font-weight-black white--text ff">
									{{$vuetify.lang.current.course_g.about_trainer }}
							</div>
						</v-card-title>
						<v-container grid-list-md text-xs-right>
							<v-layout row wrap>
								<v-flex md4>
									<v-img
									:src="trainers.image"
									height="150px"
									class="circleImage"
									width="150px"></v-img>
								</v-flex>
								<v-flex md8>
									<v-card-title>
										<div class="title ff font-weight-black" style="width: 100%;">
											{{trainers.name}}
										</div>
										<div class="font-weight-black title ff pt-3" style="width: 100%;">
											وصف قصير للمدرب
										</div>
										<div class="title ff pt-3" style="width: 100%;">
											<span v-for="(d,index) in trainers.trainers_degrees">
												{{d.title}}
											</span>
										</div>
									</v-card-title>
								</v-flex>
							</v-layout>	
						</v-container>
						
					</v-card>
				</v-flex>
			</v-layout>
		</v-container>
	</div>
</template>
<script>
	export default {
		props:['trainers']
	}
</script>
<style>
	.circleImage{border-radius: 50%;}
</style>