<template>
	<div class="details">
		<v-container grid-list-md>
			<v-layout row wrap>
				<v-flex md4>
					<v-card>
						<v-card-title class="pa-1">
							<div class="red--text ff text-xs-center font-weight-black pb-2 pt-2 fsize-3" style="width: 100%;" >
								{{course.price}}
							</div>
							<div style="width: 100%;">
								<v-btn class="success ff" @click="$router.push({name:'course_sub',params:{id:course.id}})" block>
								{{$vuetify.lang.current.course_g.sub }}
								</v-btn>
							</div>
						</v-card-title>
					</v-card>
				</v-flex>
				<v-flex md8>
					<v-card>
						<v-card-title>
							<div class="font-weight-black ff title">
							{{$vuetify.lang.current.course_g.full_det }}
							</div>
						</v-card-title>
						<hr>
						<v-card-title >
							<div class="font-weight-black ff text-xs-right">
								{{course.fullDes}}
							</div>
						
						</v-card-title>
					</v-card>
				</v-flex>
			</v-layout>
			
		</v-container>
	</div>
</template>
<script>
	export default {
		props:['course']
	}
</script>