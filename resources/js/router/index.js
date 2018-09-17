import Vue from 'vue'
import routes from './routes'
import Router from 'vue-router'

Vue.use(Router);
const router = new Router({
    routes,
   /* mode: 'history'*/
});

/*
router.beforeEach(async (to, from, next) => {
    next()
});*/

/*router.afterEach((to, from) => {
    router.app.$nextTick(() => {
        router.app.$loading.finish()
    })
});*/
export default router;

