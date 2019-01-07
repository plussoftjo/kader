<template>
	<div class="timeline pa-1">
		<v-card>
			<v-card-title class="blue darken-4 white--text">
				<div style="width: 100%;" class="font-weight-black title text-xs-center">
					{{$vuetify.lang.current.main.timeline.head_line }}
				</div>
			</v-card-title>
			<v-card-title>
				<div style="width:100%;">
				<v-timeline align-top>
				    <v-timeline-item
				      v-for="(item, i) in items"
				      :color="item.color"
				      :icon="item.icon"
				      :key="i"
				      fill-dot
				    >
				      <v-card
				        :color="item.color"
				        dark
				        class="ff"
				      >
				        <v-card-title class="title ff font-weight-black">{{item.head_text}}</v-card-title>
				        <v-card-text class="white text--primary ff font-weight-black text-xs-right">
				          <p>{{item.conent}}.</p>
				      
				        </v-card-text>
				      </v-card>
				    </v-timeline-item>
				  </v-timeline>
				</div>
			</v-card-title>
		</v-card>
	</div>
</template>
<script>
  export default {
    data: () => ({
      items: [
       
      ]
    }),
    methods:{
    	installLanguage(){
    		const vm = this;
    		vm.items = vm.$vuetify.lang.current.main.timeline.items;
    	}
    },
    created() {
    	const vm = this;
    	vm.installLanguage();
    }
  }
</script>