<template>
<div v-if="viewType == 'detail'" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                    <h1 :book-title="test"></h1>
                    </div>

                    <div class="card-body">
                    {{ bookDetail }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div v-else-if="viewType == 'list'" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                    <h1>{{ title }}</h1>
                    </div>

                    <div class="card-body">
                    <h2>{{ bookTitle }}</h2>
                    <ul>
                        <li v-for="list in bookContent">
                            {{ list.text }}
                            </li>
                    </ul>
                    {{ bookDetail }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            viewType: String,
        bookTitle: String,
        bookDetail: String,
        bookContent: Array,
        title: String
        }
    }
</script>
