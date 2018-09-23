<template>
    <div class="container main mx-auto">
      <div class="row">
        <div class="col-md-12">
          <div class="mx-auto register-step1">
            <div class="register-step1-header mx-auto">
              <ul class="wizard">
                <li class="wizard-step">
                  <a href="#1" class="wizard-step-link">
                    <span class="wizard-caption">Detil Order</span>
                  </a>
                </li>
                <li class="wizard-step">
                  <a href="#2" class="wizard-step-link-2">
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
              <div class="content-header">
                <h5>Product</h5>
                <h3>TWC - Regular</h3>
                <div class="content-header-title">
                  <h5>e-ticket</h5>
                  <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione ullam itaque.</div>
                </div>
              </div>
              <form @submit="handleSubmit">
                <div class="form-group">
                  <select class="form-control" id="exampleFormControlSelect1"
                  v-model="dataRegister.registration_type"
                  placeholder="tes">
                    <option value="" disabled selected>Jenis Pendaftaran</option>
                    <option>Delegasi Indonesia</option>
                    <option>Delegasi Luar Negeri</option>
                  </select>
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleFormControlSelect2"
                  v-model="dataRegister.job_status"
                  placeholder="tes">
                    <option value="" disabled selected>Status Pekerjaan</option>
                    <option>Karyawan</option>
                    <option>Pemilik Usaha</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" v-model="dataRegister.group_name"
                  id="exampleFormControlInput1" placeholder="Nama Grup">
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleFormControlSelect3"
                  v-model="dataRegister.ticket_type"
                  placeholder="tes">
                    <option value="" disabled selected>Jenis Tiket</option>
                    <option>Gold</option>
                    <option>Silver</option>
                    <option>Bronze</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleFormControlInput2" v-model="dataRegister.ticket_amount" placeholder="Jumlah Tiket">
                  <label class="label-jumlah-tiket">Tuliskan angka 1 - 100</label>
                </div>
                <div class="label-radio">Transportasi Dari Airport ke Hotel</div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" :value="true" v-model="dataRegister.transport_to_hotel">
                  <label class="form-check-label" for="inlineRadio1">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" :value="false" v-model="dataRegister.transport_to_hotel">
                  <label class="form-check-label" for="inlineRadio2">Tidak</label>
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
import { postData } from '../API.js';
import { loggingIn } from '../index.js'
    export default {
      name: 'register-step1',
      data () {
        return {
          dataRegister : {
            registration_type: '',
            job_status: '',
            group_name: '',
            ticket_type: '',
            ticket_amount: '',
            transport_to_hotel: ''
          }
        }
      },
      methods: {
        async handleSubmit(e) {
          e.preventDefault()
          await loggingIn()
          const data = await postData(this.dataRegister)
          
          window.location.replace(`/register/step2/${data.data.user_id}`)
        }
      }
    }
</script>

<style lang="scss" scoped>
@import '../../sass/register-step.scss';
</style>
