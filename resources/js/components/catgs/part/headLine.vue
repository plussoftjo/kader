<template>
	<div style="position: relative;" class="text-xs-right">
		<div class="headLine">
			<div class="title ff text-xs-right white--text pa-3 poss font-weight-black">
				طب اسنان
			</div>
		</div>
		<v-card>
			<v-container grid-list-md class="posss">
				<v-card>
					<v-layout row wrap>
						<v-flex md4>
							<v-img
							src="/images/index/lession.jpg"
							height="200px"></v-img>
						</v-flex>
						<v-flex md8>
							<v-card-title>
								<div class="title ff font-weight-black" style="width: 100%;">
									الكورس المميز
								</div>
								<div class="fsize-4 font-weight-black" style="width: 100%;">
									اسم الكورس
								</div>
								<div class="title ff" style="width: 100%;">
									تاريخ الكورس : <span class="font-weight-black">2018</span>
								</div>
								<div class="title pt-3 ff" style="width: 100%;">
									23 درس
								</div>
								<v-btn class="primary ff" @click="$router.push({name:'course'})">
									اكتشف الكورس
								</v-btn>
								<div class="posssss">
									<div class="title ff red--text font-weight-black">
										10JD
									</div>
								</div>
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
