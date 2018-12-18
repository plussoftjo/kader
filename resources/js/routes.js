import index from './components/main/index'
import reg from './components/reg/index'
import login from './components/login/index'
import catgs from './components/catgs/index'
import course from './components/course/index'

export const routes = [
{path:'/',name:'index',component:index},
{path:'/reg',name:'reg',component:reg},
{path:'/login',name:'login',component:login},
{path:'/catgs',name:'catgs',component:catgs},
{path:'/course',name:'course',component:course},
]