<template>
	<div style="position: relative;" class="text-xs-right">
		<div class="headLine">
			<div class="title ff text-xs-right white--text pa-3 poss font-weight-black">
				{{catg_name}}
			</div>
		</div>
		<v-card>
			<v-container grid-list-md class="posss">
				<v-card>
					<v-layout row wrap>
						<v-flex md4>
							<v-img
							:src="first_course.image"
							contain
							height="200px"></v-img>
						</v-flex>
						<v-flex md8>
							<v-card-title>
								<div class="title ff font-weight-black" style="width: 100%;">
									{{$vuetify.lang.current.catgs.course.best }}
								</div>
								<div class="fsize-2 font-weight-black" style="width: 100%;">
									{{$vuetify.lang.current.course_g.name }} {{first_course.title}}
								</div>
								<div class="title pt-3 ff red--text" style="width: 100%;">
									{{$vuetify.lang.current.course_g.price }} {{first_course.price}}
								</div>
								<v-btn class="primary ff mt-3" @click="$router.push({name:'course',params:{id:first_course.id}})">
								{{$vuetify.lang.current.course_g.sub }}
								</v-btn>
							</v-card-title>
						</v-flex>
					</v-layout>		
				</v-card>
				
			</v-container>
		</v-card>

	</div>
</template>
<script>
	export default {
		props:['first_course','catg_name']
	}
</script>
<style>
	.headLine{min-height: 200px; width: 100%;

			/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#3b679e+13,2b88d9+33,207cca+56,7db9e8+96 */
		background: #3b679e; /* Old browsers */
		background: -moz-linear-gradient(-45deg, #3b679e 13%, #2b88d9 33%, #207cca 56%, #7db9e8 96%); /* FF3.6-15 */
		background: -webkit-linear-gradient(-45deg, #3b679e 13%,#2b88d9 33%,#207cca 56%,#7db9e8 96%); /* Chrome10-25,Safari5.1-6 */
		background: linear-gradient(135deg, #3b679e 13%,#2b88d9 33%,#207cca 56%,#7db9e8 96%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3b679e', endColorstr='#7db9e8',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */}

		.posss{position: absolute; bottom:-100px; left: 0px; width: 100%;}
		.poss{position: absolute; right: 70px; top: 10px;}
		.posssss{position: absolute; left: 20px; bottom: 20px;}
</style>
