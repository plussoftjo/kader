<template>
	<div class="users">
		<v-container>
			<v-card>
			    <v-card-title>
			      Users Table
			      <v-spacer></v-spacer>
			      <v-text-field
			        v-model="search"
			        append-icon="search"
			        label="Search"
			        single-line
			        solo
			        hide-details
			      ></v-text-field>
			    </v-card-title>
			    <v-data-table
			      :headers="headers"
			      :items="users"
			      :search="search"
			    >
			      <template slot="items" slot-scope="props">
			        <td class="text-xs-left">{{ props.item.id }}</td>
			        <td class="text-xs-left">{{ props.item.name }}</td>
			        <td class="text-xs-left">{{ props.item.phone }}</td>
			        <td class="text-xs-left">{{ props.item.email }}</td>
			        <td class="text-xs-left">{{ props.item.age }}</td>
			        <td class="text-xs-left">{{ props.item.job }}</td>
			      </template>
			      <v-alert slot="no-results" :value="true" color="error" icon="warning">
			        Your search for "{{ search }}" found no results.
			      </v-alert>
			    </v-data-table>
			  </v-card>
		</v-container> 
	</div>
</template>
<script>
  export default {
    data () {
      return {
        search: '',
        headers: [
          {
            text: 'ID',
            align: 'left',
            sortable: false,
            value: 'id'
          },
          {
            text: 'Name',
            align: 'left',
            sortable: false,
            value: 'name'
          },
          {
            text: 'Phone',
            align: 'left',
            sortable: false,
            value: 'phone'
          },
          {
            text: 'email',
            align: 'left',
            sortable: false,
            value: 'email'
          },
          {
            text: 'age',
            align: 'left',
            sortable: false,
            value: 'age'
          },
          {
            text: 'job',
            align: 'left',
            sortable: false,
            value: 'job'
          },
        ],
        users: [
       
        ]
      }
    }
  }
</script>