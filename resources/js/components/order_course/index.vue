<template>
	<div class="order_course">
		<tools :user="user" :auth="auth"></tools>

		<headLine></headLine>
		<frm></frm>
	</div>
</template>
<script>
	import tools from '../Global/tools'
	import headLine from './part/head_line'
	import frm from './part/frm'
	export default {
		components:{tools,headLine,frm},
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
			},
			
		},
		created() {
			const vm = this;
			vm.install()
		},
		data() {
			return {
				auth:false,
				user:{}
			}
		}
	}
</script>