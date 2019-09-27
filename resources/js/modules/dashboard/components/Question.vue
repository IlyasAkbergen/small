<template>
    <div>
        <h2>{{question.message}}</h2>
    </div>
</template>

<script>
    export default {
        name: "Question",
        props: {
            question: Object
        }
    }
</script>
