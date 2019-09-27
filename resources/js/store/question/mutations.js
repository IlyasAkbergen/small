export const setQuestions = (state, questions) => {
    state.questions = questions
}

export const addQuestion = (state, question) => {
    state.questions.push(question)
}

export const clearNewQuestion = (state) => {
    state.newQuestion = Object.assign({}, state.template)
}

export const removeQuestion = (state, index) => {
    state.questions.splice(index, 1)
}

export const addAnswer = (state, payload) => {
    state.questions[payload[1]].answers.push(payload[0])
}

export const removeAnswer = (state, payload) => {
    state.questions[payload[0]].answers.splice(payload[1], 1)
}
