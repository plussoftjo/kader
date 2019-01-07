<template>
	<div class="lession">
		<v-layout row wrap>
			<v-flex md4 v-for="(c,index) in courses" :key="index" @click="$router.push({name:'course',params:{id:c.id}})">
				<v-card class="circled elevation-8">
					<v-img
					height="200px"
					contain
					:src="c.image">
					</v-img>
					<v-card-title class="bluergba text-xs-right ff">
						<div class="font-weight-black title" style="width: 100%;">
						{{c.title}}
						</div>
						<div class="fsize-1 pt- ff" style="width: 100%; ">
						{{c.trainers.name}}
						</div>
						<div class="fsize-1 pt-2 " style="width: 100%;">
							{{c.price}}
						</div>
						<div style="width: 100%; padding:5px;" >
							<div class="font-weight-black fsize-1 red--text" style="position: absolute; left: 10px; bottom:10px;">
								{{c.loop}}
							</div>
						</div>
					</v-card-title>
				</v-card>
			</v-flex>
		</v-layout>		
	</div>
</template>
<script>
	export default {
		props:['catg_id'],
		methods:{
			install() {
				const vm = this;
				axios.get('courses/index/with_catg/' + vm.catg_id).then(response => {
					vm.courses = response.data;
				}).catch(err => {
					console.log(err)
				});
			}
		},
		created() {
			const vm = this;
			vm.install();
		},
		data() {
			return {
				courses:[]
			}
		}
	}
</script>