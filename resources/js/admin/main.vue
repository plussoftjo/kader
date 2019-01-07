<template>
	<v-app id="main">
		<v-content>
				<v-layout row wrap>
					<v-flex xs3>
						<div style="width: 100%;">
							<leftSection style="width: 100%;"></leftSection>
						</div>
					</v-flex>
					<v-flex xs9>
						<v-card class="grey lighten-3">
							<v-card-title>
								<div class="title font-weight-black">{{$route.name}}</div>
							</v-card-title>
							
						</v-card>
						<v-card>
							<router-view></router-view>
						</v-card>
					</v-flex>
				</v-layout>
		</v-content>
	</v-app>
</template>
<script>
	import leftSection from './main/leftSection'
	export default {
		components:{leftSection}
	}
</script>
<style>
	.fsize-4{font-size: 36px;}
	.fsize-3{font-size: 30px;  font-family: 'Cairo', sans-serif !important;}
	.fsize-2{font-size: 26px;  font-family: 'Cairo', sans-serif !important;}
	.fsize-1{font-size: 20px;  font-family: 'Cairo', sans-serif !important;}
	.ff{ font-family: 'Cairo', sans-serif !important;}
	.ll{ font-family: 'Cairo', sans-serif !important; line-height: 1.6!important;}
</style>