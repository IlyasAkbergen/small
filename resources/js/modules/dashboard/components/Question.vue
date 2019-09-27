<template>
    <div class="row mb-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong class="float-left">#{{ question.id }}: {{question.title}}</strong>
                    <button
                        v-if="$root.isClient"
                        @click="$emit('delete')"
                        class="btn btn-danger btn-sm float-right">
                        Удалить
                    </button>
                </div>
                <div class="card-body">
                    <span>{{question.message}}</span>
                </div>
            </div>
        </div>
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
