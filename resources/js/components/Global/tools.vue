<template>
	<div>
		 <v-toolbar app class="blue darken-4" dark>
		    <v-toolbar-side-icon @click="drawer =!drawer"></v-toolbar-side-icon>
		    <v-toolbar-title class="ff">اكاديمية كادر</v-toolbar-title>
		    <v-spacer></v-spacer>
		    <v-toolbar-items class="hidden-sm-and-down">
		    	 <v-btn flat class="ff" @click="$router.push({name:'index'})">
		          	الرئيسية 
				    </v-btn>
		          <v-btn flat class="ff" @click="$router.push({name:'login'})">
		          	تسجيل دخول
				    </v-btn>

				    <v-btn flat class="ff" @click="$router.push({name:'reg'})"> 
					حساب جديد
				    </v-btn>

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
		        {icon:'account_box',title:'تسجيل دخول',at:'login'},
		        {icon:'account_box',title:'مستخدم جديد',at:'reg'},
		        {icon:'account_box',title:'قائمة الكورسات',at:'catgs'},
		        ],
		        right: true,
		        
			}
		}
	}
</script>