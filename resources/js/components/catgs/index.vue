<template>
	<div class="catgs">
		<tools :user="user" :auth="auth"></tools>

		<v-tabs
	    dark
	    color="blue lighten-2"
	    show-arrows
	  >
	    <v-tabs-slider color="blue darken-4"></v-tabs-slider>

	    <v-tab
	      v-for="(i,index) in catg"
	      :key="index"
	      @click="() => {active = i.id; catg_name = i.name;}"
	      class="font-weight-black ff title ff"
	    >
	        {{i.name}}
	    </v-tab>
	  </v-tabs>
		<headLine :first_course="first_course" :catg_name="catg_name"></headLine>
		<course :randome_course="randome_course" :top_course="top_course"></course>
		<person :trainers="trainers"></person>

			 <v-footer class="pa-3 blue lighten-2">
		    <v-spacer></v-spacer>
		    <div class="white--text font-weight-black">&copy; {{ new Date().getFullYear() }}</div>
		  </v-footer>	
	</div>
</template>
<script>
	import tools from '../Global/tools'
	import tap from './part/tap'
	import headLine from './part/headLine'
	import course from './part/course'
	import person from './part/person'
	export default {
		components:{tools,tap,headLine,course,person},
		methods:{
			install() {
				const vm = this;
				axios.get('user/user_auth').then(response => {
					if(response.data.auth) {
						vm.auth = true;
						vm.user = response.data.user;
					}else {
						vm.auth = false;
					}
				}).catch(err => {
					console.log(err)
				});

				axios.get('catg_page/index').then(response => {
					vm.catg = response.data.catg;
					vm.randome_course = response.data.randome_course;
					vm.top_course = response.data.top_course;
					vm.active = response.data.active;
					vm.first_course = response.data.first_course;
					vm.catg_name = response.data.catg_name;
					vm.trainers = response.data.trainers;
				}).catch(err => {
					console.log(err)
				});
			}
		},
		created() {
			const vm = this;
			vm.install()
		},
		data() {
			return {
				auth:false,
				user:{},
				catg:[],
				randome_course:[],
				top_course:[],
				active:null,
				first_course:{},
				catg_name:null,
				trainers:[]
			}
		},
		watch:{
			active() {
				const vm = this;
				axios.get('catg_page/change_catg/index/' + vm.active).then(response => {
					vm.randome_course = response.data.randome_course;
					vm.top_course = response.data.top_course;
					vm.first_course = response.data.first_course;
				}).catch(err => {
					console.log(err)
				});
			}
		}
	}
</script>