<template>
	<div class="course">
		<v-container>
			<v-card>
			    <v-card-title>
			     <v-btn class="success" @click="$router.push({name:'newCourse'})">
			     	Submit Courses 
			     </v-btn>
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
			      :items="courses"
			      :search="search"
			    >
			      <template slot="items" slot-scope="props">
			        <td class="text-xs-left">{{ props.item.id }}</td>
			        <td class="text-xs-left">{{ props.item.title }}</td>
			        <td class="text-xs-left">{{ props.item.litleDes }}</td>
			        <td class="text-xs-left">{{ props.item.trainers.name }}</td>
			        <td class="text-xs-left">
						<v-icon class="blue--text" @click="$router.push({name:'editCourse',params:{id:props.item.id}})">build</v-icon>
						<v-icon class="red--text" @click="destroy(props.item)">delete</v-icon>
			        </td>

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
		data() {
			return {
				search:'',
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
		            text: 'Little Description',
		            align: 'left',
		            sortable: false,
		            value: 'litleDes'
		          },
		          {
		            text: 'trainer',
		            align: 'left',
		            sortable: false,
		            value: 'trainer'
		          },
		          {
		            text: 'edit',
		            align: 'left',
		            sortable: false,
		            value: 'edit'
		          },
		        ],
		        courses:[],
			}
		},
		methods:{
			install() {
				const vm = this;
				axios.get('admin/course/index').then(response => {
					vm.courses = response.data;
				}).catch(err => {
					console.log(err)
				});
			},
			destroy(item) {
				const vm = this;
				var index = vm.courses.indexOf(item);
				confirm('Do you want delete ?') && axios.get('admin/course/destroy/' + item.id).then(response => {
					vm.courses.splice(index,1);
				}).catch(err => {
					console.log(err)
				});
			}
		},
		created() {
			const vm = this;
			vm.install();
		}
	}
</script>