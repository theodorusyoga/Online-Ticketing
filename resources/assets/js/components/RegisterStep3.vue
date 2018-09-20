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
                <h5>Ari Panjaitan</h5>
              </div>
              <div class="register-info">
                <h1>Alamat Email</h1>
                <h5>Ari_Panjaitan@gmail.com</h5>
              </div>
              <div class="register-info">
                <h1>Nomor Handphone</h1>
                <h5>08976577653</h5>
              </div>
              <div class="register-info">
                <h1>Usia</h1>
                <h5>40</h5>
              </div>
              <div class="register-info">
                <h1>Kode Booking</h1>
                <h5>TWC18327373W55</h5>
              </div>
              <div class="register-info">
                <h1>Kode</h1>
                <h5>Jakarta</h5>
              </div>
            </div>
            <div class="register-step3-separator"></div>
            <div class="register-step1-content">
              <H1 class="detil-order">My Booking</H1>
              <div class="booking-info">
                <div class="booking-info-expired">
                  <span class="text-caption">Date</span>
                  <span class="text-content">31 Agustus 2018 17:49</span>
                </div>
                <div class="booking-info-expired">
                  <span class="text-caption">Batas Waktu</span>
                  <span class="text-content">02 September 2018 17:48</span>
                </div>
              </div>
              <div class="booking-info">
                <div class="booking-info-expired">
                  <span class="text-caption"><strong>Deskripsi</strong></span>
                  <span class="text-content"><strong>Regular</strong></span>
                </div>
                <div class="booking-info-expired">
                  <span class="text-caption"><strong>Price</strong></span>
                  <span class="text-content"><strong>1 x IDR 650.000</strong></span>
                </div>
                <div class="booking-info-expired">
                  <span class="text-caption"><strong>Total</strong></span>
                  <span class="text-content"><strong>IDR 650.000</strong> </span>
                </div>
              </div>
              <div class="amount-total-wrapper">
                <div class="amount-total">
                  <h1>Grand total</h1>
                  <h5>IDR 650.000</h5>
                  <p class="kode-invoice"><i>Pembayaran Anda belum selesai</i></p>
                </div>
              </div>
              <div class="btn-wrapper">
                <button type="button" class="btn btn-primary btn-custom">Checkout</button>
              </div>
            </div>
            <div class="register-step1-footer"></div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
  export default {
    name: 'register-step3',
    data () {
      return {
        data: ''
      }
    }
  }
</script>

<style lang="scss" scoped>
@import '../../sass/register-step.scss';
</style>
