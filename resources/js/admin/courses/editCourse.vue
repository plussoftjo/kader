<template>
	<div class="newCourse" v-if="show">
		<v-container grid-list-md>
			<v-layout row wrap>
				<v-flex xs8>
					<v-card>
						<v-card-title class="blue lighten-2 white--text font-weight-black">
							Stander Info
						</v-card-title>
						<v-container grid-list-md>
							<v-layout row wrap>
								<v-flex xs12> 
									<v-text-field
									label="Title of Course"
									v-model="course.title"
									solo></v-text-field>
								</v-flex>
								<v-flex xs12>
									<v-textarea
									label="Little Description About Corse"
									solo
									v-model="course.litleDes"></v-textarea>
								</v-flex>
								<v-flex xs12>
									<v-text-field
									label="Price"
									solo
									v-model="course.price"></v-text-field>
								</v-flex>
								<v-flex xs12>
									<v-text-field
									label="Duration of the course"
									v-model="course.loop"
									solo></v-text-field>
								</v-flex>
								<v-flex xs12>
									<v-select
									:items="catgs"
									item-text="name"
									item-value="id"
									solo
									label="Catgoraes"
									v-model="course.catg_id"></v-select>
								</v-flex>
								<v-flex xs12>
									<v-textarea 
									label="Full Description of the course"
									solo
									v-model="course.fullDes"
									></v-textarea>
								</v-flex>
							</v-layout>	
						</v-container>
					</v-card>
				</v-flex>
				<v-flex xs4>
					<v-card>
						<v-card-title  class="blue lighten-2 white--text font-weight-black">
							Media
						</v-card-title>
						<v-card>
							<v-img
							:src="course.image"
							height="200px"
							contain></v-img>
							<v-btn dark block @click="selectImage">Change Picture</v-btn>
							<div class="inputF">
							<input type="file" v-on:change="onFileChange" class="form-control" ref="image">
							</div>
						</v-card>
					</v-card>
				</v-flex>
			</v-layout>
			<!-- Trainer Details -->
			<v-layout row wrap>
				<v-flex xs12>
					<v-card>
						<v-card-title class="blue lighten-2 white--text font-weight-black">
							Trainers Info
						</v-card-title>
						<v-container grid-list-md>
							<v-layout row wrap>
								<v-flex xs12>
									<v-select
									:items="trainers"
									label="Trainer"
									v-model="course.trainers_id"
									solo
									item-text="name"
									item-value="id"></v-select>
								</v-flex>
							</v-layout>	
						</v-container>
					</v-card>
				</v-flex>
			</v-layout>


			<!-- Sections -->
			<v-layout row wrap>
				<v-flex xs12>
					<v-card>
						<v-card-title class="blue lighten-2 white--text font-weight-black">
							Course Sections
							<v-spacer></v-spacer>
							<v-btn class="blue" dark icon @click="() => {
								course.course_sections.push({title:'',isNew:true});
							}">+</v-btn>
						</v-card-title>
						<v-container grid-list-md>
							<v-layout row wrap v-for="(s,index) in course.course_sections" :key="index">
								<v-flex xs10>
									<v-text-field
									v-model="s.title"
									solo
									label="Section Title"></v-text-field>
								</v-flex>
								<v-flex xs2>
									<v-btn class="red" icon dark @click="destroySection(s,index)">X</v-btn>
								</v-flex>
							</v-layout>
						</v-container> 
					</v-card>
				</v-flex>
			</v-layout>


			<!-- requirements -->
			<v-layout row wrap>
				<v-flex xs12>
					<v-card>
						<v-card-title class="blue lighten-2 white--text font-weight-black">
							requirements
							<v-spacer></v-spacer>
							<v-btn class="blue" dark icon @click="() => {
								course.course_reqs.push({title:'',isNew:true});
							}">+</v-btn>
						</v-card-title>
						<v-container grid-list-md>
							<v-layout row wrap v-for="(r,index) in course.course_reqs" :key="index">
								<v-flex xs10>
									<v-text-field
									v-model="r.title"
									solo
									label="requirement Title"></v-text-field>
								</v-flex>
								<v-flex xs2>
									<v-btn class="red" icon dark @click="destroyReq(r,index)">X</v-btn>
								</v-flex>
							</v-layout>
						</v-container> 
					</v-card>
				</v-flex>
			</v-layout>

			<!-- SAVE Section  -->
			<v-layout row wrap>
				<v-flex xs12>
					<v-card>
						<v-card-title class="blue lighten-2 white--text font-weight-black">
							Save 
						</v-card-title>
						<v-container grid-list-md>
							<v-layout row wrap>
								<v-flex xs6>
									<v-btn class="success" block @click="update">
										Update
									</v-btn>
								</v-flex>
								<v-flex xs6>
									<v-btn dark block>cancel</v-btn>
								</v-flex>
							</v-layout>	
						</v-container>
					</v-card>
				</v-flex>
			</v-layout>
		</v-container>
	</div>
</template>
<script>
	export default {
		data() {
			return {
				course:{image:'images/image.png',reqs:[],sections:[]},
				trainers:[],
				show:false,
				catgs:[]
			}
		},
		methods:{
			install() {
				const vm = this;
				// Get trainers 
				axios.get('admin/trainers/index').then(response => {
					vm.trainers = response.data;
				}).catch(err => {
					console.log(err)
				});
				axios.get('admin/catg/index').then(response => {
					vm.catgs = response.data;
				}).catch(err => {
					console.log(err);
				});
				axios.get('admin/course/show/' + vm.$route.params.id).then(response => {
					vm.course = response.data;
					vm.show = true;
				}).catch(err => {
					console.log(err)
				});


			},
			update() {
				const vm = this;
				axios.post('admin/course/update/' + vm.$route.params.id,vm.course).then(response => {
					// vm.$router.push({name:'courses'});
				}).catch(err => {
					console.log(err);
				});
			},
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
	             vm.updateImage(e.target.result);
	          };
	          reader.readAsDataURL(file);
	       },
	       updateImage(e) {
	       	const vm = this;
	       	axios.post('admin/course/updateImage/' + vm.$route.params.id,{image:e}).then(response => {
	       		vm.course.image = response.data.image;
	       	}).catch(err => {
	       		console.log(err)
	       	});
	       },
	       destroyReq(r,index) {
	       	const vm = this;
	       	var index = index;
	       	if(r.isNew){
	       		vm.course.course_reqs.splice(index,1);
	       	}else {
	       		axios.get('admin/course/destroyReq/' + r.id).then(response => {
	       			vm.course.course_reqs.splice(index,1);
	       		}).catch(err => {
	       			console.log(err)
	       		});
	       	}
	       },
	       destroySection(s,index) {
	       	const vm = this;
	       	var index = index;
	       	if(s.isNew){
	       		vm.course.course_sections.splice(index,1);
	       	}else {
	       		axios.get('admin/course/destroySection/' + s.id).then(response => {
	       			vm.course.course_sections.splice(index,1);
	       		}).catch(err => {
	       			console.log(err)
	       		});
	       	}
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
