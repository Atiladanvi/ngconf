
require('./bootstrap');
import Vue from 'vue';
import '../util/prism_bundle';
import '../sass/style.scss';
window.Vue = require('vue').default;
import { i18n } from '../src/nginxconfig/i18n/setup';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue';
import PortalVue from 'portal-vue';

// Dynamic webpack import location (must be before app)
const originalSrcDir = document.currentScript.src.split('/').slice(0, -1).join('/');
(typeof global === 'undefined' ? window : global).__replaceWebpackDynamicImport = path => {
    const base = path.split('/').pop();
    console.log(`Modifying import ${path} to use dir ${originalSrcDir} and base ${base}`);
    return `${originalSrcDir}/${base}`;
};



Vue.mixin({ methods: { route } });
Vue.use(InertiaPlugin);
Vue.use(PortalVue);

const app = document.getElementById('app');

new Vue({
    i18n,
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
