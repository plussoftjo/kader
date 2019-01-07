<template>
	<v-container grid-list-lg class="bgReg">
				<v-layout row wrap>
					<v-flex xs12 md12>
						<v-alert :value="error" class="font-weight-black text-xs-center">
						{{$vuetify.lang.current.global.field_error}}
						</v-alert>
					</v-flex>
					<v-flex md12> 
						<v-text-field
						class="ff"
						v-model="user.name"
						:label="$vuetify.lang.current.frm.name"
						solo></v-text-field>
					</v-flex>
					<v-flex md12> 
						<v-text-field
						class="ff"
						v-model="user.phone"
						:label="$vuetify.lang.current.frm.phone"
						solo></v-text-field>
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
					<v-flex md12> 
						<v-text-field
						class="ff"
						v-model="user.age"
						:label="$vuetify.lang.current.frm.age"
						solo></v-text-field>
					</v-flex>
					<v-flex></v-flex>
				</v-layout>
				<v-layout row wrap>
					<v-flex md12>
						<v-btn class="success ff " block @click="reg">{{$vuetify.lang.current.global.reg}}</v-btn>
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
			reg() {
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