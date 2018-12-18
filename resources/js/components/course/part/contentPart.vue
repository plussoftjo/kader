<template>
	<div class="content ">
		<v-container grid-list-md text-xs-right>
			<v-card>
				<v-card-title class="grey">
					<div style="width: 100%;" class="white--text font-weight-black ff title">
						محتوى الكورس
					</div>
				</v-card-title>
				<v-card-title class="font-weight-black ff" v-for="i in 6" :key="i">
					عنوان الدرس
					<hr>
					<v-spacer></v-spacer>
					مشاهدة

				</v-card-title>
			</v-card>	
		</v-container>
		
	</div>
</template>
<script>
	export default {

	}
</script>