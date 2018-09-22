<template>
    <div class="container main mx-auto">
      <div class="row">
        <div class="col-md-12">
          <div class="mx-auto register-step1">
            <div class="register-step1-header mx-auto">
              <ul class="wizard">
                <li class="wizard-step-2">
                  <a href="#1" class="wizard-step-link">
                    <span class="wizard-caption">Data Diri</span>
                  </a>
                </li>
                <li class="wizard-step">
                  <a href="#2" class="wizard-step-link">
                    <span class="wizard-caption">Data Diri</span>
                  </a>
                </li>
                <li class="wizard-step">
                  <a href="#3" class="wizard-step-link-2">
                    <span class="wizard-caption">Pembayaran</span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="register-step1-content">
              <H1 class="detil-order">Detil Order</H1>
              <form @submit="handleSubmitStep2">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nomor KTP" v-model="dataStep2.identity_card">
                </div>
                <div class="form-group">
                  <div class="upload-btn-wrapper">
                    <input type="file" name="myfile" @change="onFileChange" />
                    <div className="preview" v-if="dataStep2.identity_card_photo">
                      <img :src="dataStep2.identity_card_photo" alt="nophoto" />
                    </div>
                    <div class="label-upload" v-else>
                      <span><i class="fas fa-camera"></i></span>
                      <div>Upload KTP</div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nama Lengkap" v-model="dataStep2.fullname">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Alamat Email" v-model="dataStep2.email">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Ulangi Alamat Email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nomor Handphone" v-model="dataStep2.phone_number">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Domisili" v-model="dataStep2.domicile">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Kota Domisili" v-model="dataStep2.domicile_city">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Usia" v-model="dataStep2.age">
                </div>
                <div class="btn-wrapper">
                  <button type="submit" class="btn btn-primary btn-custom">Selanjutnya</button>
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
import { postDataStep2 } from '../API.js';
  export default {
    name: 'register-step2',
    data () {
      return {
        dataStep2: {
          user_id: location.pathname.split('/')[3],
          identity_card: '',
          fullname: '',
          email: '',
          phone_number: '',
          domicile: '',
          domicile_city: '',
          age: '',
          identity_card_photo: ''
        }
      }
    },
    methods: {
      onFileChange(e) {
        e.preventDefault()

        let reader = new FileReader();
        let file = e.target.files[0]
        
        reader.readAsDataURL(file)
        reader.onloadend = () => {
          this.dataStep2.identity_card_photo = reader.result
        }
        
      },
      async handleSubmitStep2(e) {
        e.preventDefault()
        const response = await postDataStep2(this.dataStep2)
        console.log(response)
      }
    }
  }
</script>

<style lang="scss" scoped>
@import '../../sass/register-step.scss';
</style>
