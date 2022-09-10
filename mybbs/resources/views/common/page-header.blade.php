<v-app-bar dark dense app style="{{ $headerstyle }}">
    <v-container class="pa-0">
    <v-row align="center" no-gutters>
        <v-col>
            <v-subheader class="indigo--text text--lighten-1 font-weight-bold title justify-center">@yield('html-title'){{$envname}}</v-subheader>
        </v-col>
    </v-row>
    </v-container>
</v-app-bar>
