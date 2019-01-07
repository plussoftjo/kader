<template>
	<div class="sub_thank">
		<tools :auth="auth" :user="user"></tools>
		

	<v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md8>
            <v-card class="elevation-12">
              <v-toolbar dark color="blue lighten-3 ff">
                <v-toolbar-title>
                {{$vuetify.lang.current.sub_thank.head }}
                </v-toolbar-title>
                </v-tooltip>
              </v-toolbar>
			<v-container grid-list-lg class="bgReg">
				<v-layout row wrap>
					<div class="text-xs-center font-weight-black title black--text" style="width: 100%;">
					{{$vuetify.lang.current.sub_thank.content }}
					</div>
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
		data() {
			return {
				user:{},
				auth:false
			}
		},
		methods:{
			install() {
				const vm = this;

			}
		},
		created() {
			const vm  = this;
			axios.get('user/user_auth').then(response => {
					if(response.data.auth) {
						vm.auth = true;
						vm.user = response.data.user;
					}else {
						vm.auth = false;
					}
				}).catch(err => {
					console.log(err)
				});
		},
		components:{tools}
	}
</script>