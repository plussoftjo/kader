<template>
	<div class="reg">
		<tools></tools>
		<v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="blue darken-4 ff">
                <v-toolbar-title>حساب جديد</v-toolbar-title>
                </v-tooltip>
              </v-toolbar>
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
							<v-btn class="success ff" block >اشترك معنا</v-btn>
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
		components:{tools}
	}
</script>