<template>
	<div class="reg">
		<tools></tools>
		<v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md8>
            <v-card class="elevation-12">
              <v-toolbar dark color="blue lighten-3 ff">
                <v-toolbar-title>
                	{{$vuetify.lang.current.reg_thank.head }}
                </v-toolbar-title>
                </v-tooltip>
              </v-toolbar>
			<v-container grid-list-lg class="bgReg">
				<v-layout row wrap>
					<div class="text-xs-center font-weight-black title white--text" style="width: 100%;">
						{{$vuetify.lang.current.reg_thank.content }}
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
		components:{tools},
		methods:{
			store() {
				const vm = this;
				axios.post('user/store',vm.user).then(response => {
					console.log(response.data);
				}).catch(err => {
					console.log(err);
				});
			}
		},
		created() {
			const vm = this
			setTimeout(function() {
				vm.$router.push({name:'index'})
			}, 2000);
		}
	}
</script>
<style>
	.bgReg{background-image: url('/images/index/signup.png'); background-size: 100%;}
</style>