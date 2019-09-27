import { axiosInstance as axios } from '../../plugins/axios'

export const getQuestions = ({ commit, state }, isManager) => {
    state.loading = true
    let url = isManager ? '/questions' : '/client-questions';
    axios.get(url)
    .then((res) => {
        commit('setQuestions', res.data.questions)
        state.loading = false
    }).catch(() => {
        state.loading = false
    })
};

export const saveNewQuestion = ({ commit, state }) => {
    axios.post('/questions', {'question': state.newQuestion})
        .then((res) => {
            state.newQuestion.id = res.data.id
            commit('addQuestion', state.newQuestion)
            commit('clearNewQuestion')
        })

}

export const updateQuestion = ({commit}) => {

}

export const deleteQuestion = ({commit, state}, index) => {
    axios.delete(`/questions/${state.questions[index].id}`)
        .then(() => {
            commit('removeQuestion', index)
        })
}
