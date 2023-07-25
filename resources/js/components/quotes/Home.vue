<script setup>
import axios from "axios";
import API_URL from "../../config/config.js";
import { ref, onMounted } from "vue";

axios.defaults.baseURL = API_URL

let quotes = ref([])
const showDates = ref(true)
const showSettings = ref(true)
const searchQuotesByText = ref('')
const searchQuotesByAuthor = ref('')
const sortQuotes = ref(null)
const originalQuotesOrder = ref([])

// get all quotes
const getQuotes = async() => {
    const response = await axios.get('quotes')
    quotes.value = response.data.data
    originalQuotesOrder.value = response.data.data
}

// reset settings as they were on page load
const resetSettings = () => {
    showDates.value = true
    searchQuotesByText.value = ''
    searchQuotesByAuthor.value = ''
    sortQuotes.value = null
    quotes.value = originalQuotesOrder.value
}

// search quotes by text
const handleTextSearch = _.debounce(() => {
    if('' === searchQuotesByText.value) {
       quotes.value = originalQuotesOrder.value
    } else {
       quotes.value = quotes.value.filter(quote => quote.text.toLowerCase().includes(searchQuotesByText.value.toLowerCase()))
    }
}, 300)

// search quotes by author name
const handleAuthorSearch = _.debounce(() => {
    if('' === searchQuotesByAuthor.value) {
        quotes.value = originalQuotesOrder.value
    } else {
        quotes.value = quotes.value.filter(quote => quote.author.toLowerCase().includes(searchQuotesByAuthor.value.toLowerCase()))
    }
}, 300)

// sort quotes by authors name asc/desc
const sortByAuthors = (method) => {
    quotes.value = _.orderBy(quotes.value, ['author'], [method])
}

// sort quotes by date from newest to oldest or oldest to newest
const sortByDate = (method) => {
    if('asc' === method) {
        quotes.value = _.orderBy(quotes.value, [(quote) => new Date(quote.date_added)]);
    }
    else if('desc' === method) {
        quotes.value = _.reverse(_.sortBy(quotes.value, [(quote) => new Date(quote.date_added)]));
    }
}

// delete quote
const deleteQuote = async (id) => {
    if(window.confirm("Are you sure you want to delete the quote?")) {
        await axios.delete(`quotes/${id}`)
        await getQuotes()
    }
}

onMounted(() => getQuotes())
</script>

<template>
    <h1>Quotes</h1><br />
    <button type="button" class="btn btn-success" @click="showSettings = !showSettings">Show / Hide Settings</button><br /><br />
    <div style="background: #E0E0E0; padding: 10px;" class="mb-2" v-if="showSettings">
        <button type="button" class="btn btn-info" @click="resetSettings">Reset</button><br /><br />
    <input type="checkbox" :checked="showDates" @click="showDates = !showDates" /> Show  <em>Date Added</em> in the table<br /><br />
    Search quotes by quote text: <input type="text" class="form-control" v-model="searchQuotesByText" @input="handleTextSearch" />
    Search quotes by author name: <input type="text" class="form-control" v-model="searchQuotesByAuthor" @input="handleAuthorSearch" />
    <br />
    <input type="radio" name="sort_quotes" value="author_asc" v-model="sortQuotes" @click="sortByAuthors('asc')" /> Sort quotes by author (first) name in ascending order<br />
    <input type="radio" name="sort_quotes" value="author_desc" v-model="sortQuotes" @click="sortByAuthors('desc')" /> Sort quotes by author (first) name in descending order
        <div v-if="showDates">
            <hr/>
        <input type="radio" name="sort_quotes" value="date_desc" v-model="sortQuotes" @click="sortByDate('desc')" /> Sort quotes by date (newest to oldest)<br />
        <input type="radio" name="sort_quotes" value="date_asc" v-model="sortQuotes" @click="sortByDate('asc')" /> Sort quotes by date (oldest to newest)
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr class="table-primary">
                <th>Quote</th>
                <th>Author</th>
                <th v-if="showDates">Date Added</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-if="quotes.length > 0" v-for="quote in quotes" :key="quote.id">
                <td>{{ quote.text }}</td>
                <td>{{ quote.author }}</td>
                <td v-if="showDates">{{ quote.date_added }}</td>
                <td><RouterLink :to="{ name: 'edit-quote', params: { id: quote.id } }" class="btn btn-primary">Edit</RouterLink> <button type="button" class="btn btn-danger" @click="deleteQuote(quote.id)">Delete</button></td>
            </tr>
            <tr v-else>
                <td colspan="4"><h3>There are no quotes in the system or the search you performed didn't find any quotes.<br /><RouterLink :to="{ name: 'add-quote' }">Add a quote.</RouterLink></h3></td>
            </tr>
        </tbody>
    </table>
</template>

<style scoped>

</style>
