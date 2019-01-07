<template>
	<div class="catgs">
		<v-container>
			<v-card>
			    <v-card-title>
			     <v-btn class="success" @click="dialog = !dialog">
			     	Submit categories 
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
			      :items="catgs"
			      :search="search"
			    >
			      <template slot="items" slot-scope="props">
			        <td class="text-xs-left">{{ props.item.id }}</td>
			        <td class="text-xs-left">{{ props.item.name }}</td>
			        <td class="text-xs-left">{{ props.item.des }}</td>
			        <td class="text-xs-left">
						<v-icon class="blue--text" @click="() => {
							editDialog = !editDialog;
							catg = props.item;
						}">build</v-icon>
						<v-icon class="red--text" @click="destroy(props.item)">delete</v-icon>
			        </td>

			      </template>
			      <v-alert slot="no-results" :value="true" color="error" icon="warning">
			        Your search for "{{ search }}" found no results.
			      </v-alert>
			    </v-data-table>
			  </v-card>
		</v-container> 
		<v-dialog v-model="dialog" max-width="500px">
			<v-card>
				<v-card-title class="grey lighten-3">
					Submit new categories 
				</v-card-title>
					<v-container grid-list-md>
						<v-layout row wrap>
							<v-flex xs12>
								<v-text-field
								v-model="catg.name"
								label="categories Name"
								solo></v-text-field>
							</v-flex>
							<v-flex xs12>
								<v-text-field
								label="categories Description"
								v-model="catg.des"
								solo></v-text-field>
							</v-flex>
							<v-flex xs6>
								<v-btn class="success" block @click="store">
									Store
								</v-btn>
							</v-flex>
							<v-flex xs6>
								<v-btn @click="dialog = !dialog" block>
									close 
								</v-btn>
							</v-flex>
						</v-layout>	
					</v-container>
			</v-card>
		</v-dialog>
		<v-dialog v-model="editDialog" max-width="500px">
			<v-card>
				<v-card-title class="grey lighten-3">
					Submit new categories 
				</v-card-title>
					<v-container grid-list-md>
						<v-layout row wrap>
							<v-flex xs12>
								<v-text-field
								v-model="catg.name"
								label="categories Name"
								solo></v-text-field>
							</v-flex>
							<v-flex xs12>
								<v-text-field
								label="categories Description"
								v-model="catg.des"
								solo></v-text-field>
							</v-flex>
							<v-flex xs6>
								<v-btn class="success" block @click="update">
									Update
								</v-btn>
							</v-flex>
							<v-flex xs6>
								<v-btn @click="editDialog = !editDialog" block>
									close 
								</v-btn>
							</v-flex>
						</v-layout>	
					</v-container>
			</v-card>
		</v-dialog>
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
            text: 'des',
            align: 'left',
            sortable: false,
            value: 'des'
          },
          {
            text: 'edit',
            align: 'left',
            sortable: false,
            value: 'edit'
          },
        ],
        catgs: [
       
        ],
        catg:{},
        dialog:false,
        editDialog:false
      }
    },
    methods:{
    	store() {
    		const vm = this;
    		axios.post('/admin/catg/store',vm.catg).then(response => {
    			vm.catgs.push(response.data)
    			vm.dialog = false;
    			vm.catg = {};
    		}).catch(err => {
    			console.log(err)
    		});
    	},
    	install() {
    		const vm = this;
    		axios.get('/admin/catg/index').then(response => {
    			vm.catgs = response.data;
    		}).catch(err => {
    			console.log(err)
    		});
    	},
    	update() {
    		const vm = this;
    		axios.post('/admin/catg/update/' + vm.catg.id,vm.catg).then(response => {
    			vm.catg = {};
    			vm.editDialog = false;
    		}).catch(err => {
    			console.log(err)
    		});
    	},
    	destroy(item) {
    		const vm = this;
    		var index = vm.catgs.indexOf(item);
    		confirm('Do you want delete ?') && axios.get('/admin/catg/destroy/' + item.id).then(response => {
    			vm.catgs.splice(index,1);
    		}).catch(err => {
    			console.log(err );
    		}); 
    	}
    },
    created() {
    	const vm = this;
    	vm.install();
    }
  }
</script>