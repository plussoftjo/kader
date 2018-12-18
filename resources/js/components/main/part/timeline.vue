<template>
	<div class="timeline pa-1">
		<v-card>
			<v-card-title class="blue darken-4 white--text">
				<div style="width: 100%;" class="font-weight-black title text-xs-center">
					كيف سابدا ؟ 
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
        {
          color: 'red lighten-2',
          icon: 'search',
          head_text:'الكورس المناسب ',
          conent:'احبث عن الكورس المناسب لك من بين مجموعة من الكورسات  المتوفرة بين يديك'
        },
        {
          color: 'green lighten-2',
          icon: 'person_add',
          head_text:'انضم لنا',
          conent:'انضم الى مجموعة كادر وسجل بخطوات بسيطة '
        },
        {
          color: 'purple lighten-2',
          icon: 'star',
          head_text:'اشترك بالدورة',
          conent:'اشترك بالدورة بعد مشاهدة عينات للدورة المطلوبة'
        },
        {
          color: 'blue lighten-2',
          icon: 'credit_card',
          head_text:'اكمل الطلب',
          conent:'اكمل معلومات الدفع واكمل الطلب للاشتراك بالدورة'
        },
      ]
    })
  }
</script>