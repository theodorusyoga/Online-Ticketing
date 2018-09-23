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
              <p class="kode-invoice"><i>Invoice # INV/TWC/2018/9810</i></p>
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
                <h5>TWC18327373W55</h5>
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
                  <span class="text-content"><strong>Regular</strong></span>
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
                <button type="button" class="btn btn-primary btn-custom" @click="handleSubmitStep3">Checkout</button>
              </div>
            </div>
            <div class="register-step1-footer"></div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
  import { getDataRegisterStep1, getDataRegisterStep2, getRequestPayment } from '../API.js';
  import { IDRFormatter, dateInWordsWithTime, expiredDate } from '../helpers/textFormatter.js';
  export default {
    name: 'register-step3',
    data () {
      return {
        dataStep1: '',
        dataStep2: '',
        dataStep3: {},
        id: location.pathname.split('/')[3],
        ticket_price: ''
      }
    },
    computed: {
      total() {
        let grandTotal
        const { ticket_amount, ticket_type } = this.dataStep1
        if (ticket_type === 'Gold') {
          grandTotal = ticket_amount * 2150000
        } else if (ticket_type === 'Silver') {
          grandTotal = ticket_amount * 1650000
        } else {
          grandTotal = ticket_amount * 650000
        }
        return IDRFormatter(grandTotal)
      },
      ticket_price_formatter() {
        return IDRFormatter(this.ticket_price)
      },
      getRegistrationDate() {
        return dateInWordsWithTime(this.dataStep2.created_at)
      },
      getExpiredDate() {
        return expiredDate(this.dataStep2.created_at)
      }
    },
    mounted() {
      this.getData(this.id)
    },
    methods: {
      async getData(id) {
        const dataStep1 = await getDataRegisterStep1(id)
        const dataStep2 = await getDataRegisterStep2(id)
        this.dataStep1 = JSON.parse(dataStep1.data.data)
        this.dataStep2 = JSON.parse(dataStep2.data.data)

        const { ticket_type, ticket_amount, user_id } = this.dataStep1
        const { name, domicile, domicile_city, phone_number, email } = this.dataStep2
        if (ticket_type === 'Gold') {
          this.ticket_price = 2150000
        } else if (ticket_type === 'Silver') {
          this.ticket_price = 1650000
        } else {
          this.ticket_price = 650000
        }

        this.dataStep3.ticket_amount = ticket_amount,
        this.dataStep3.user_id = user_id,
        this.dataStep3.ticket_type = ticket_type,
        this.dataStep3.student_card = '',
        this.dataStep3.name = name,
        this.dataStep3.domicile = domicile,
        this.dataStep3.domicile_city = domicile_city,
        this.dataStep3.phone_number = phone_number,
        this.dataStep3.email = email
      
        console.log('data 1', this.dataStep1)
        console.log('data 2', this.dataStep2)
      },

      async handleSubmitStep3(e) {
        e.preventDefault()

        const result = await getRequestPayment(this.dataStep3)
        .catch(Error => console.log(Error))
        console.log(result)
      }
    }
  }
</script>

<style lang="scss" scoped>
@import '../../sass/register-step.scss';
</style>
