export const affiliates = {
    state: () => ({
        affiliates: [],
        homeOfficeLatLng: [],
        radius: 0
    }),

    actions: {
        setAffiliate( { commit }, data ){
            commit( 'setAffiliate', data );
        }
    },

    mutations: {
        addAffiliate( state, entry ){
            state.affiliates = state.affiliates.concat(entry);
        },
        setHomeOfficeLatLng( state, latLng ){
            state.homeOfficeLatLng = latLng
        },
        setRadius( state, value ){
            state.radius = value
        }
    },

    getters: {
        getAffiliates( state ){
            return state.affiliates
        },
        getHomeOfficeLatLng( state ){
            return state.homeOfficeLatLng
        },
        getRadius( state ){
            return state.radius
        },
    }
}
