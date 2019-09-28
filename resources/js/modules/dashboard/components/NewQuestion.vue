<template>
    <div class="container">
        <div class="col-md-12">
            <div class="form-group row">
                <label for="title">Тема</label>

                <input id="title" class="form-control"
                       v-model="question.title"
                       v-validate="'required'"
                       data-vv-as="тема"
                       name="title">
                <p class="text-danger text-small">{{ errors.first('title') }}</p>
            </div>
            <div class="form-group row">
                <label for="message">Сообщение</label>

                <textarea id="message" class="form-control"
                          v-validate="'required'" data-vv-as="сообщение"
                          v-model="question.message" name="message"/>

                <p class="text-danger text-small">{{ errors.first('message') }}</p>
            </div>
            <div class="form-group">
                <div class="col-md-10 offset-md-2">
                    <button class="btn btn-small btn-primary float-left"
                            @click="submit()">
                        Сохранить
                    </button>
                    <button class="btn btn-small btn-danger float-right"
                            @click="$emit('cancel')">
                        Отмена
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState, mapActions } from 'vuex'
    export default {
        name: "NewQuestion",
        computed: {
            ...mapState('question', {
                'question': state => state.newQuestion,
            }),
        },
        methods: {
            submit(){
                this.$validator.validateAll()
                    .then((result) => {
                        if (result) {
                            this.$emit('submit')
                        }
                    })
            }
        }
    }
</script>
