<template>
	<div class="mt-5">
		<v-container grid-list-lg >
			<v-layout row wrap>
				<v-flex md4>
					<div class="font-weight-black blue--text fsize-1 text-xs-left">
						من نحن 
					</div>
					<div class="title font-weight-black ff text-xs-left pt-1">
						اكاديمية كادر للتعلم عن بعد
					</div>
				</v-flex>
				<v-flex md8	>
					<div class="title pt-2 ll text-xs-right">
						يمكنك من خلال كادر التعلم عن بعد في اي وقت واي زمان من خلال اساليب حديثة ودروس مفصلة وتفاصيل اكثر من خبارء في التعليم عن بعد
					</div>
				</v-flex>
			</v-layout>

			<div class="mt-3 pt-2">
				<v-layout row wrap>
					<v-flex md3 v-for="(i,index) in items" :key="index">
						<v-card class="bottomBorder cirled text-xs-right">
							<v-container>
								<v-card-title class="mt-0 pt-0">
									
								<div style="width: 100%;">
									<v-icon class="fsize-4 blue--text">{{i.icon}}</v-icon>
								</div>
								<div class="fsize-1 font-weight-black mt-2 text-xs-right" style="width: 100%;">
									{{i.name}}
								</div>
								<div class="fsize-1 mt-2 lineH">
									{{i.title}}
								</div>
								</v-card-title>

							</v-container>

						</v-card>
					</v-flex>
				</v-layout>
			</div>
		</v-container>
	</div>
</template>
<script>
	export default {
		data() {
			return {
				items:[
					{icon:'home',name:'من المنزل',title:'ادرس من البيت في اي وقت وفي اي مكان مع كادر'},
					{icon:'search',name:'الكورس المناسب',title:'ابحث على الكورس المناسب لك من عدة كورسات متوفرة'},
					{icon:'credit_card',name:'طرق الدفع',title:'طريقة الدفع المناسبة لك من عدة طرق دفع أمنه ومناسبة للجميع'},
					{icon:'people_outline',name:'خبراء ',title:'في كادر انت بين اايدي امهر الاطباء للتعلم بكل سهولة ويسر'},
					],
			}
		}
	}
</script>
<style>
	.lineH{line-height: 1.8;}
	.bottomBorder{border-bottom: 3px solid #0d47a1 !important; transition: all 0.3s;}
	.cirled{border-radius: 10px; cursor:pointer; }
	.cirled:hover {border-left:2px solid #0d47a1 !important; border-right: 2px solid #0d47a1 !important; border-bottom: 3px solid #0d47a1 !important; }
</style>