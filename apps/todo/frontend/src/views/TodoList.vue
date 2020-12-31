<template>
    <div class="home">
        <form class="form" @submit.prevent="addTodo">
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
import {v4 as uuidv4} from 'uuid';
import {Component, Vue} from 'vue-property-decorator';

@Component
export default class TodoList extends Vue {
    todoName = '';
    todoList: Array<object> = [];

    mounted() {
        axios.get('http://localhost:8091/tasks').then((response) => {
            this.todoList = response.data;
        });
    }

    addTodo() {
        const todo = {
            id: uuidv4(),
            name: this.todoName
        };
        this.todoList.push(todo);
        this.todoName = '';

        axios.post('http://localhost:8091/tasks', todo).catch((error) => console.log(error));
    }

    removeTodo(index: number) {
        this.todoList.splice(index, 1);
    }
}
</script>
