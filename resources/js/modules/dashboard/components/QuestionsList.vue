<template>
    <div>
<!--        <transition-group name="component-fade"-->
<!--                          mode="out-in">-->
            <div v-show="loading" key="loading">
                <h2>loading...</h2>
            </div>
            <transition-group v-show="!loading" tag="div"
                              name="list" key="list">
                <question
                    v-for="(question, index) in questions"
                    :question="question"
                    @delete="deleteQuestion(index)"
                    :key="`question${index}`">
                </question>
            </transition-group>

            <button class="btn btn-primary"
                    key="refreshBtn"
                    v-show="isClient && !showNewQuestionForm"
                    :disabled="!allowAddQuestion"
                    @click="showNewQuestionForm = true">
                Новая заявка
            </button>

            <new-question
                key="newMessage"
                @submit="submitForm"
                @cancel="cancelForm"
                v-show="showNewQuestionForm">
            </new-question>
<!--        </transition-group>-->
    </div>
</template>

<script>
    import { mapState, mapActions, mapGetters, mapMutations } from 'vuex'
    import question from './Question.vue'
    import newQuestion from './NewQuestion.vue'
    export default {
        name: "QuestionsList",
        computed: {
            ...mapState('question', {
                'questions': state => state.questions,
                'newQuestion': state => state.newQuestion,
                'loading': state => state.loading
            }),
            ...mapGetters('user', [
                'isManager',
                'isClient'
            ]),
            allowAddQuestion(){
                return this.isClient && this.$root.user.allow_add_question
            }
        },
        methods: {
            ...mapActions('question', [
                'getQuestions',
                'saveNewQuestion',
                'deleteQuestion'
            ]),
            ...mapMutations('question', [
                'clearNewQuestion'
            ]),
            submitForm(){
                this.newQuestion.user_id = this.$root.user.id
                this.saveNewQuestion()
                this.showNewQuestionForm = false
            },
            cancelForm(){
                this.clearNewQuestion()
                this.showNewQuestionForm = false
            }
        },
        data(){
            return {
                showNewQuestionForm: false
            }
        },
        components: {
            question,
            newQuestion
        }
    }
</script>
