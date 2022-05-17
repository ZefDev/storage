<template>
    <table class="table">
        <thead>
        <tr>
            <th class="col">ID</th>
            <th class="col">Name</th>
            <th class="col">Email</th>
            <th class="col">Admin</th>
            <th class="col">Blocked</th>
            <th class="col">Created At</th>
            <th class="col">Options</th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="user in users" :key="user.id">
                <td class="align-middle">{{ user.id }}</td>
                <td>
                    <span class="ml-3"> {{ user.name }} </span>
                </td>
                <td>{{ user.email }}</td>
                <td>
                    <input type="checkbox" :checked="user.isAdmin" @click="setAdmin(user.id)">
                </td>
                <td>
                    <input type="checkbox" :checked="user.isBlock" @click="setBlock(user.id)">
                </td>
                <td>{{ user.created_at }}</td>
                <td>
                    <button @click="deleteUser(user.id)" type="button" class="btn btn-danger">
                        Delete
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</template>
<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
export default {
    props: ['users'],
    methods:{
        deleteUser(id){
            axios.get(`/admin/users/${id}/delete`)
                .then(response=>{
                    this.$emit('updatetable');
                });
        },
        setAdmin(id){
            axios.get(`/admin/users/${id}/set-admin`)
                .then(response=>{
                    this.$emit('updatetable');
                });
        },
        setBlock(id){
            axios.get(`/admin/users/${id}/set-block`)
                .then(response=>{
                    this.$emit('updatetable');
                });
        }
    },
}
</script>
