<template>
  <div class="container-register-payment">
    <div class="row">
      <div class="col-12">
        <div class="register-payment-wrapper">
          <H1 class="detil-order text-center">Transaksi Selesai</H1>
          <H1 class="detil-order text-center">Silahkan lakukan pembayaran ke:</H1>
          <div class="register-payment">
            <img width="159" height="70" src="/img/bca.png" alt="global Upr" />
            <div class="register-payment-content">
              <div>BCA a/n Wilson Sophian</div>
              <div> No Rek: 5315187165</div>
              <div>Masukkan kode booking: <br/><strong>{{booking_code}}</strong></div>
              <br/>
               <a href="/" class="btn btn-primary btn-custom">Kembali ke Beranda</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'register-payment',
    data () {
      return {
        booking_code: location.pathname.split('/')[3]
      }
    }
  }
</script>

<style lang="scss" scoped>
@import '../../sass/register-step.scss';
</style>

