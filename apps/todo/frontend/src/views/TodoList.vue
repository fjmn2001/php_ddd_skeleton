<template>
    <div class="home">
        <form class="form" @submit.prevent="addTodo">
            <div>
                <label>Id</label>
                <input type="text" name="id" required="" v-model="todoId">
            </div>
            <div>
                <label>Name</label>
                <input type="text" name="name" required="" v-model="todoName">
            </div>
            <div>
                <button type="submit">Add</button>
            </div>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="todo in todoList" :key="todo.id">
                <td v-html="todo.id"></td>
                <td v-html="todo.name"></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts">
import axios from 'axios';
import {Component, Vue} from 'vue-property-decorator';

@Component
export default class TodoList extends Vue {
    todoId = '';
    todoName = '';
    todoList: Array<object> = [];

    addTodo() {
        const todo = {
            id: this.todoId,
            name: this.todoName
        };
        this.todoList.push(todo);
        this.todoId = '';
        this.todoName = '';

        axios.defaults.headers.common["Host"] = "http://localhost:8080";
        axios({
            headers: {
                // Overwrite Axios's automatically set Content-Type
                'Content-Type': 'application/json'
            },
            method: 'post',
            url: 'http://localhost:8091/tasks',
            data: todo
        });
        //axios.post('http://localhost:8091/tasks', todo).catch((error) => console.log(error));
    }

    removeTodo(index: number) {
        this.todoList.splice(index, 1);
    }
}
</script>
