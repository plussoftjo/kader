<template>
  <v-navigation-drawer permanent dark>
    <v-toolbar flat>
      <v-list>
        <v-list-tile>
          <v-list-tile-title class="title pl-2 font-weight-black">
            Admin Panel
          </v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-toolbar>

    <v-divider></v-divider>

    <v-list dense class="pt-0">
      <v-list-tile
        v-for="item in items"
        :key="item.title"
        @click="$router.push({name:item.at})"
      >
        <v-list-tile-action>
          <v-icon>{{ item.icon }}</v-icon>
        </v-list-tile-action>

        <v-list-tile-content>
          <v-list-tile-title class="font-weight-black">{{ item.title }}</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
    </v-list>
  </v-navigation-drawer>
</template>
<script>
  export default {
    data () {
      return {
        items: [
          { title: 'Home', icon: 'dashboard',at:'dashboard' },
          { title: 'Users', icon: 'group',at:'users' },
          { title: 'Categories', icon: 'apps',at:'categories' },
          { title: 'trainers', icon: 'apps',at:'trainers' },
          { title: 'courses', icon: 'apps',at:'courses' },
          { title: 'Subscribers', icon: 'apps',at:'Subscribers' },
          { title: 'order_course', icon: 'apps',at:'order_course' },
        ],
        right: null
      }
    }
  }
</script>