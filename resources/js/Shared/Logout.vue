<template>
    <div>
        <form @submit.prevent="handleLogout">
            <button class="btn btn-danger">
                DECONNEXION
            </button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Logout",
        methods: {
            handleLogout(){
                this.$inertia.post('/logout')
            }
        }
    }
</script>

<style scoped>

</style>
