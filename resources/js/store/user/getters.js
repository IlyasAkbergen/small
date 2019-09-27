export const isManager = (state) => {
    return state.user.roles.includes('manager');
}

export const isClient = (state) => {
    return state.user.roles.includes('client');
}
