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
