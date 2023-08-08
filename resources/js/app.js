import { createStore } from 'vuex'
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import '../css/app.css';
import {affiliates} from "./store/affiliates";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

const store = createStore({
    modules: {
        affiliate: affiliates
    }
})

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({el, App, props, plugin}) {
        return createApp({render: () => h(App, props)})
            .use(plugin)
            .use(store)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
}).then(r => {});

