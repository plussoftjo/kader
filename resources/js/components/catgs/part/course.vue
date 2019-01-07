<template>
	<div class="course ff text-xs-right" style="padding-top: 100px;">
		<div class="title ff font-weight-black  pt-2 pb-2">
			{{$vuetify.lang.current.catgs.the_course }}
		</div>
		<v-tabs v-model="active"  >
							<v-tab
							v-for="n in tabss"
							:key="n"
							class="font-weight-black title ff"
							>
								{{n}}
							</v-tab>
							<v-tab-item>
								<v-container grid-list-md>
								<v-layout row wrap>
									<v-flex md4 v-for="(i,index) in top_course" :key="index">
										<v-card class="circled elevation-8">
											<v-img
											height="200px"
											contain
											:src="i.image">
											</v-img>
											<v-card-title class="bluergba text-xs-right ff" @click="$router.push({name:'course',params:{id:i.id}})">
												<div class="fsize-2" style="width: 100%;">
												{{$vuetify.lang.current.course_g.name }}:<span class="font-weight-black">{{i.title}}</span>
												</div>
												<div class="fsize-1 pt- ff" style="width: 100%; ">
													{{$vuetify.lang.current.course_g.trainer }} : {{i.trainers.name}}
												</div>
												<div class="fsize-1 pt-2 " style="width: 100%;">
													{{$vuetify.lang.current.course_g.loop }} :{{i.loop}}
												</div>
												<div style="width: 100%; padding:5px;" >
													<div class="font-weight-black fsize-1 red--text" style="position: absolute; left: 10px; bottom:10px;">
														{{i.price}}
													</div>
												</div>
											</v-card-title>
										</v-card>
									</v-flex>
								</v-layout>			
								</v-container>
							</v-tab-item>
							<v-tab-item >
								<v-container grid-list-md>
								<v-layout row wrap>
									<v-flex md4 v-for="(i,index) in randome_course" :key="index">
										<v-card class="circled elevation-8">
											<v-img
											height="200px"
											contain
											:src="i.image">
											</v-img>
											<v-card-title class="bluergba text-xs-right ff" @click="$router.push({name:'course',params:{id:i.id}})">
												<div class="fsize-2" style="width: 100%;">
												{{$vuetify.lang.current.course_g.name }}:<span class="font-weight-black">{{i.title}}</span>
												</div>
												<div class="fsize-1 pt- ff" style="width: 100%; ">
													{{$vuetify.lang.current.course_g.trainer }} : {{i.trainers.name}}
												</div>
												<div class="fsize-1 pt-2 " style="width: 100%;">
													{{$vuetify.lang.current.course_g.loop }} :{{i.loop}}
												</div>
												<div style="width: 100%; padding:5px;" >
													<div class="font-weight-black fsize-1 red--text" style="position: absolute; left: 10px; bottom:10px;">
														{{i.price}}
													</div>
												</div>
											</v-card-title>
										</v-card>
									</v-flex>
								</v-layout>			
								</v-container>
							</v-tab-item>
						</v-tabs>
	</div>
</template>
<script>
	export default {
		data() {
			return {
				tabss:['افضل الكورسات','كورسات جديدة'],
				active:'طب اسنان',

			}
		},
		props:['top_course','randome_course']
	}
</script>