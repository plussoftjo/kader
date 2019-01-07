<template>
	<v-container grid-list-lg class="bgReg">
				<v-layout row wrap>
					<v-flex xs12 md12>
							<v-alert :value="error" class="font-weight-black text-xs-center">	{{$vuetify.lang.current.global.auth_error }}</v-alert>
						</v-flex>
					<v-flex md12> 
						<v-text-field
						class="ff"
						v-model="user.email"
					:label="$vuetify.lang.current.frm.email"
						solo></v-text-field>
					</v-flex>
					<v-flex md12>
						<v-text-field type="password"
						class="ff"
						solo
						v-model="user.password"
						:label="$vuetify.lang.current.frm.password"
						></v-text-field>
					</v-flex>
					<v-flex></v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md12>
						<v-btn class="success ff " block @click="login">{{$vuetify.lang.current.global.login }}</v-btn>
					</v-flex>
				</v-layout>
		</v-container>	
</template>
<script>
	export default {
		data() {
			return {
				user:{},
				error:false
			}
		},
		methods:{
			login() {
				const vm = this;
				axios.post('user/login',vm.user).then(response => {
					location.reload();
				}).catch(err => {
					vm.error =true;
				});
			}
		}
	}
</script>