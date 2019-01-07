<template>
	<div>
		 <v-toolbar app class="blue darken-4" dark>
		    <v-toolbar-side-icon @click="drawer =!drawer"></v-toolbar-side-icon>
		    <v-toolbar-title class="ff">
		    	{{$vuetify.lang.current.global.title }}
		    </v-toolbar-title>
		    <v-spacer></v-spacer>
		    <v-toolbar-items class="hidden-sm-and-down">
		    	 <v-btn flat class="ff" @click="$router.push({name:'index'})">
		          	{{$vuetify.lang.current.global.main }}
				    </v-btn>
		          <v-btn flat class="ff" @click="$router.push({name:'login'})" v-if="!auth">
		          	{{$vuetify.lang.current.global.login }}
				    </v-btn>

				    <v-btn flat class="ff" @click="$router.push({name:'reg'})" v-if="!auth"> 
					{{$vuetify.lang.current.global.reg }}
				    </v-btn>
				    <v-btn flat class="ff" @click="logout" v-if="auth">
				    	{{$vuetify.lang.current.global.logout }}
				    </v-btn>
				   	<v-menu offset-y>
					   	<v-btn slot="activator" flat class="ff" > 
					   		{{$vuetify.lang.current.global.lang}}
					   	</v-btn>	
					   	<v-list>
				        <v-list-tile
				          @click="changeLang('en')"
				        >
				          <v-list-tile-title>English</v-list-tile-title>
				        </v-list-tile>
				        <v-list-tile
				          @click="changeLang('ar');"
				        >
				          <v-list-tile-title>العربية</v-list-tile-title>
				        </v-list-tile>
				      </v-list>
				   	</v-menu>

		    </v-toolbar-items>
		</v-toolbar>
 				
		<v-navigation-drawer
	     v-model='drawer' app  
	      	 class="blue darken-4" right
	    >
	      <v-list class="pt-0" >
	        <v-list-tile
	          v-for="item in items"
	          :key="item.title"
	          @click="$router.push({name:item.at})"
	          class="white--text text-xs-right"
	        >
	          <v-list-tile-action>
	            <v-icon class="white--text">{{ item.icon }}</v-icon>
	          </v-list-tile-action>

	          <v-list-tile-content>
	            <v-list-tile-title class="font-weight-black ff">{{ item.title }}</v-list-tile-title>
	          </v-list-tile-content>
	        </v-list-tile>
	         <v-list-tile
	          @click="$router.push({name:'reg'})"
	          class="white--text text-xs-right"
	          v-if="!auth"
	        >
	          <v-list-tile-action>
	            <v-icon class="white--text">account_box</v-icon>
	          </v-list-tile-action>

	          <v-list-tile-content>
	            <v-list-tile-title class="font-weight-black ff">حساب جديد</v-list-tile-title>
	          </v-list-tile-content>
	        </v-list-tile>
	         <v-list-tile
	          @click="$router.push({name:'login'})"
	          class="white--text text-xs-right"
	          v-if="!auth"
	        >
	          <v-list-tile-action>
	            <v-icon class="white--text">account_box</v-icon>
	          </v-list-tile-action>

	          <v-list-tile-content>
	            <v-list-tile-title class="font-weight-black ff">تسجيل دخول</v-list-tile-title>
	          </v-list-tile-content>
	        </v-list-tile>
	        <v-list-tile
	          @click="changeLang('en')"
	          class="white--text text-xs-right"
	        >
	          <v-list-tile-action>
	            <v-icon class="white--text">account_box</v-icon>
	          </v-list-tile-action>

	          <v-list-tile-content>
	            <v-list-tile-title class="font-weight-black ff">English</v-list-tile-title>
	          </v-list-tile-content>
	        </v-list-tile>
	        <v-list-tile
	          @click="changeLang('ar')"
	          class="white--text text-xs-right"
	        >
	          <v-list-tile-action>
	            <v-icon class="white--text">account_box</v-icon>
	          </v-list-tile-action>

	          <v-list-tile-content>
	            <v-list-tile-title class="font-weight-black ff">العربية</v-list-tile-title>
	          </v-list-tile-content>
	        </v-list-tile>
	        <v-list-tile
	          @click="logout"
	          class="white--text text-xs-right"
	          v-if="auth"
	        >
	          <v-list-tile-action>
	            <v-icon class="white--text">account_box</v-icon>
	          </v-list-tile-action>

	          <v-list-tile-content>
	            <v-list-tile-title class="font-weight-black ff">تسجيل خروج</v-list-tile-title>
	          </v-list-tile-content>
	        </v-list-tile>
	      </v-list>
	    </v-navigation-drawer>
	</div>
</template>
<script>
	export default {
		data() {
			return {
				drawer: false,
		        items: [
		        {icon:'home',title:'الرئيسية',at:'index'},
		        {icon:'account_box',title:'قائمة الكورسات',at:'catgs'},
		        ],
		        right: true,
		        
			}
		},
		props:['user','auth'],
		methods:{
			logout() {
				const vm = this;
				axios.get('user/logout').then(response => {
					location.reload()
				}).catch(err => {
					console.log(err)
				});
			},
			changeLang(lang) {
				const vm = this
				localStorage.setItem('lang',lang);
				location.reload()
			},
			installData() {
				const vm = this;
				vm.items = [
				{icon:'home',title:vm.$vuetify.current.global.main,at:'index'},
		        {icon:'account_box',title:vm.$vuetify.current.global.catg,at:'catgs'},
				]
			}
		},
	}
</script>