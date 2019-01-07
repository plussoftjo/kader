<template>
	<div class="reg">
		<tools></tools>
		<v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="blue darken-4 ff">
                <v-toolbar-title>{{$vuetify.lang.current.global.login }}</v-toolbar-title>
                </v-tooltip>
              </v-toolbar>
			<v-container grid-list-lg class="blue lighten-4">
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
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
	</div>
</template>
<script>
	import tools from '../Global/tools'
	export default {
		components:{tools},
		data() {
			return {
				user:{},
				error:false
			}
		},
		methods:{
			login() {
				const vm = this;
				vm.error = false;
				axios.post('user/login',vm.user).then(response => {
					vm.$router.push({name:'index'})
				}).catch(err => {
					vm.error =true;
				});
			}
		}
	}
</script>