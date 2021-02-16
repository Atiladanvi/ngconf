/*
Copyright 2021 OctoPloy
*/

export default {
    data() {
        return {
            confirmingSiteDeletion: false,
            indexSiteToDelete: null,
            sectionsVisibles: {
                header: false,
                sitesSettings: true,
                globalSettings: false,
                calloutDigitalOcean: false,
                configurationSteps: false,
                nginxFiles: false,
                digitalOceanFooter: false
            },
            form: {}
        }
    },
    computed: {
        reallySiteDelete: {
            get(val) {
                return val;
            },
            set (val) {
                if (val)
                    this.deleteSite();
            },
        },
    },
    methods: {
        loadForm(index) {
            let data = this.domains[index || this.active];
            this.form = this.$inertia.form(data);
        },
        siteStored(obj) {
           if (obj)
               return obj.hasOwnProperty('_id');
           return false;
        },
        syncSites(action = null) {
            let presets = this.$data.domains[0].presets;
            this.sites.map((site) => {
                let keys = Object.keys(site.presets);
                keys.map((preset) => {
                    if (site.presets.hasOwnProperty(preset))
                      site.presets[preset].computedCheck = function (data) {
                          return presets[preset].computedCheck(data);
                      }
                })
                return site;
            })
            this.$data.domains = this.sites;
            if (action !== 'update')
                this.active = this.$data.domains.length - 1;
        },
        saveSite() {
            let self = this;
            this.loadForm();
            if (this.siteStored(this.$data.domains[this.active])){
                this.form.put(route('site.update', this.$data.domains[this.active]._id), {
                    errorBag: 'updateSite',
                    preserveScroll: true,
                    onSuccess: function () {
                        self.syncSites('update');
                    }
                });
            }else{
                let self = this
                this.form.post(route('site.store'), {
                    errorBag: 'storeSite',
                    preserveScroll: true,
                    onSuccess: function () {
                        self.syncSites('store');
                    }
                });
            }
        },
        confirmSiteDeletion(index) {
            this.indexSiteToDelete = index;
            this.confirmingSiteDeletion = true;
        },
        deleteSite() {
            let self = this;
            this.loadForm(this.indexSiteToDelete);
            this.confirmingSiteDeletion = false;
            this.form.delete(route('site.destroy', this.$data.domains[this.indexSiteToDelete]._id), {
                errorBag: 'deleteSite',
                preserveScroll: true,
                onSuccess: function () {
                    self.syncSites('delete');
                }
            });
            this.reallyRemove(this.indexSiteToDelete);
        }
    }
}
