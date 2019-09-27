<template>
    <div class="container">
        <div class="col-md-12">
            <div class="card-body">
                <div class="form-group row">
                    <label for="message">Ответ</label>

                    <textarea id="message" class="form-control"
                              v-model="answer.message" name="message"/>

                </div>
                <div class="form-group">
                    <div class="col-md-10 offset-md-2">
                        <button class="btn btn-sm btn-primary float-left"
                                @click="submit()">
                            Сохранить
                        </button>
                        <button class="btn btn-sm btn-danger float-right"
                                @click="cancel()">
                            Отмена
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState, mapActions } from 'vuex'
    export default {
        name: "NewAnswer",
        props: {
            question: Object,
            index: Number
        },
        computed: {
            ...mapState('question', {
                'answer': state => state.newAnswer,
            }),
            ...mapState('user', {
                'user': state => state.user,
            }),
        },
        methods: {
            ...mapActions('question', [
                'saveNewAnswer'
            ]),
            submit(){
                this.answer.user_id  = this.user.id;
                this.answer.question_id = this.question.id;
                this.saveNewAnswer(this.index)
                this.$emit('submit')
            },
            cancel(){

            }
        }
    }
</script>
