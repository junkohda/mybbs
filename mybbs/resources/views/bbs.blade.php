@extends('common.layout')

@section('html-head')
@endsection

@section('html-title', 'MyBBS')

@section('page-content')

{{-- <v-container class="pa-4">
    <v-row no-gutters style="justify-content:flex-end">
        <v-col cols="1" class="pa-0">
            <v-btn dark rounded depressed color="#a7a7a7" width="120" v-on:click="show(1)"><b>Reflesh</b></v-btn>
        </v-col>
    </v-row>
</v-container> --}}


<v-container class="pa-0">
    <v-row class="mb-2" no-gutters>
        <v-col>
            <v-container class="pa-0">
                <v-data-table 
                    :headers="listHeaders"
                    :items="items" class="elevation-1"
                    :server-items-length="total"
                    no-data-text="該当データなし"
                    :options.sync="options"
                    :disable-sort="true"
                    :fixed-header="true"
                    :hide-default-footer="true"
                    :sort-by="[]"
                >
                    <template v-slot:item.message="{item}">
                        <v-tooltip top>
                            <template v-slot:activator="{ on }">
                                <v-text-field solo flat dense hide-details v-model="item.message" readonly v-on="on"></v-text-field>
                            </template>
                            <span v-html="item.messageStr"></span>
                        </v-tooltip>
                    </template>
                </v-data-table>

            </v-container>
        </v-col>
    </v-row>

    <v-row class="mb-2" no-gutters>
        <v-col cols="6">
            <v-container class="pa-0">
                <form action="{{ url('/submit') }}" method="POST">
                    @csrf
                    <v-row class="ma-3" no-gutters>
                        <v-text-field class="border rounded px-2 ml-2" type="text" label="投稿者" name="poster_name"></v-text-field>
                    </v-row>
                    <v-row class="ma-3" no-gutters>
                        <v-textarea class="border rounded px-2 ml-2" outlined name="message" label="本文"></v-textarea>
                    </v-row>
                    <v-row class="ma-3" no-gutters>
                        <v-btn type="submit" class="border rounded px-2 ml-4" depressed color="primary">投稿</v-btn>
                    </v-row>
                </form>
            </v-container>
        </v-col>
    </v-row>

</v-container>

@endsection

@section('page-script')

<script>
    var vm = new Vue({
        el: "#app",
        vuetify: new Vuetify({
        }),
        data:  {
            nav: false,
            total: 0,
            listHeaders : [
                {text: "投稿ID", value: "post_id", width: "100px"},
                {text: "投稿者", value: "poster_name", width: "70px"},
                {text: "投稿日時", value: "created_at", width: "70px"},
                {text: "本文", value: "message", width: "120px"},
            ],
            keyFunc : "",
            items : [],
            options: {
                page: 1,
                itemsPerPage: 100,
                sortBy: [''],
                sortDesc: [true]
            },
            footerProps: {
            },
            response: null,
        },
        watch: {
            options: {
                handler() {
                    vm.show(vm.options.page);
                },
                deep: true,
            }
        },
        computed: {
        },
        methods : {
            show : function(pg) {
                var req = new MaintApiRequestModel();
                req.pageSize = vm.options.itemsPerPage;
                var url = "api/bbs?page=" + pg;
                axios.post(url, req)
                .then(function(response)  {
                    vm.items = response.data.data;
                    vm.page = response.data.currentPage;
                    vm.pageLast = response.data.lastPage;
                    vm.total = response.data.total;
                    if(vm.items != null) {
                        vm.items.forEach(item => {
                            if(item.message != null) {
                                var reg = new RegExp("\n", "g");
                                item.messageStr = item.message.replace(reg,"<br/>");
                            }
                        });
                        vm.items.forEach(items => {
                            if(items.__proc_result_text != null) {
                                items.__proc_result_text = items.__proc_result_text.replace(/__/g, '\r\n');
                            }
                        });
                    }
                }).catch(function(error) {
                    alertError(error);
                    console.log(error);
                });
            },
            submit : function() {
                var req = new MaintApiRequestModel();
                req.pageSize = vm.options.itemsPerPage;
                var url = "api/bbs?page=" + pg;
                axios.post(url, req)
                .then(function(response)  {
                    vm.items = response.data.data;
                    vm.page = response.data.currentPage;
                    vm.pageLast = response.data.lastPage;
                    vm.total = response.data.total;
                    if(vm.items != null) {
                        vm.items.forEach(item => {
                            if(item.message != null) {
                                var reg = new RegExp("\n", "g");
                                item.messageStr = item.message.replace(reg,"<br/>");
                            }
                        });
                        vm.items.forEach(items => {
                            if(items.__proc_result_text != null) {
                                items.__proc_result_text = items.__proc_result_text.replace(/__/g, '\r\n');
                            }
                        });
                    }
                }).catch(function(error) {
                    alertError(error);
                    console.log(error);
                });
            }
        }
    });
    </script>

@endsection