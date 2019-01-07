<template>
	<div class="frm">
		<v-container grid-list-md text-xs-center>
			<v-card>
				<v-card-title class="success white--text font-weight-black">
					<div style="width : 100%;">
						{{$vuetify.lang.current.order_course.secound_line }}
					</div>
				</v-card-title>
				<v-container class="green lighten-5">
					<v-layout row wrap>
						<v-flex xs12 md6>
							<v-text-field
							:label="$vuetify.lang.current.order_course.frm.full_name"
							v-model="order.full_name"
							solo></v-text-field>
						</v-flex>
						<v-flex xs12 md6>
							<v-text-field
							:label="$vuetify.lang.current.order_course.frm.email"
							solo
							v-model="order.email"></v-text-field>
						</v-flex>
						<v-flex xs12 md6>
							<v-select
							:label="$vuetify.lang.current.order_course.frm.gender"
							:items="genders"
							v-model="order.gender"
							solo></v-select>
						</v-flex>
						<v-flex xs12 md6>
							<v-text-field
							:label="$vuetify.lang.current.order_course.frm.phone"
							solo
							v-model="order.phone"></v-text-field>
						</v-flex>
						<v-flex xs12 md6>
							<v-text-field
							:label="$vuetify.lang.current.order_course.frm.place"
							solo
							v-model="order.place"></v-text-field>
						</v-flex>
						<v-flex xs12 md6>
							<v-text-field
							:label="$vuetify.lang.current.order_course.frm.person_much"
							solo 
							v-model="order.person_much"></v-text-field>
						</v-flex>
						<v-flex md12 xs12>
							<v-text-field
							:label="$vuetify.lang.current.order_course.frm.search"
							solo
							v-model="order.search"></v-text-field>
						</v-flex>
						<v-flex xs12 md2>
							<span class="font-weight-black">{{$vuetify.lang.current.order_course.frm.loop }}</span>
						</v-flex>
						<v-flex xs12 md10>
							<v-layout row wrap>
								<v-flex xs6 md6>
									<v-text-field
									:label="$vuetify.lang.current.order_course.frm.days"
									v-model="order.days"
									solo></v-text-field>
								</v-flex>
								<v-flex xs6 md6>
									<v-text-field
									:label="$vuetify.lang.current.order_course.frm.months"
									v-model="order.months"
									solo></v-text-field>
								</v-flex>
							</v-layout>
						</v-flex>
						<v-flex xs12 md6>
							<v-select
							:label="$vuetify.lang.current.order_course.frm.n"
							solo
							:items="nationaltys"
							v-model="n"></v-select>
						</v-flex>
						<v-flex xs12 md6 v-if="!other_n"></v-flex>
						<v-flex xs12 md6 v-if="other_n">
							<v-text-field
							:label="$vuetify.lang.current.order_course.frm.other_n"
							v-model="order.other_n"
							solo></v-text-field>
						</v-flex>
						<v-flex xs12 md6>
							<v-select
							:items="favs_gender"
							:label="$vuetify.lang.current.order_course.frm.fav_gender"
							solo
							v-model="order.fav_gender"></v-select>
						</v-flex>
						<v-flex xs12 md12>
							<v-select
							:items="wheres_get"
							:label="$vuetify.lang.current.order_course.frm.where_get"
							solo
							v-model="order.where_get"></v-select>
						</v-flex>
						<v-flex xs12 md6>
							<v-select
							:items="budgets"
							:label="$vuetify.lang.current.order_course.frm.budget"
							solo
							v-model="order.budget"></v-select>
						</v-flex>
						<v-flex xs12 md12>
							<v-text-field
							:label="$vuetify.lang.current.order_course.frm.goals"
							solo
							v-model="order.goals"></v-text-field>
						</v-flex>
						<v-flex x12 md12>
							<v-textarea
							:label="$vuetify.lang.current.order_course.frm.courses_feed"
							solo
							v-model="order.courses_feed"></v-textarea>
						</v-flex>

						<v-flex xs12 md12>
							<v-btn class="success " block @click="store">
								{{$vuetify.lang.current.order_course.btn }}
							</v-btn>
						</v-flex>
					</v-layout>	
				</v-container>
				
			</v-card>
		</v-container>
	</div>
</template>
<script>
	export default {
		data() {
			return {
				genders:['ذكر','انثى'],
				order:{},
				nationaltys:['عربي','غير عربي','آخر'],
				n:'',
				other_n:false,
				favs_gender:['ذكر','انثى'],
				wheres_get:['نعم','لا'],
				budgets:['2000 - 5000','5000 - 10000','10000 - 15000']
			}
		},
		watch:{
			n() {
				const vm = this;
				if(vm.n =='آخر') {
					vm.other_n = true;
				}else{
					vm.other_n = false;
				}
			}
		},
		methods:{
			store(){
				const vm = this;
				vm.order.nationalty = vm.n; 
				axios.post('frm/store',vm.order).then(response => {
					vm.$router.push({name:'order_thank'})
				}).catch(err => {
					console.log(err)
				});
			}
		}
	}
</script>