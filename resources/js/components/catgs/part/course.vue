<template>
	<div class="course ff text-xs-right" style="padding-top: 100px;">
		<div class="title ff font-weight-black  pt-2 pb-2">
			الكورسات
		</div>
		<v-tabs v-model="active"  >
							<v-tab
							v-for="n in tabss"
							:key="n"
							class="font-weight-black title ff"
							>
								{{n}}
							</v-tab>
							<v-tab-item v-for="n in tabss" :key="n">
								<v-container grid-list-md>
								<v-layout row wrap>
									<v-flex md4 v-for="(i,index) in 3" :key="index">
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
								</v-container>
									
							</v-tab-item>
						</v-tabs>
	</div>
</template>
<script>
	export default {
		data() {
			return {
				tabss:['افضل الكورسات','كورسات جديدة'],
				active:'طب اسنان'
			}
		}
	}
</script>