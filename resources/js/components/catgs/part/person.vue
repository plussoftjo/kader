<template>
	<div class="course ff text-xs-right">
		<div class="title ff font-weight-black  pt-2 pb-2">
		{{$vuetify.lang.current.catgs.person }}
		</div>
		<div class="pt-2">
			<v-container grid-list-md>
				<v-layout row wrap>
					<v-flex md3 v-for="(i,index) in trainers" :key="index">
						<v-card class="elevation-7">
							<v-container grid-list-md text-xs-center>
								<v-layout align-center justify-center>
									<v-flex  xs12 sm12 md12> 
									<div class="align-center align-content-center pt-2" style="width: 100%;">
										<v-img
										:src="i.image"
										height="150px"
										width="100%"
										></v-img>
									</div>	
									</v-flex>
								</v-layout>
								<div class="title ff font-weight-black pt-3">
									{{i.name}}
								</div>
								<div class="ff pt-2">
									{{i.des}}
								</div>
							</v-container>
						</v-card>				
					</v-flex>
				</v-layout>
			</v-container>
		</div>
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