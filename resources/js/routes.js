import Home from './components/Home';
import TodoList from './components/Todo/TodoList';
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
            }
    ]
}