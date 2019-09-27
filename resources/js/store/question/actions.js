import { axiosInstance as axios } from '../../plugins/axios'

export const getQuestions = async ({ commit, state }, isManager) => {
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