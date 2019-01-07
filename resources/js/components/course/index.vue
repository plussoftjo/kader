<template>
	<div class="course" v-if="show">
		<tools :auth="auth" :user="user"></tools>

		<headLine :course="course"></headLine>
		<detailsPart :course="course"></detailsPart>
		<contentPart :course="course"></contentPart>
		<moreDetails :course="course"></moreDetails>
		<personDetails :trainers="course.trainers"></personDetails>
		 <v-footer class="pa-3 blue lighten-2">
		    <v-spacer></v-spacer>
		    <div class="white--text font-weight-black">&copy; {{ new Date().getFullYear() }}</div>
		  </v-footer>
	</div>
</template>
<script>
	import tools from '../Global/tools'
	import headLine from './part/headLine'
	import detailsPart from './part/detailsPart'
	import contentPart from './part/contentPart'
	import moreDetails from './part/moreDetails'
	import personDetails from './part/personDetails'
	export default {
		components:{tools,headLine,detailsPart,contentPart,moreDetails,personDetails},
		methods:{
			install() {
				const vm = this;
				axios.get('course/show/' + vm.$route.params.id).then(response => {
					vm.course = response.data;
					vm.show = true;
				}).catch(err => {
					console.log(err)
				});
			}
		},
		created() {
			const vm = this;
			axios.get('user/user_auth').then(response => {
					if(response.data.auth) {
						vm.auth = true;
						vm.user = response.data.user;
						vm.install();
					}else {
						vm.auth = false;
						vm.install();
					}
				}).catch(err => {
					console.log(err)
				});
		},
		data() {
			return {
				course:{},
				show:false,
				user:{},
				auth:false
			}
		}
	}
</script>