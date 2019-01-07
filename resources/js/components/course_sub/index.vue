<template>
	<div class="course_sub">
		<tools :auth="auth" :user="user"></tools>
		
		<headLine :course="course" v-if="show"></headLine>
	

	<v-container fluid fill-height v-if="!auth">
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md8>
			<v-card>
				<v-card-title style="width: 100%;" class="pt-0 mt-0">
					<div style="width: 100%;">
						<v-layout row wrap>
							 <v-flex xs6 md6>
								<v-card-title class="font-weight-black text-xs-center white--text blue" @click="state = 'login'">
									<div style="width: 100%;">
									{{$vuetify.lang.current.global.login }}
									</div>
								</v-card-title>
							 </v-flex>
							 <v-flex xs6 md6> 
							 	<v-card-title class="font-weight-black text-xs-center white--text blue" @click="state = 'reg'">
							 		<div style="width:100%;">
							 			{{$vuetify.lang.current.global.reg }}
							 		</div>
							 	</v-card-title>
							 </v-flex>
						</v-layout>	
					</div>
				</v-card-title>

				<v-card-title>
					<div style="width: 100%;">
						<login v-if="state == 'login'"></login>
					</div>
				</v-card-title>
				<v-card-title>
					<div style="width: 100%;">
						<reg v-if="state == 'reg'"></reg>
					</div>
				</v-card-title>
			</v-card>	
          </v-flex>
      </v-layout>
    </v-container>

   <v-container fluid fill-height v-if="auth">
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md8>
			<v-card>
				<v-card-title class="blue white--text text-xs-center">
					<div style="width: 100%;">
						{{$vuetify.lang.current.course_sub.head_line}}
					</div>
				</v-card-title>
				<v-card-title>
					<div style="width: 100%;" class="text-xs-right font-weight-black title">
					{{$vuetify.lang.current.course_sub.sub_title}}
					</div>
				</v-card-title>
				<v-container grid-list-md>
					<v-layout row wrap>
						<v-radio-group v-model="radioGroup">
					      <v-radio
					      :label="$vuetify.lang.current.course_sub.way.one"
					      value="bank"
					      ></v-radio>
					  </v-radio-group>
					</v-layout>
				</v-container>
				<v-container text-xs-right>
					<v-layout row wrap>
						<div style="width: 100%;" class="title font-weight-black">
							{{$vuetify.lang.current.course_sub.frm.my_bank.head}}
						</div>
						<div style="width: 100%;">
							<div style="width: 100%;">{{$vuetify.lang.current.course_sub.frm.my_bank.account}}</div>
							<div style="width: 100%;">{{$vuetify.lang.current.course_sub.frm.my_bank.bank}}</div>
							<div style="width: 100%;">{{$vuetify.lang.current.course_sub.frm.my_bank.account_number}}</div>
							<div style="width: 100%;">{{$vuetify.lang.current.course_sub.frm.my_bank.EPAN}}</div>
						</div>
					</v-layout>
				</v-container>
				<v-container grid-list-md>
					<v-layout row wrap>
						<v-flex xs12 md12>
							<v-text-field
							:label="$vuetify.lang.current.course_sub.frm.frm.country"
							v-model="pay.country"
							solo></v-text-field>
						</v-flex>
						<v-flex xs12 md12>
							<v-text-field
							:label="$vuetify.lang.current.course_sub.frm.frm.full_name"
							v-model="pay.fullName"
							solo></v-text-field>
						</v-flex>
						<v-flex xs12 md12>
							<v-text-field
							:label="$vuetify.lang.current.course_sub.frm.frm.account_number"
							v-model="pay.account_number"
							solo></v-text-field>
						</v-flex>
						<v-flex xs12 md12>
							<v-text-field
							:label="$vuetify.lang.current.course_sub.frm.frm.bank_name"
							v-model="pay.bank_name"
							solo></v-text-field>
						</v-flex>
						<v-flex xs12 md12>
							<v-textarea
							:label="$vuetify.lang.current.course_sub.frm.frm.note"
							solo
							v-model="pay.note"></v-textarea>
						</v-flex>
					</v-layout>
				</v-container>
				<v-container grid-list-md>
					<v-layout row wrap>
						<v-flex md12>
							<v-btn class="success" @click="store">
								{{$vuetify.lang.current.course_sub.frm.btn}}
							</v-btn>
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
	import headLine from './part/headLine'
	import login from './part/login'
	import reg from './part/reg'
	export default {
		components:{tools,headLine,login,reg},
		methods:{
			install() {
				const vm = this;
				axios.get('/course/show/' + vm.$route.params.id).then(response => {
					vm.course = response.data;
					vm.show = true;
				}).catch(err => {
					console.log(err)
				});
			},
			store() {
				const vm = this;
				axios.post('pay/store/' + vm.$route.params.id,{type:vm.radioGroup,pay:vm.pay}).then(response => {
					vm.$router.push({name:'sub_thank'})
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
					}else {
						vm.auth = false;
					}
					vm.install();
				}).catch(err => {
					console.log(err)
				});
		},
		data() {
			return {
				auth:false,
				user:{},
				show:false,
				course:{},
				state:'login',
				radioGroup:'bank',
				pay:{country:'',fullName:'',account_number:'',bank_name:'',note:''}
			}
		}
	}
</script>