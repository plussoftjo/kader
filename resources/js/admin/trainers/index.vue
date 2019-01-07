<template>
  <div class="trainers">
   	<v-container>
			<v-card>
			    <v-card-title>
			     <v-btn class="success" @click="dialog = !dialog">
			     	Submit trainers 
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
			      :items="trainers"
			      :search="search"
			    >
			      <template slot="items" slot-scope="props">
			        <td class="text-xs-left">{{ props.item.id }}</td>
			        <td class="text-xs-left">{{ props.item.name }}</td>
			        <td class="text-xs-left">{{ props.item.des }}</td>
			        <td class="text-xs-left">
						<v-icon class="blue--text" @click="() => {
							editDialog = !editDialog;
							trainer = props.item;
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
			<v-card-title>
				Submit new trainers profile
			</v-card-title>
			<v-container grid-list-md>
				<v-layout row wrap>
					<v-flex xs12>
						<v-text-field
						label="Trainer Name"
						v-model="trainer.name"
						solo></v-text-field>
					</v-flex>
					<v-flex xs12>
						<v-text-field
						label="Trainer Description"
						v-model="trainer.des"
						solo></v-text-field>
					</v-flex>
					<v-flex xs12>
						<div style="width: 100%;">
							<v-btn class="pink" dark @click="selectImage">
								رفع صورة
							</v-btn>
							<div class="inputF">
							<input type="file" v-on:change="onFileChange" class="form-control" ref="image">
							</div>	
						</div>
					</v-flex>
					<v-flex xs12>
						<v-card>
							<v-card-title class="grey lighten-3 font-weight-black">
								Add Degree Or experience
								<v-spacer></v-spacer>
								<v-btn class="blue" dark fab small @click="() => {
									degrees.push({text:''});
								}">+</v-btn>
							</v-card-title>	
							<v-layout row wrap  v-for="(d,index) in degrees" :key="index">
								<v-flex xs10>
									<v-text-field 
									label="Degree or experince Details"
									v-model="d.text"
									solo></v-text-field>
								</v-flex>
								<v-flex xs2>
									<v-btn dark icon class="red" @click="destroyCreateDegree(index)">X</v-btn>
								</v-flex>
							</v-layout>
						</v-card>
						
					</v-flex>
					<v-flex xs6>
						<v-btn class="success" block @click="store">
							save
						</v-btn>
					</v-flex>
					<v-flex xs6>
						<v-btn block @click="dialog = !dialog">close </v-btn>
					</v-flex>
				</v-layout>
			</v-container>
		</v-card>
	</v-dialog>

	<v-dialog v-model="editDialog" max-width="500px">
		<v-card>
			<v-card-title>
				Edit Trainer
			</v-card-title>
			<v-container grid-list-md justify-center align-center align-content-center>
				<v-layout row wrap align-center justify-center>
					<v-flex xs12>
						<v-img
						:src="trainer.image"
						width="200px"
						height="200px"
						contain>
							<div class="changePic">
								<v-btn block dark @click="selectImageUodate">Change Picture</v-btn>
								<div class="inputF">
								<input type="file" v-on:change="onFileChangeUpdate" class="form-control" ref="updateImage">
								</div>
							</div>
						</v-img>
					</v-flex>
					<v-flex xs12>
						<v-text-field
						label="Trainer Name"
						v-model="trainer.name"
						solo></v-text-field>
					</v-flex>
					<v-flex xs12>
						<v-text-field
						label="Trainer Description"
						v-model="trainer.des"
						solo></v-text-field>
					</v-flex>
					<v-flex xs12>
						<v-card>
							<v-card-title class="grey lighten-3 font-weight-black">
								Add Degree Or experience
								<v-spacer></v-spacer>
								<v-btn class="blue" dark fab small @click="() => {
									trainer.trainers_degrees.push({text:'',new:true});
								}">+</v-btn>
							</v-card-title>	
							<v-layout row wrap v-for="(d,index) in trainer.trainers_degrees" :key="index">
								<v-flex xs10 >
									<v-text-field 
									label="Degree or experince Details"
									v-model="d.text"
									solo></v-text-field>
								</v-flex>
								<v-flex xs2>
									<v-btn dark icon class="red" @click="destroyDegree(d.id,index,d.new)">X</v-btn>
								</v-flex>
							</v-layout>
						</v-card>
						
					</v-flex>
					<v-flex xs6>
						<v-btn class="success" block @click="update">
							update
						</v-btn>
					</v-flex>
					<v-flex xs6>
						<v-btn block @click="editDialog = !editDialog">close </v-btn>
					</v-flex>
				</v-layout>
			</v-container>
		</v-card>
	</v-dialog>
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
		        trainers:[],
		        trainer:{},
		        dialog:false,
		        degrees:[],
		        editDialog:false
			}
		},
		methods:{
			selectImage() {
				const vm = this;
				vm.$refs.image.click();
			},
			onFileChange(e) {
		    	let files = e.target.files || e.dataTransfer.files;
		        if (!files.length)
		          return;
		        this.createImage(files[0]);
		    },
		    createImage(file) {
	         let reader = new FileReader();
	          let vm = this;
	          reader.onload = (e) => {
	              vm.trainer.image = e.target.result;
	          };
	          reader.readAsDataURL(file);
	       },
	       store() {
	       	const vm = this;
	       	axios.post('/admin/trainers/store',{trainer:vm.trainer,degrees:vm.degrees,image:vm.trainer.image}).then(response => {
	       		vm.trainers.push(response.data);
	       		vm.dialog = !vm.dialog;
	       		vm.trainer = {};
	       	}).catch(err => {
	       		console.log(err)
	       	});
	       },
	       install() {
	       	const vm = this;
	       	axios.get('/admin/trainers/index').then(response => {
	       		vm.trainers = response.data;
	       	}).catch(err => {
	       		console.log(err)
	       	});
	       },
	       selectImageUodate() {
	       	const vm = this;
	       	vm.$refs.updateImage.click();
	       },
	       onFileChangeUpdate(e) {
		    	let files = e.target.files || e.dataTransfer.files;
		        if (!files.length)
		          return;
		        this.createImageUpdate(files[0]);
		    },
		    createImageUpdate(file) {
	         let reader = new FileReader();
	          let vm = this;
	          reader.onload = (e) => {
	              vm.updateImage(e.target.result);
	          };
	          reader.readAsDataURL(file);
	       },
	       updateImage(e) {
	       	const vm = this;
	       	axios.post('/admin/trainers/updateImage/' + vm.trainer.id ,{image:e}).then(response => {
	       		vm.trainer.image = response.data.image;
	       	}).catch(err => {
	       		console.log(err);
	       	});
	       },
	       update() {
	       	const vm = this;
	       	axios.post('admin/trainers/update/' + vm.trainer.id,vm.trainer).then(response => {
	       		vm.editDialog = !vm.editDialog;
	       		vm.trainer = {};
	       	}).catch(err => {
	       		console.log(err)
	       	});
	       },
	       destroy(item) {
	       	const vm = this;
	       	var index = vm.trainers.indexOf(item);
	       	confirm('Do you want delete ?') && axios.get('admin/trainers/destroy/' + item.id).then(response => {
	       		vm.trainers.splice(index,1);
	       	}).catch(err => {
	       		console.log(err)
	       	});
	       },
	       destroyDegree(id,index,isNew) {
	       	const vm = this;
	       	var index = index;
	       	if(isNew) {
	       		vm.trainer.trainers_degrees.splice(index,1);
	       	}else {
		       	axios.get('admin/trainers/destroyDegree/' + id).then(response => {
		       		vm.trainer.trainers_degrees.splice(index,1);
		       	}).catch(err => {
		       		console.log(err)
		       	});	
	       	}
	       	
	       },
	       destroyCreateDegree(index) {
	       	const vm = this;
	       	vm.degrees.splice(index,1);
	       }
		},
		created() {
			const vm = this;
			vm.install();
		}
	}
</script>
<style scoped>
    .inputF {
        position: fixed;
        left: -99999px;
    }
    .changePic{
    	position: absolute;
    	bottom: 0px;
    	left: 0px;
    	width: 100%;
    }
</style>
