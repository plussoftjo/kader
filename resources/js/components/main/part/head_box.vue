<template>
	<div class="head_box">
		<v-card>
			<v-img
			heigth="500px"
			contain
			src="./images/index/navHeader.jpg">
				<div class="headBox_line">
					<div class="font-weight-black fsize-4">
						{{$vuetify.lang.current.main.head.title }}
					</div>
					<div class="fsize-1 subTitle_headBox mt-3 hidden-sm-and-down" >
						{{$vuetify.lang.current.main.head.sub }}
					</div>
					<div class="headSearch mt-4">
						<v-btn class="blue lighten-1 font-weight-black borderBtn" block dark @click="$router.push({name:'order_course'})"><v-icon class="white--text">create</v-icon>
						{{$vuetify.lang.current.main.head.btn }}
					</v-btn>
					</div>
				</div>
			</v-img>
		</v-card>
		<v-card class="numberHeadLine white--text">
				<v-container grid-list-md text-xs-center>
					<v-layout row wrap>
						<v-flex md4 v-for="(i,index) in items" :key="index">
							<div class="numberHead">
								{{i.text}}
							</div>
							<div class="numberNum">
								{{i.sub}}
							</div>
						</v-flex>
					</v-layout>
				</v-container>
		</v-card>
	</div>
</template>
<script>
	export default {
		data() {
			return {
				search:'',
				items:[{text:'نبحث لك', sub:'عن الكورس المناسب لك '},{text:'مجموعة من الخبراء',sub:'كفائة في مجال التدريب'},{text:'اسعار منافسة',sub:'وفر على نفسك الكثير'}]
			}
		},
		methods:{
			installLang() {
				const vm = this;
				vm.items = vm.$vuetify.lang.current.main.secound_line;
			}
		},
		created() {
			const vm = this;
			vm.installLang();
		}
	}
</script>
<style>
	.headBox_line{position: absolute; top:30%; left: 2%; color: white;}
	.subTitle_headBox{max-width: 350px;}

	.numberHeadLine
	{
		/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#3b679e+13,2b88d9+33,207cca+56,7db9e8+96 */
		background: #3b679e; /* Old browsers */
		background: -moz-linear-gradient(-45deg, #3b679e 13%, #2b88d9 33%, #207cca 56%, #7db9e8 96%); /* FF3.6-15 */
		background: -webkit-linear-gradient(-45deg, #3b679e 13%,#2b88d9 33%,#207cca 56%,#7db9e8 96%); /* Chrome10-25,Safari5.1-6 */
		background: linear-gradient(135deg, #3b679e 13%,#2b88d9 33%,#207cca 56%,#7db9e8 96%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3b679e', endColorstr='#7db9e8',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
	}


			.numberHead{font-size: 24px; font-weight: 700; font-family: 'Cairo', sans-serif !important;}
			.numberNum{font-size:18px; font-weight: 400; font-family: 'Cairo', sans-serif !important;}
	.borderBtn{border-radius: 10px;}
</style>