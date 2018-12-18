<template>
	<div class="course ff text-xs-right">
		<div class="title ff font-weight-black  pt-2 pb-2">
			المدربين
		</div>
		<div class="pt-2">
			<v-container grid-list-md>
				<v-layout row wrap>
					<v-flex md3 v-for="i in 4" :key="i">
						<v-card class="elevation-7">
							<v-container grid-list-md text-xs-center>
								<v-layout align-center justify-center>
									<v-flex  xs12 sm8 md4> 
									<div class="align-center align-content-center pt-2" style="width: 100%;">
										<v-img
										src="/images/person.jpg"
										width="100px"
										height="100px" class="circleImage"></v-img>
									</div>	
									</v-flex>
								</v-layout>
								<div class="title ff font-weight-black pt-3">
									اسم المدرب
								</div>
								<div class="title ff pt-2">
									الوظيفة
								</div>
								<div class="pt-5"></div>
								<div class="title pt-2 ff">
									23 درس
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

	}
</script>
<style>
	.circleImage{border-radius: 50%;}
</style>