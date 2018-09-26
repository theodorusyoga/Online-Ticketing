<template>
    <div class="container main mx-auto">
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
              <H1 class="detil-order">Login</H1>
              <form @submit="handleSubmit">
                <div class="form-group">
                  <input type="email" class="form-control" id="exampleFormControlInput1" v-model="dataLogin.email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="exampleFormControlInput2" v-model="dataLogin.password" placeholder="Password" required>
                </div>
                <div class="btn-wrapper">
                  <button type="submit" class="btn btn-primary btn-custom"
                  :disabled="isLoading">Login</button>
                </div>

              </form>
            </div>
            <div class="register-step1-footer"></div>
          </div>

        </div>

      </div>
    </div>
</template>

<script>
import { login } from '../API.js';
import Cookie from 'js-cookie'
  export default {
    name: 'login',
    data () {
      return {
        dataLogin : {
          email: '',
          password: ''
        },
        message: '',
        errorMessage: '',
        isLoading: false
      }
    },
    mounted() {
      this.initPage()
    },
    methods: {
      initPage() {
        this.dataLogin = {}
        this.message = ''
        this.errorMessage = ''
      },
      async handleSubmit(e) {
        e.preventDefault()
        this.isLoading = true
        const data = await login(this.dataLogin)
        if (data.data.token) {
          Cookie.set('token', data.data.token)
          this.errorMessage = ''
          this.message = 'Succes Login'
          this.dataLogin = {}
        } else {
          this.message = ''
          this.errorMessage = 'Email atau password Anda Salah'
        }
        this.isLoading = false
      }
    }
  }
</script>

<style lang="scss" scoped>
@import '../../sass/register-step.scss';
</style>
