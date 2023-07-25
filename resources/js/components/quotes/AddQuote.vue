<script setup>
import axios from "axios";
import API_URL from "../../config/config.js";
import { ref, onMounted } from "vue";
import { useRouter } from 'vue-router';

axios.defaults.baseURL = API_URL

const addQuotes = ref(false)
const errors = ref('')
const quoteCreated = ref(false)
const form = ref({
    text: '',
    author: '',
})
const router = useRouter()

const storeQuote = async (data) => {
    try {
        if('' === data.author.trim()) {
            data.author = 'Unknown'
        }
        await axios.post("quotes", data)
        quoteCreated.value = true
        form.value.text = ''
        form.value.author = ''
        if(!addQuotes.value) {
            await router.push({ name: 'home'})
        }
    }
    catch(error) {
        if(422 === error.response.status) {
            errors.value = error.response.data.errors
        }
    }
}

const updateQuoteStatus = () => {
    quoteCreated.value = false
}
</script>

<template>
<RouterLink :to="{name: 'home'}" class="btn btn-default">&larr; Back to all quotes</RouterLink>
<h1>Add Quote</h1>
    <br />
    <div v-if="quoteCreated" class="alert alert-success alert-dismissible fade show" role="alert">
        Quote added successfully.
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
    <form @submit.prevent="storeQuote(form)">
        <div class="mb-3">
            <label class="form-label">Quote</label>
            <textarea name="text" class="form-control" rows="4" v-model="form.text"></textarea>
            <div class="form-text">Quote should be between 10 and 500 characters</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" v-model="form.author" class="form-control">
            <div class="form-text">If left blank the author name will be "Unknown". Otherwise the author name should be between 3 and 50 characters.</div>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" :checked="addQuotes" @click="addQuotes = !addQuotes">
            <label class="form-check-label">Keep adding quotes</label>
            <div class="form-text">Default action after quote is added is redirection to home page where all quotes are listed. If this is checked, when quote is added you will stay on this page to keep adding quotes.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<style scoped>

</style>
