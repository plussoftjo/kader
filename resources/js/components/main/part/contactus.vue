<template>
	<v-container>
		<v-card>
			<v-card-title class="blue darken-4 white--text font-weight-black title ff">
				{{$vuetify.lang.current.main.contact_us.head_line }}	
			</v-card-title>
			<v-container grid-list-lg class="bgReg">
				<v-layout row wrap>
					<v-flex xs12 m12>
						<v-alert :value="error" class="text-xs-center font-weight-black">
							{{$vuetify.lang.current.global.field_error }}	
						</v-alert>
					</v-flex>
						<v-flex md6>
							<v-text-field
							:label="$vuetify.lang.current.main.contact_us.field.name"
							class="ff"
							v-model="user.name"
							solo></v-text-field>
						</v-flex>
						<v-flex md6>
							<v-text-field
							:label="$vuetify.lang.current.main.contact_us.field.age"
							class="ff"
							v-model="user.age"
							solo></v-text-field>
						</v-flex>
						<v-flex md6> 
							<v-text-field
							:label="$vuetify.lang.current.main.contact_us.field.email"
							class="ff"
							v-model="user.email"
							solo></v-text-field>
						</v-flex>
						<v-flex md6>
							<v-text-field type="password"
							solo
							class="ff"
							v-model="user.password"
							:label="$vuetify.lang.current.main.contact_us.field.password"></v-text-field>
						</v-flex>
						<v-flex md6>
							<v-text-field
							:label="$vuetify.lang.current.main.contact_us.field.phone"
							class="ff"
							v-model="user.phone"
							solo></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md6></v-flex>
						<v-flex md6>
							<v-btn class="success ff" block @click="store">اشترك معنا</v-btn>
						</v-flex>
					</v-layout>
			</v-container>
					
		</v-card>
	</v-container>
</template>
<script>
	export default {
		data() {
			return {
				jobs:['طالب','موظف','صاحب عمل'],
				user:{},
				error:false,
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