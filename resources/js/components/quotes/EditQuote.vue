<script setup>
import axios from "axios";
import API_URL from "../../config/config.js";
import { ref, onMounted } from "vue";
import { useRouter, useRoute } from 'vue-router';

axios.defaults.baseURL = API_URL

const route = useRoute()
const router = useRouter()
const quoteId = ref(0)
const quote = ref([])
const errors = ref('')
const quoteUpdated = ref(false)

const getQuote = async (id) => {
    try {
        const response = await axios.get(`quotes/${id}`)
        quote.value = response.data.data
    }
    catch(error) {
        await router.push({name: 'home'})
    }
}

const updateQuote = async (id) => {
    try {
        if('' === quote.value.author.trim()) {
            quote.value.author = 'Unknown'
        }
        await axios.put(`quotes/${id}`, quote.value)
        quoteUpdated.value = true
    }
    catch(error) {
        if(422 === error.response.status) {
            errors.value = error.response.data.errors
        }
    }
}

const updateQuoteStatus = () => {
    quoteUpdated.value = false
}

onMounted(() => {
    quoteId.value = parseInt(route.params.id)
    getQuote(quoteId.value)
})
</script>

<template>
<RouterLink :to="{name: 'home'}" class="btn btn-default">&larr; Back to all quotes</RouterLink>
<h1>Edit Quote</h1>
    <br />
    <div v-if="quoteUpdated" class="alert alert-success alert-dismissible fade show" role="alert">
        Quote updated successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" @click="updateQuoteStatus"></button>
    </div>
    <div v-if="errors != ''" class="alert alert-danger alert-dismissable fade show" role="alert">
        Quote not updated. There were some errors.
        <ul>
            <li v-if="errors.text">{{errors.text[0]}}</li>
            <li v-if="errors.author">{{errors.author[0]}}</li>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" @click="updateQuoteStatus"></button>
    </div>
    <form @submit.prevent="updateQuote($route.params.id)">
        <div class="mb-3">
            <label class="form-label">Quote</label>
            <textarea name="text" class="form-control" rows="4" v-model="quote.text">{{ quote.text }}</textarea>
            <div class="form-text">Quote should be between 10 and 500 characters</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control" v-model="quote.author">
            <div class="form-text">If left blank the author name will be "Unknown". Otherwise the author name should be between 3 and 50 characters.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<style scoped>

</style>
