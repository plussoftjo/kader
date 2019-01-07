<template>
	<div class="reg">
		<tools></tools>
		<v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md8>
            <v-card class="elevation-12">
              <v-toolbar dark color="blue darken-4 ff">
                <v-toolbar-title>{{$vuetify.lang.current.global.reg}}</v-toolbar-title>
                </v-tooltip>
              </v-toolbar>
			<v-container grid-list-lg class="bgReg">
				<v-layout row wrap>
					<v-flex xs12 md12>
						<v-alert :value="error" class="font-weight-black text-xs-center">
						{{$vuetify.lang.current.global.field_error}}
						</v-alert>
					</v-flex>
						<v-flex md6>
							<v-text-field
							:label="$vuetify.lang.current.frm.name"
							class="ff"
							v-model="user.name"
							solo></v-text-field>
						</v-flex>
						<v-flex md6>
							<v-text-field
							:label="$vuetify.lang.current.frm.age"
							class="ff"
							v-model="user.age"
							solo></v-text-field>
						</v-flex>
						<v-flex md6> 
							<v-text-field
							:label="$vuetify.lang.current.frm.email"
							class="ff"
							v-model="user.email"
							solo></v-text-field>
						</v-flex>
						<v-flex md6>
							<v-text-field type="password"
							solo
							class="ff"
							v-model="user.password"
							:label="$vuetify.lang.current.frm.password"
							></v-text-field>
						</v-flex>
						<v-flex md6>
							<v-text-field
							:label="$vuetify.lang.current.frm.phone"
							class="ff"
							v-model="user.phone"
							solo></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md6></v-flex>
						<v-flex md6>
							<v-btn class="success ff" block @click="store">{{$vuetify.lang.current.global.reg}}</v-btn>
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
				jobs:['طالب','موظف','صاحب عمل'],
				user:{},
				error:false
			}
		},
		methods:{
			store() {
				const vm = this;
				axios.post('user/store',vm.user).then(response => {
					vm.$router.push({name:'thankyou'})
				}).catch(err => {
					vm.error = true;
				});
			}
		}
	}
</script>

<style>
	.bgReg{background-image: url('/images/index/signup.png'); background-size: 100%;}
</style>