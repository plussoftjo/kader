<template>
	<div class="order_course">
		<v-container justify-center align-center grid-list-md>
			<v-layout row wrap>
				<v-flex xs12 md6>
						<v-img src="images/search_man.png"
						contain></v-img>
				</v-flex>
				<v-flex xs12 md6>
							<div style="width: 100%;" class="font-weight-black fsize-3 text-xs-center blue--text darken-4 pt-3">
								{{$vuetify.lang.current.main.order_course.head_line }}
							</div>
							<div style="width:100%; font-size: 16px;" class=" mt-3 text-xs-center text-md-center font-weight-black">
								{{$vuetify.lang.current.main.order_course.content }}
							</div>
							<div class="text-xs-center pt-3">
								<v-icon style="font-size: 42px;">keyboard_arrow_down</v-icon>
							</div>
							<v-layout row wrap align-center justify-center class="mt-3"> 
								<v-btn class="success font-weight-black borderBtn" block @click="$router.push({name:'order_course'})">
									{{$vuetify.lang.current.main.order_course.btn }}
								</v-btn>
							</v-layout>
				</v-flex>

			</v-layout>
		</v-container>

	</div>
</template>
<script>
	export default {

	}
</script>