<template>
	<div class="ftr blue lighten-2">
		<v-container grid-list-md text-xs-center>
			<v-layout row wrap>
				<v-flex xs12 md4>
					<div class="fsize-2 font-weight-black white--text">
					{{$vuetify.lang.current.global.frm.title }}
					</div>
					<div class="white--text">
						{{$vuetify.lang.current.global.frm.content }}
					</div>
				</v-flex>
			</v-layout>
		</v-container>
	</div>
</template>
<script>
	export default {

	}
</script>
<style>
	
</style>