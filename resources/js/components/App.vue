<script setup>

</script>

<template>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <RouterLink class="nav-link" :to="{ name: 'home' }" :class="{ 'active': $route.name === 'home' }">Quotes</RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink class="nav-link" :to="{ name: 'add-quote' }" :class="{ 'active': $route.name === 'add-quote' }">Add Quote</RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink class="nav-link" :to="{ name: 'about' }" :class="{ 'active': $route.name === 'about' }">About</RouterLink>
                    </li>
                </ul>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-lg-12">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
