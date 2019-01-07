<template>
	<div class="top_lession mt-5">
		<div class="fsize-3 text-xs-center font-weight-black ll">
			{{$vuetify.lang.current.main.top_lession.head_line }}
		</div>

		<div class="bodysTopLession">
			<v-container grid-list-sm class="pa-0 ma-0">
				<v-layout row wrap>
					<v-flex md3 class="grey lighten-4 pa-4 pt-5">
						<div class="fsize-2 font-weight-black text-xs-center blue--text">
							{{$vuetify.lang.current.main.top_lession.sub_head }}
						</div>
						<div class="title text-xs-right ff pt-1 text-xs-center">
							{{$vuetify.lang.current.main.top_lession.content }}
						</div>
					</v-flex>
					<v-flex md9>
						<v-tabs v-model="active"  >
							<v-tab
							v-for="(n,index) in tabss"
							:key="index"
							class="font-weight-black title ff"
							>
								{{n.name}}
							</v-tab>
							<v-tab-item v-for="(n,index) in tabss" :key="index">
								<lession :catg_id="n.id"></lession>
							</v-tab-item>
						</v-tabs>
					</v-flex>
				</v-layout>
			</v-container>
		</div>
	</div>
</template>
<script>
	import lession from './top_lession/lession.vue'
	export default {
		components:{lession},
		data() {
			return {
				tabss:[],
				active:'طب اسنان'
			}
		},
		methods:{
			install() {
				const vm = this;
				axios.get('catg/index').then(response => {
					vm.tabss = response.data;
				}).catch(err => {
					console.log(err)
				});
			}
		},
		created() {
			const vm = this;
			vm.install();
		}
	}
</script>
<style>
	.circled{border-radius: 10px;}
	.bluergba{}
</style>