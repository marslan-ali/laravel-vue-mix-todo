import Home from './components/Home';
import TodoList from './components/Todo/TodoList';
import Edit from './components/Todo/Edit';

export default {
    mode: 'history',
    linkActiveClass: 'font-bold',
    routes: [
            {
                path: '/',
                component: Home
            },
            {
                path : '/todo-list',
                component : TodoList
            },
            { path:'/edit-item/:itemid', component: Edit }
    ]
}