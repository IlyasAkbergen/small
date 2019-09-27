import { axiosInstance as axios } from '../../plugins/axios'

export const  getParticipant = async ({commit, state}) => {

    return axios.get('/questions').then((res) => {
       // todo: на бэке создать модель с ресурсами Question
    })
};