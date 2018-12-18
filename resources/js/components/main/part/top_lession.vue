<template>
	<div class="top_lession mt-5">
		<div class="title text-xs-center font-weight-black ll">
			افضل الدروس
		</div>

		<div class="bodysTopLession">
			<v-container grid-list-md>
				<v-layout row wrap>
					<v-flex md3 class="grey lighten-4 pa-4 pt-5">
						<div class="fsize-3 font-weight-black text-xs-right ">
							اختار من بين افضل الكورسات
						</div>
						<div class="title text-xs-right ff pt-1">
							اختار الفئة المناسبة التي تريد التعلم منها وتعلم من افضل الكورسات المتوفررة في كادر
						</div>
					</v-flex>
					<v-flex md9>
						<v-tabs v-model="active"  >
							<v-tab
							v-for="n in tabss"
							:key="n"
							class="font-weight-black title ff"
							>
								{{n}}
							</v-tab>
							<v-tab-item v-for="n in tabss" :key="n">
								<v-layout row wrap>
									<v-flex md4 v-for="(i,index) in 3" :key="index" @click="$router.push({name:'course'})">
										<v-card class="circled elevation-8">
											<v-img
											height="200px"
											src="/images/index/lession.jpg">
											</v-img>
											<v-card-title class="bluergba text-xs-right ff">
												<div class="font-weight-black fsize-2" style="width: 100%;">
												اسم الكورس
												</div>
												<div class="fsize-1 pt- ff" style="width: 100%; ">
													اسم الدكتور
												</div>
												<div class="fsize-1 pt-2 " style="width: 100%;">
													23 درس
												</div>
												<div style="width: 100%; padding:5px;" >
													<div class="font-weight-black fsize-1 red--text" style="position: absolute; left: 10px; bottom:10px;">
														10JD
													</div>
												</div>
											</v-card-title>
										</v-card>
									</v-flex>
								</v-layout>			
							</v-tab-item>
						</v-tabs>
					</v-flex>
				</v-layout>

			</v-container>
		</div>
	</div>
</template>
<script>
	export default {
		data() {
			return {
				tabss:['طب اسنان','طب عام'],
				active:'طب اسنان'
			}
		}
	}
</script>
<style>
	.circled{border-radius: 10px;}
	.bluergba{}
</style>