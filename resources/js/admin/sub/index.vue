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
			      :items="pays"
			      :search="search"
			    >
			      <template slot="items" slot-scope="props">
			        <td class="text-xs-left">{{ props.item.id }}</td>
			        <td class="text-xs-left">{{ props.item.user.name }}</td>
			        <td class="text-xs-left">{{ props.item.user.email }}</td>
			        <td class="text-xs-left">{{ props.item.user.phone }}</td>
              <td class="text-xs-left">{{ props.item.course.title }}</td>
              <td class="text-xs-left">
                <div class="green--text" v-if="props.item.state">
                  approve
                </div>
                <div class="blue--text" v-if="!props.item.state">
                  pinding
                </div>
              </td>
			        <td class="text-xs-left"><v-btn icon @click="() => {
                show = !show;
                pay = props.item;
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
        <v-container grid-list-md>
          <v-layout row wrap>
            <v-flex xs12 md12>
              <v-card>
                <v-card-title class="blue white--text font-weight-black">
                  User Details
                </v-card-title>
                <v-container grid-list-md>
                   <v-layout row wrap>
                    <v-flex xs6 md6 >
                    <span class="font-weight-black">ID:</span>{{pay.user.id}}
                    </v-flex>
                    <v-flex xs6 md6 >
                    <span class="font-weight-black">User Name :</span>{{pay.user.name}}
                    </v-flex>
                    <v-flex md6>
                      <span class="font-weight-black">Phone Number :</span>{{pay.user.phone}}
                    </v-flex>
                    <v-flex md6>
                      <span class="font-weight-black">Email :</span>{{pay.user.phone}}
                    </v-flex>
                  </v-layout> 
                </v-container>
              </v-card>
            </v-flex>
            <v-flex xs12 md12>
              <v-card>
               <v-card-title class="blue white--text font-weight-black">
                 Course & payment Info
                </v-card-title>
                <v-container grid-list-md>
                  <v-layout row wrap>
                    <v-flex xs6 md6>
                      <span class="font-weight-black">Course Name: </span> {{pay.course.title}}
                    </v-flex>
                    <v-flex xs6 md6>
                      <span class="font-weight-black">Payment Type: </span> {{pay.pay_type}}
                    </v-flex>
                  </v-layout>
                </v-container> 
              </v-card>
            </v-flex>
            <v-flex xs12>
              <v-card>
                <v-card-title class="blue white--text font-weight-black">
                  Bank Pay Details
                </v-card-title>
                <v-container grid-list-nd>
                  <v-layout row wrap>
                    <v-flex xs6 md6>
                      <span class="font-weight-black">Country Name : </span> {{pay.pay_banks.country}}
                    </v-flex>
                    <v-flex xs6 md6>
                      <span class="font-weight-black">Full Name : </span> {{pay.pay_banks.fullName}}
                    </v-flex>
                    <v-flex xs6 md6>
                      <span class="font-weight-black">Account Number : </span> {{pay.pay_banks.account_number}}
                    </v-flex>
                    <v-flex xs6 md6>
                      <span class="font-weight-black">Bank Name : </span> {{pay.pay_banks.bank_name}}
                    </v-flex>
                    <v-flex xs12 md12>
                      <span class="font-weight-black">Note : </span> {{pay.pay_banks.note}}
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-card>
            </v-flex>
            <v-flex xs12 md12 v-if="!pay.state">
              <v-container grid-list-md>
                <v-layout row wrap>
                  <v-flex xs6 md6>
                    <v-btn class="success " block @click="approve">
                      Approve
                    </v-btn>
                  </v-flex>
                  <v-flex xs6 md6>
                    <v-btn dark block @click="() => {
                      show = !show;
                      pay = {};
                    }">
                      close
                    </v-btn>
                  </v-flex>
                </v-layout>
              </v-container>
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
            text: 'User Name',
            align: 'left',
            sortable: false,
            value: 'name'
          },
          {
            text: 'User Email',
            align: 'left',
            sortable: false,
            value: 'email'
          },
          {
            text: 'user Phone Number',
            align: 'left',
            sortable: false,
            value: 'phone'
          },
          {
            text: 'Course Name',
            align: 'left',
            sortable: false,
            value: 'course'
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
        pays: [
       
        ],
        show:false,
        pay:{}
      }
    },
    created() {
      const vm = this;
      vm.install();
    },
    methods:{
      install() {
        const vm = this;
        axios.get('admin/pay/index').then(response => {
          vm.pays = response.data;
        }).catch(err => {
          console.log(err)
        });
      },
      approve() {
        const vm = this;
        axios.get('admin/pay/approve/' + vm.pay.id).then(response => {
          location.reload();
        }).catch(err => {
          console.log(err)
        });
      }
    }
  }
</script>