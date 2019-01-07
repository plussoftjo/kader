import dashboard from './admin/dashboard/index.vue'
import users from './admin/users/index.vue'
import categories from './admin/categories/index.vue'
import trainers from './admin/trainers/index.vue'
import courses from './admin/courses/index.vue'
import newCourse from './admin/courses/newCourse.vue'
import editCourse from './admin/courses/editCourse.vue'
import sub from './admin/sub/index.vue'
import order_course from './admin/order_course/index.vue'

export const routes = [
{path:'/',name:'dashboard',component:dashboard},
{path:'/users',name:'users',component:users},
{path:'/categories',name:'categories',component:categories},
{path:'/trainers',name:'trainers',component:trainers},
{path:'/courses',name:'courses',component:courses},
{path:'/newCourse',name:'newCourse',component:newCourse},
{path:'/editCourse/:id',name:'editCourse',component:editCourse},
{path:'/sub',name:'Subscribers',component:sub},
{path:'/order_course',name:'order_course',component:order_course},

]