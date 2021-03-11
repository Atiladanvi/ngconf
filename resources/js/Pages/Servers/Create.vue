<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Server
            </h2>
        </template>

        <div class="py-9">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="all do-bulma px-4">
                        <div class="container main">
                            <div class="columns is-multiline">
                                <div class="column is-full is-full-touch">

                                    <div class="header pt-5">
                                        <div class="container">
                                            <form>
                                                <div class="buttons">
                                                    <a
                                                        class="button is-primary "
                                                    >
                                                        Create Server
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="tabs">
                                        <ul>
                                            <li v-for="tab in tabs" :class="tabClass(tab.key)">
                                                <a @click="showTab(tab.key)">{{ tab.name }}</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        v-for="tab in tabs"
                                        :key="tab.key"
                                        :style="{ display: active === tab.key ? undefined : 'none' }"
                                        class="container"
                                    >
                                        <div>
                                            <div class="columns">
                                                <div class="column is-5">
                                                    <div class="field">
                                                        <label for="server_name" class="label">
                                                            <h3>Server name</h3>
                                                        </label>
                                                        <input id="server_name" class="input" type="text" />
                                                    </div>
                                                </div>
                                                <div class="column is-2">
                                                    <div class="field">
                                                        <label for="ram_size" class="label">
                                                            <h3>Ram size</h3>
                                                        </label>
                                                        <input id="ram_size" class="input" type="number" />
                                                    </div>
                                                </div>
                                                <div class="column is-3">
                                                    <div class="field">
                                                        <label for="ip_adress" class="label">
                                                            <h3>IP Address</h3>
                                                        </label>
                                                        <input id="ip_adress" class="input" type="text" />
                                                    </div>
                                                </div>
                                                <div class="column is-2">
                                                    <div class="field">
                                                        <label for="ssh_port" class="label">
                                                            <h3>SSH port</h3>
                                                        </label>
                                                        <input id="ssh_port" class="input" type="text" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="columns">
                                                <div class="column">
                                                    <div class="field">
                                                        <label for="php_versions" class="label">
                                                            <h3>PHP Versions</h3>
                                                        </label>
                                                        <VueSelect
                                                            id="php_versions"
                                                            v-model="selected"
                                                            :options="options"
                                                            multiple
                                                        />
                                                    </div>
                                                </div>
                                                <div class="column">
                                                    <div class="field">
                                                        <label for="node_versions" class="label">
                                                            <h3>Node Versions</h3>
                                                        </label>
                                                        <VueSelect
                                                            id="node_versions"
                                                            v-model="selected"
                                                            :options="options"
                                                            multiple
                                                        />
                                                    </div>
                                                </div>
                                                <div class="column">
                                                    <div class="field">
                                                        <label for="databases" class="label">
                                                            <h3>Databases</h3>
                                                        </label>
                                                        <VueSelect
                                                            id="databases"
                                                            v-model="selected"
                                                            :options="options"
                                                            multiple
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-4 my-5"></div>
                        <SitesApp :sites="[]"></SitesApp>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>

import AppLayout from '@/Layouts/AppLayout';
import VueSelect from 'vue-select';
import Global from "../../../src/nginxconfig/templates/global";
import SitesApp from "../../../src/nginxconfig/templates/app";

export default {
    components: {
        SitesApp,
        Global,
        AppLayout,
        VueSelect,
    },
    data() {
        return {
            selected: null,
            options: [
                '5.6',
                '8.0'
            ],
            active: 1,
            tabs: [
                {
                    key: 1,
                    name: 'Custom VPS',
                },
                {
                    key: 2,
                    name: 'Digital Ocean',
                },
                {
                    key: 3,
                    name: 'AWS',
                },
                {
                    key: 4,
                    name: 'Vultr',
                },
                {
                    key: 5,
                    name: 'Linode',
                },
            ],
        };
    },
    mounted() {
    },
    computed: {
        nextTab() {
            const tabs = this.$data.tabs.map(t => t.key);
            const index = tabs.indexOf(this.$data.active) + 1;
            if (index < tabs.length) return tabs[index];
            return false;
        },
        previousTab() {
            const tabs = this.$data.tabs.map(t => t.key);
            const index = tabs.indexOf(this.$data.active) - 1;
            if (index >= 0) return tabs[index];
            return false;
        },
    },
    methods: {
        tabClass(tab) {
            if (tab === this.$data.active) return 'is-active';
            return undefined;
        },
        showTab(target) {
            this.$data.active = target;
        },
        showPreviousTab() {
            this.$data.active = this.previousTab;
        },
        showNextTab() {
            this.$data.active = this.nextTab;
        },
    },
}
</script>

<style>
.vs__selected {
    padding: 7px 10px 7px 10px !important;
    height: 36px;
    margin-right: 4px !important;
}
.vs__selected-options {
    margin: 4px 0px 4px;

}
.vs__dropdown-toggle{
    padding: 0 16px 0px 6px !important;
    height: 47px !important;
}
</style>
