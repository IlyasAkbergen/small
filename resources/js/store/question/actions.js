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
    let formData = new FormData();
    for (let p in state.newQuestion)
        formData.append(p, state.newQuestion[p])
    axios.post('/questions',
        formData,
        {
            headers: {
                'Content-type': 'multipart/form-data'
            }
        })
        .then((res) => {
            commit('addQuestion', res.data.question)
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

export const saveNewAnswer = ({commit, state}, question_index) => {
    axios.post('/answers', {'answer': state.newAnswer})
        .then((res) => {
            let answer = res.data.answer
            commit('addAnswer', [
                answer,
                question_index
            ])
            state.newAnswer = {}
        })
}

export const deleteAnswer = ({commit, state}, payload) => {
    // payload[0] - questionIndex, payload[1] - answerIndex payload[2] - answerId
    axios.delete(`/answers/${payload[2]}`)
        .then(() => {
            commit('removeAnswer', [payload[0], payload[1]])
        })
}
