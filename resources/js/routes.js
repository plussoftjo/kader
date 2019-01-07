import index from './components/main/index'
import reg from './components/reg/index'
import login from './components/login/index'
import catgs from './components/catgs/index'
import course from './components/course/index'
import thankyou from './components/reg/thankyou'
import course_sub from './components/course_sub/index'
import order_course from './components/order_course/index'
import sub_thank from './components/course_sub/sub_thank';
import order_thank from './components/order_course/order_thank';

export const routes = [
{path:'/',name:'index',component:index},
{path:'/reg',name:'reg',component:reg},
{path:'/login',name:'login',component:login},
{path:'/catgs',name:'catgs',component:catgs},
{path:'/thankyou',name:'thankyou',component:thankyou},
{path:'/course/:id',name:'course',component:course},
{path:'/course_sub/:id',name:'course_sub',component:course_sub},
{path:'/order_course',name:'order_course',component:order_course},
{path:'/sub_thank',name:'sub_thank',component:sub_thank},
{path:'/order_thank',name:'order_thank',component:order_thank},
]