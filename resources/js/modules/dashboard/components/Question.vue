<template>
    <div class="row mb-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong class="float-left">{{questionHeader}}</strong>
                    <button
                        v-if="$root.isClient"
                        @click="$emit('delete')"
                        class="btn btn-danger btn-sm float-right">
                        Удалить
                    </button>
                </div>
                <div class="card-body">
                    <span>{{question.message}}</span>
                    <ul class="mt-2 bg-light" v-if="question.attachments.length > 0">
                        <strong>Прикрепления</strong>
                        <li v-for="file in question.attachments">
                            <a :href="'attachment/' + file.id" target="_blank">{{file.filename}}</a>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <div v-show="!showNewAnswerForm">
                        <ul v-if="question.answers.length > 0">
                            <li v-for="(answer, key) in question.answers">
                                <div class="row mb-1">
                                    <div class="col-10">
                                        <span class="text-muted float left">{{answer.message}}</span>
                                    </div>
                                    <div class="col-2">
                                        <button
                                            v-if="$root.isManager"
                                            @click="deleteAnswer([index, key, answer.id])"
                                            class="btn btn-sm btn-danger float-right">Удалить</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <span v-else class="text-small text-muted float-left">Нет ответов</span>

                        <button v-if="$root.isManager"
                                @click="showNewAnswerForm = true"
                                class="btn btn-sm btn-primary float-right">Добавить ответ</button>
                    </div>
                    <new-answer
                            @submit="showNewAnswerForm = false"
                            :question="question"
                            :index="index"
                            v-show="showNewAnswerForm"></new-answer>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import newAnswer from './NewAnswer.vue'
    import { mapActions } from 'vuex'
    export default {
        name: "Question",
        props: {
            question: Object,
            index: Number
        },
        components: {
            newAnswer
        },
        data(){
            return {
                showNewAnswerForm: false
            }
        },
        methods: {
            ...mapActions('question', ['deleteAnswer'])
        },
        computed: {
            questionHeader(){
                return this.$root.isClient ?
                `#${ this.question.id }: ${this.question.title}` :
                `#${this.question.id}: ${this.question.title}, ${this.question.user.name}, ${this.question.user.email}, ${this.question.created_at}`;
            }
        }
    }
</script>
