<template>
	<div class="index">
		<tools :auth="auth" :user="user"></tools>

		<headBox></headBox>
		<howWeAre></howWeAre>
		<order_course></order_course>
		<topLession></topLession>
		<timeline></timeline>
		<contactus v-if="!auth"></contactus>
		

		<ftr></ftr>


		

		 <v-footer class="pa-3 blue">
		    <v-spacer></v-spacer>
		    <div class="white--text font-weight-black">&copy; {{ new Date().getFullYear() }}</div>
		  </v-footer>		
	</div>
</template>
<script>
	import tools from '../Global/tools'
	import headBox from './part/head_box'
	import howWeAre from './part/how_are_we'
	import topLession from './part/top_lession'
	import timeline from './part/timeline'
	import contactus from './part/contactus'
	import order_course from './part/order_course'
	import ftr from '../Global/ftr.vue'
	export default {
		components:{tools,headBox,howWeAre,topLession,timeline,contactus,order_course,ftr},
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
			}
		},
		created() {
			const vm = this;
			vm.install()
			console.log(vm.$vuetify.lang)
		},
		data() {
			return {
				auth:false,
				user:{}
			}
		}
	}
</script>