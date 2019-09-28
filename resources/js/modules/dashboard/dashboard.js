require('../../bootstrap');

window.Vue = require('vue');

import ru from 'vee-validate/dist/locale/ru';
import VeeValidate, { Validator } from 'vee-validate';

// Install the Plugin.
Vue.use(VeeValidate);

// Localize takes the locale object as the second argument (optional) and merges it.
Validator.localize('ru', ru);

Vue.component('questions-list', require('./components/QuestionsList.vue').default);

import store from '../../store'
import { mapGetters, mapState, mapActions, mapMutations } from 'vuex'

const app = new Vue({
    el: '#home',
    store,
    computed: {
        ...mapState('user', {
            'user': state => state.user
        }),
        ...mapState('question', {
            'questions': state => state.questions,
            'loading': state => state.loading
        }),
        ...mapGetters('user', [
            'isManager',
            'isClient'
        ]),
        dashboardHeader(){
            return `Заявки ${this.isManager ? 'Менеджера' : 'Клиента'}`;
        }
    },
    methods: {
        ...mapMutations('user', [
            'setUser'
        ]),
        ...mapActions('question', [
            'getQuestions'
        ])
    },
    created(){
        this.setUser(window.user);
        this.getQuestions(this.isManager)
    }
});
