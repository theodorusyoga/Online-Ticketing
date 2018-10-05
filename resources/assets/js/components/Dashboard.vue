<template>
    <div class="container main mx-auto">
      <div class="image-title text-center mt-4">
        <img src="/img/its-time-gradient.png" height="200"/>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="mx-auto register-step1">
            <div class="register-step1-content">
              <div class="alert alert-success" role="alert" v-if="message">
                {{message}}
              </div>
              <div class="alert alert-danger" role="alert" v-if="errorMessage">
                {{errorMessage}}
              </div>
              <H1 class="detil-order">Dashboard</H1>
              <div class="menu">
                  <button type="button" @click="(e) => downloadFiles(e, 'donations')"
                  class="btn btn-primary btn-custom" :disabled="isLoading">Download Donation Data</button>
                    <button type="button" @click="(e) => downloadFiles(e, 'volunteers')"
                  class="btn btn-primary btn-custom" :disabled="isLoading">Download Volunteer Data</button>
                   <button type="button" @click="(e) => downloadFiles(e, 'registration')"
                  class="btn btn-primary btn-custom" :disabled="isLoading">Download Registration Data</button>
                   <button type="button" @click="logout" :disabled="isLoading"
                  class="btn btn-primary btn-logout">Log Out</button>
              </div>
            </div>
            <div class="register-step1-footer"></div>
          </div>

        </div>

      </div>
    </div>
</template>

<script>
import { downloadDonations, downloadVolunteers, downloadOrderDetails } from '../API.js';
import Cookie from 'js-cookie'
  export default {
    name: 'login',
    data () {
      return {
        message: '',
        errorMessage: '',
        isLoading: false
      }
    },
    mounted() {
      this.initPage()
    },
    beforeCreate() {
        const token = Cookie.get('token')
        if (!token) {
          window.location.replace('/')
        }
    },
    methods: {
      initPage() {
        this.message = ''
        this.errorMessage = ''
      },
      async downloadFiles(e, type) {
        e.preventDefault();
        this.isLoading = true
        var data = {};
        switch(type) {
            case 'donations':
              data = await downloadDonations();
              break;
            case 'volunteers':
              data = await downloadVolunteers();
              break;
            case 'registration':
              data = await downloadOrderDetails();
              break;
            default:
              data = {};
              break;
        }
        const url = window.URL.createObjectURL(new Blob([data.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', type + '.xlsx');
        document.body.appendChild(link);
        link.click();
        this.isLoading = false
      },
      logout() {
        Cookie.remove('token');
        window.location.replace('/');
      }
    }
  }
</script>

<style lang="scss" scoped>
@import '../../sass/register-step.scss';
</style>
