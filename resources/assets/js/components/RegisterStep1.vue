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
              <div class="content-header" v-if="packaging.length > 0">
                <h3>{{priceList[0]}} - {{priceList[1]}}</h3>
                <div class="content-header-title">
                  <ul v-for="(p, index) in packaging" :key="p">
                    <li>
                      <span>{{index+1}}.</span>
                      <span>{{p}}</span>
                    </li>
                  </ul>
                </div>
              </div>
              <form @submit="handleSubmit">
                <div class="form-group">
                  <select class="form-control"
                  @change="showPackage"
                  id="exampleFormControlSelect3"
                  v-model="dataRegister.ticket_type" required
                  placeholder="tes">
                    <option value="" disabled selected>Jenis Tiket</option>
                    <option>Gold</option>
                    <option>Silver</option>
                    <option>Bronze</option>
                  </select>
                </div>
                <div class="form-group">
                  <input :min="minTicket" type="number" class="form-control" id="exampleFormControlInput2" v-model="dataRegister.ticket_amount" placeholder="Jumlah Tiket"
                  @keyup="changeTicketAmount" required>
                  <span class="label-jumlah-tiket">Tuliskan angka 1 - 100</span>
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleFormControlSelect2"
                  v-model="dataRegister.job_status" required
                  placeholder="tes">
                    <option value="" disabled selected>Status Pekerjaan</option>
                    <option value="pelajar">Pelajar</option>
                    <option value="nonpelajar">Non Pelajar</option>
                  </select>
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleFormControlSelect1"
                  v-model="dataRegister.registration_type"
                  placeholder="tes" required disabled="true">
                    <option value="" disabled selected>Jenis Pendaftaran</option>
                    <option value="perseorangan">Perseorangan</option>
                    <option value="group">Group</option>
                  </select>
                </div>
                <div class="form-group">
                  <input v-if="dataRegister.registration_type == 'group'" type="text" class="form-control"
                  :class="{'form-error' : !isGroupNameValid}" v-model="dataRegister.group_name"
                  id="exampleFormControlInput1" placeholder="Nama Grup" required>
                   <span class="error" v-if="!isGroupNameValid && dataRegister.registration_type == 'group'">Nama grup sudah dipakai</span>
                </div>
                <div class="form-group" v-if="dataRegister.ticket_type === 'Bronze'">
                  <div class="label-radio">Transportasi Dari Airport ke Hotel</div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" :value="true" v-model="dataRegister.transport_to_hotel" required>
                    <label class="form-check-label" for="inlineRadio1">Ya</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" :value="false" v-model="dataRegister.transport_to_hotel">
                    <label class="form-check-label" for="inlineRadio2">Tidak</label>
                  </div>
                </div>
                <div class="btn-wrapper">
                  <button type="submit" class="btn btn-primary btn-custom"
                  :disabled="isLoading">Selanjutnya</button>
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
import { postData, checkGroupName } from '../API.js';
import { getToken } from '../index.js'
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
          },
          minTicket: 1,
          isLoading: false,
          packaging: [],
          priceList: [],
          goldPackage: [
            'Tiket konfrensi selama konfrensi berlangsung.',
            'Twin share room dari tanggal 22-27 Januari 2019 di hotel berbintang lima.',
            'Sarapan dan 2 kali makan selama konfrensi berlangsung.',
            'Sudah termasuk akomodasi dari airpot ke hotel dan dari hotel ke bandara.',
            ' Harga spesial untuk group register.'
          ],
          silverPackage: [
            'Tiket konfrensi selama konfrensi berlangsung.',
            'Twin share room dari tanggal 22-27 Januari 2019 di hotel berbintang tiga.',
            'Sarapan dan 2 kali makan selama konfrensi berlangsung.',
            'Sudah termasuk akomodasi dari airpot ke hotel dan dari hotel ke bandara.','Harga spesial untuk pelajar/mahasiswa.',
            'Harga spesial untuk group register.'
          ],
          bronzepackage: [
            'Tiket konfrensi selama 4 hari.',
            'Termasuk 2 makan selama konfrensi berlangsung.',
            'Harga spesial untuk pelajar/mahasiswa.',
            'Harga sama untuk individual maupun kelompok.',
            'Tidak termasuk untuk akomodasi dari Bandara ke venue dan venue ke Bandara.','Tersedia opsi tambahan untuk akomodasi dari Bandara ke venue konfrensi'
          ],
          isGroupNameValid: true
        }
      },
      methods: {
        async handleSubmit(e) {
          e.preventDefault()
          this.isLoading = true
          await getToken()

          // check group name
          if(this.dataRegister.ticket_amount >= 10) {
              const checkgroup = await checkGroupName({
                  group_name: this.dataRegister.group_name
              })
              if(checkgroup.data.status === 0){
                  this.isGroupNameValid = true;
              } else {
                  this.isGroupNameValid = false;
                   this.isLoading = false;
                  return;
              }
          } else {
              this.isGroupNameValid = true;
          }

          const data = await postData(this.dataRegister)
          this.isLoading = false
          window.location.replace(`/register/step2/${data.data.user_id}`)
        },
        showPackage() {
          const { ticket_type } = this.dataRegister
          if (ticket_type === 'Gold') {
            this.packaging = this.goldPackage
            this.priceList = ['Gold', 'RP. 2.150.000']
          } else if (ticket_type === 'Silver') {
            this.packaging = this.silverPackage
            this.priceList = ['Silver', 'RP. 1.650.000']
          } else if (ticket_type === 'Bronze') {
            this.packaging = this.bronzepackage
            this.priceList = ['Bronze', 'RP. 650.000']
          } else {
            this.packaging = []
          }
        },
        changeTicketAmount(e) {
          const amount = e.target.value
          if(amount > 0 && amount < 10){
            this.dataRegister.registration_type = 'perseorangan'
          } else if(amount >= 10) {
            this.dataRegister.registration_type = 'group'
          } else {
            this.dataRegister.registration_type = ''
          }
        }
      }
    }
</script>

<style lang="scss" scoped>
@import '../../sass/register-step.scss';
</style>
