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
                <li class="wizard-step-2">
                  <a href="#2" class="wizard-step-link">
                    <span class="wizard-caption">Data Diri</span>
                  </a>
                </li>
                <li class="wizard-step">
                  <a href="#3" class="wizard-step-link">
                    <span class="wizard-caption">Pembayaran</span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="register-step1-content">
              <H1 class="detil-order">Pembayaran</H1>
              <p class="kode-invoice"><i>Invoice Anda</i></p>
              <div class="register-info">
                <h1>Nama</h1>
                <h5>{{dataStep2.fullname}}</h5>
              </div>
              <div class="register-info">
                <h1>Alamat Email</h1>
                <h5>{{dataStep2.email}}</h5>
              </div>
              <div class="register-info">
                <h1>Nomor Handphone</h1>
                <h5>{{ dataStep2.phone_number }}</h5>
              </div>
              <div class="register-info">
                <h1>Usia</h1>
                <h5>{{dataStep2.age}}</h5>
              </div>
              <div class="register-info">
                <h1>Kode Booking</h1>
                <h5>{{dataStep1.user_id}}</h5>
              </div>
              <div class="register-info">
                <h1>Kota</h1>
                <h5>{{dataStep2.domicile_city}}</h5>
              </div>
            </div>
            <div class="register-step3-separator"></div>
            <div class="register-step1-content">
              <H1 class="detil-order">My Booking</H1>
              <div class="booking-info">
                <div class="booking-info-expired">
                  <span class="text-caption">Date</span>
                  <span class="text-content">{{getRegistrationDate}}</span>
                </div>
                <div class="booking-info-expired">
                  <span class="text-caption">Batas Waktu</span>
                  <span class="text-content">{{getExpiredDate}}</span>
                </div>
              </div>
              <div class="booking-info">
                <div class="booking-info-expired">
                  <span class="text-caption"><strong>Deskripsi</strong></span>
                  <span class="text-content"><strong>{{dataStep1.ticket_type}}</strong></span>
                </div>
                <div class="booking-info-expired">
                  <span class="text-caption"><strong>Price</strong></span>
                  <span class="text-content"><strong>{{dataStep1.ticket_amount}} x IDR {{ticket_price_formatter}}</strong></span>
                </div>
                <div class="booking-info-expired">
                  <span class="text-caption"><strong>Total</strong></span>
                  <span class="text-content"><strong>IDR {{total}}</strong> </span>
                </div>
              </div>
              <div class="amount-total-wrapper">
                <div class="amount-total">
                  <h1>Grand total</h1>
                  <h5>IDR {{total}}</h5>
                  <p class="kode-invoice"><i>Pembayaran Anda belum selesai</i></p>
                </div>
              </div>
              <div class="btn-wrapper">
                <button type="button" class="btn btn-primary btn-custom" @click="handleSubmitStep3" :disabled="isLoading">Checkout</button>
              </div>
            </div>
            <div class="register-step1-footer"></div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
  import Cookie from 'js-cookie';
  import { getDataRegisterStep1, getDataRegisterStep2, getRequestPayment } from '../API.js';
  import { IDRFormatter, dateInWordsWithTime, expiredDate } from '../helpers/textFormatter.js';
  export default {
    name: 'register-step3',
    data () {
      return {
        dataStep1: {
            ticket_type: ''
        },
        dataStep2: '',
        dataStep3: {},
        id: location.pathname.split('/')[3],
        ticket_price: '',
        isLoading: false
      }
    },
    computed: {
      total() {
        let grandTotal
        const { ticket_amount, ticket_type, job_status, transport_to_hotel } = this.dataStep1
        const { identity_card_photo } = this.dataStep2
        const student_card_photo = job_status === 'pelajar' ? identity_card_photo : '';
        const ticket = ticket_type.toLowerCase();
        if (ticket === 'gold') {
          grandTotal = ticket_amount >= 10 ? ticket_amount * 2100000 : ticket_amount * 2150000
        } else if (ticket === 'silver') {
          grandTotal = student_card_photo != '' ?
          ticket_amount * 1450000 :
           (ticket_amount >= 10 ? ticket_amount * 1600000 : ticket_amount * 1650000)
        } else  if (ticket === 'bronze' && transport_to_hotel) {
          grandTotal = student_card_photo != '' ? ticket_amount * 450000 + (100000 * ticket_amount) : ticket_amount * 650000 + (100000 * ticket_amount)
        } else {
          grandTotal = student_card_photo != '' ? ticket_amount * 450000 : ticket_amount * 650000
        }
        return IDRFormatter(grandTotal)
      },
      ticket_price_formatter() {
        return IDRFormatter(this.ticket_price/this.dataStep1.ticket_amount)
      },
      getRegistrationDate() {
        return this.dataStep2.created_at ? dateInWordsWithTime(this.dataStep2.created_at) : '-'
      },
      getExpiredDate() {
        return this.dataStep2.created_at ? expiredDate(this.dataStep2.created_at) : '-'
      }
    },
     beforeCreate() {
      const token = Cookie.get('token')
      if (!token) {
        window.location.replace('/')
      }
    },
    async mounted() {
      await this.getData(this.id)
      await this.navigationGuards()
    },
    methods: {
      navigationGuards() {
        if (this.dataStep1.user_id !== this.id) {
         window.location.replace('/')
        }
      },
      async getData(id) {
        const dataStep1 = await getDataRegisterStep1(id)
        const dataStep2 = await getDataRegisterStep2(id)
        this.dataStep1 = JSON.parse(dataStep1.data.data)
        this.dataStep2 = JSON.parse(dataStep2.data.data)

        const { ticket_type, ticket_amount, user_id, job_status } = this.dataStep1
        const { name, domicile, domicile_city, phone_number, email, identity_card_photo } = this.dataStep2
        this.dataStep1.ticket_type = capitalizeFirstLetter(this.dataStep1.ticket_type)
        const student_card_photo = job_status === 'pelajar' ? identity_card_photo : '';
        const ticket = ticket_type.toLowerCase();
        if (ticket === 'gold') {
          this.ticket_price = ticket_amount >= 10 ? ticket_amount * 2100000 : ticket_amount * 2150000
        } else if (ticket === 'silver') {
          this.ticket_price = student_card_photo != '' ?
          ticket_amount * 1450000 :
           (ticket_amount >= 10 ? ticket_amount * 1600000 : ticket_amount * 1650000)
        } else if (ticket === 'bronze' && this.dataStep1.transport_to_hotel) {
          this.ticket_price = student_card_photo != '' ? (ticket_amount * 450000) + (100000 * ticket_amount) : (ticket_amount * 650000) + (100000 *  ticket_amount)
        } else {
          this.ticket_price = student_card_photo != '' ? ticket_amount * 450000 : ticket_amount * 650000
        }

        this.dataStep3.ticket_amount = ticket_amount
        this.dataStep3.user_id = user_id
        this.dataStep3.ticket_type = ticket_type
        this.dataStep3.student_card = ''
        this.dataStep3.name = name
        this.dataStep3.domicile = domicile
        this.dataStep3.domicile_city = domicile_city
        this.dataStep3.phone_number = phone_number
        this.dataStep3.email = email
        this.dataStep3.student_card_photo = student_card_photo

      },

      async handleSubmitStep3(e) {
        // e.preventDefault()
        // this.isLoading = true;
        // const result = await getRequestPayment(this.dataStep3)
        // .catch(Error => console.log(Error))
        // if(result.data.status === 0) {
        //     window.location.replace(result.data.url)
        // } else {
        //     console.log('error')
        // }
        // this.isLoading = false;
        window.location.replace('/register/payment')
      }
    }
  }

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
</script>

<style lang="scss" scoped>
@import '../../sass/register-step.scss';
</style>
