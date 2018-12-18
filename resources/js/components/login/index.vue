<template>
	<div class="reg">
		<tools></tools>
		<v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="blue darken-4 ff">
                <v-toolbar-title>تسجيل دخول</v-toolbar-title>
                </v-tooltip>
              </v-toolbar>
			<v-container grid-list-lg class="bgReg">
				<v-layout row wrap>
					
						<v-flex md12> 
							<v-text-field
							class="ff"
							label="البريد الالكتروني"
							solo></v-text-field>
						</v-flex>
						<v-flex md12>
							<v-text-field type="password"
							class="ff"
							solo
							label="كلمة المرور"></v-text-field>
						</v-flex>
						<v-flex></v-flex>
					</v-layout>
					<v-layout row wrap>
						<v-flex md12>
							<v-btn class="success ff " block>تسجيل  دخول </v-btn>
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