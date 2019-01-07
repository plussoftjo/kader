<template>
	<div class="mt-5">
		<v-container grid-list-lg >
			<v-layout row wrap>
				<v-flex md4>
					<div class="font-weight-black blue--text fsize-1 text-xs-center">
						{{$vuetify.lang.current.main.how_are_we.how_are_we }}
					</div>
					<div class="title font-weight-black ff text-xs-center pt-1">
						{{$vuetify.lang.current.main.how_are_we.name }}
					</div>
				</v-flex>
				<v-flex md8	>
					<div class="pt-2 ll text-xs-right">
						{{$vuetify.lang.current.main.how_are_we.content.first }}<br> 
						{{$vuetify.lang.current.main.how_are_we.content.secound }}
					</div>
				</v-flex>
			</v-layout>

			<div class="mt-3 pt-2">
				<v-layout row wrap>
					<v-flex md3 v-for="(i,index) in items" :key="index">
						<v-card class="bottomBorder cirled text-xs-right">
							<v-container class="pa-2 ma-2">
								<v-card-title class="mt-0 pt-0">
									
								<div style="width: 100%;">
									<v-icon class="fsize-4 blue--text">{{i.icon}}</v-icon>
								</div>
								<div class="fsize-1 font-weight-black mt-2 text-xs-right" style="width: 100%;">
									{{i.name}}
								</div>
								<div class="font-weight-black mt-2 lineH">
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
					
					],
			}
		},
		methods:{
			installLang() {
				const vm = this;
				vm.items = vm.$vuetify.lang.current.main.how_are_we.items;
			}
		},
		created() {
			const vm = this;
			vm.installLang();
		}
	}
</script>
<style>
	.lineH{line-height: 1.8;}
	.bottomBorder{border-bottom: 3px solid #0d47a1 !important; transition: all 0.3s;}
	.cirled{border-radius: 10px; cursor:pointer; }
</style>