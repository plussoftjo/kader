<template>
	<v-container>
		<v-card>
			<v-card-title class="blue darken-4 white--text font-weight-black title ff">
				اشترك معنا
			</v-card-title>
			<v-container grid-list-lg class="bgReg">
				<v-layout row wrap>
						<v-flex md6>
							<v-text-field
							label="الاسم الاول"
							class="ff"
							solo></v-text-field>
						</v-flex>
						<v-flex md6>
							<v-text-field
							label="الاسم الاخير"
							class="ff"
							solo></v-text-field>
						</v-flex>
						<v-flex md6> 
							<v-text-field
							label="البريد الالكتروني"
							class="ff"
							solo></v-text-field>
						</v-flex>
						<v-flex md6>
							<v-text-field type="password"
							solo
							class="ff"
							label="كلمة المرور"></v-text-field>
						</v-flex>
						<v-flex></v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md6>
							<v-text-field
							label="العمر"
							class="ff"
							solo></v-text-field>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md6> 
							<v-select
							:items="jobs"
							class="ff"
							solo
							label="الوظيفة"></v-select>
						</v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md6></v-flex>
						<v-flex md6>
							<v-btn class="success ff" block>اشترك معنا</v-btn>
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
				jobs:['طالب','موظف','صاحب عمل']
			}
		}
	}
</script>
<style>
	.bgReg{background-image: url('/images/index/signup.png'); background-size: 100%;}
</style>