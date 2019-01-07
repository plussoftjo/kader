<template>
	<div class="order_course">
		<v-container>
			<v-card>
			    <v-card-title>
			     Order_course
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
			      :items="frms"
			      :search="search"
			    >
			      <template slot="items" slot-scope="props">
			        <td class="text-xs-left">{{ props.item.id }}</td>
			        <td class="text-xs-left">{{ props.item.full_name}}</td>
			        <td class="text-xs-left">{{ props.item.email }}</td>
			        <td class="text-xs-left">{{ props.item.phone }}</td>
              <td class="text-xs-left">
                <div class="green--text" v-if="props.item.state">
                  Approve
                </div>
                <div class="blue--text" v-if="!props.item.state">
                  Pinding
                </div>
              </td>
			        <td class="text-xs-left"><v-btn icon @click="() => {
                show = !show;
                frm = props.item;
              }"><v-icon class="blue--text">visibility</v-icon></v-btn></td>
			      </template>
			      <v-alert slot="no-results" :value="true" color="error" icon="warning">
			        Your search for "{{ search }}" found no results.
			      </v-alert>
			    </v-data-table>
			  </v-card>
		</v-container> 
    <v-dialog v-model="show" max-width="600px">
      <v-card v-if="show">
        <v-card-title class="blue lighten-1 white--text font-weight-black">
          Pay Details 
        </v-card-title>
 		<v-container grid-list-lg>
 			<v-layout row wrap>
 				<v-flex xs12 md6>
 					<span class="font-weight-black">ID: </span> {{frm.id}}
 				</v-flex>
 				<v-flex md6>
 					<span class="font-weight-black">full Name: </span>{{frm.full_name}}
 				</v-flex>
 				<v-flex md6>
 					<span class="font-weight-black">Email : </span>{{frm.email}}
 				</v-flex>
 				<v-flex md6>
 					<span class="font-weight-black">Phone : </span> {{frm.phone}}
 				</v-flex>
 				<v-flex md6>
 					<span class="font-weight-black">place : </span> {{frm.gender}}
 				</v-flex>
 				<v-flex md6>
 					<span class="font-weight-black">how many pepole want come: </span> {{frm.person_much}}
 				</v-flex>
 				<v-flex md6>
 					<span class="font-weight-black">the field user search for it :</span>{{frm.search}}
 				</v-flex>
 				<v-flex md6>
 					<span class="font-weight-black">Days </span> {{frm.days}} - <span class="font-weight-black">Month </span>{{frm.months}}
 				</v-flex>
 				<v-flex md6>
 					<span class="font-weight-black">trainer nationality : </span> {{frm.nationalty}}
 				</v-flex>
 				<v-flex md6>
 					<span class="font-weight-black">other nationality if has : </span> {{frm.other_n}}
 				</v-flex>
 				<v-flex md6>
 					<span class="font-weight-black">trainer gender : </span> {{frm.fav_gender}}
 				</v-flex>
 				<v-flex md6>
 					<span class="font-weight-black">Online course : </span> {{frm.where_get}}
 				</v-flex>
 				<v-flex md6>
 					<span class="font-weight-black">Budget : </span> {{frm.budget}}
 				</v-flex>
 				<v-flex md6>
 					<span class="font-weight-black">goals : </span> {{frm.goals}}
 				</v-flex>
 				<v-flex md6>
 					<span class="font-weight-black">courses_feed : </span> {{frm.courses_feed}}
 				</v-flex>
 				<v-flex md6></v-flex>
 				<v-flex md6 v-if="!frm.state">
 					<v-btn class="success" block @click="approve">
 						Approve
 					</v-btn>
 				</v-flex>
 				<v-flex md6>
 					<v-btn dark block @click="show = !show">
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
            text: 'Full Name',
            align: 'left',
            sortable: false,
            value: 'name'
          },
          {
            text: 'Email',
            align: 'left',
            sortable: false,
            value: 'email'
          },
          {
            text: 'Phone Number',
            align: 'left',
            sortable: false,
            value: 'phone'
          },
          {
            text: 'State',
            align: 'left',
            sortable: false,
            value: 'state'
          },
          {
            text: 'Show',
            align: 'left',
            sortable: false,
            value: 'show'
          },
        ],
        frms: [
       
        ],
        show:false,
        frm:{}
      }
    },
    created() {
      const vm = this;
      vm.install();
    },
    methods:{
      install() {
        const vm = this;
        axios.get('admin/frm/index').then(response => {
          vm.frms = response.data;
        }).catch(err => {
          console.log(err)
        });
      },
      approve() {
        const vm = this;
        axios.get('admin/frm/approve/' + vm.frm.id).then(response => {
          location.reload();
        }).catch(err => {
          console.log(err)
        });
      }
    }
  }
</script>