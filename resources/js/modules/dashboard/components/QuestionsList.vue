<template>
    <div>
        <transition-group name="fade">
            <div v-show="loading" key="loading">
                <h2>loading...</h2>
            </div>
            <transition-group v-show="!loading" name="component-fade"
                              mode="out-in" key="list">
                <question
                    v-for="(question, index) in questions"
                    :question="question"
                    :key="`question${index}`">
                </question>
            </transition-group>

            <button class="btn btn-primary"
                    key="refreshBtn"
                    :disabled="loading"
                    @click="getQuestions">Обновить</button>
        </transition-group>
    </div>
</template>

<script>
    import { mapState, mapActions } from 'vuex'
    import question from './Question.vue'
    export default {
        name: "QuestionsList",
        computed: {
            ...mapState('question', {
                'questions': state => state.questions,
                'loading': state => state.loading
            }),
        },
        methods: {
            ...mapActions('question', [
                'getQuestions'
            ])
        },
        components: {
            question
        }
    }
</script>
