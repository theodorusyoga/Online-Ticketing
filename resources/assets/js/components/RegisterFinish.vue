<template>
  <div class="container main mx-auto">
    <div class="row">
      <div class="col-md-12 register-finish-wrapper">
        <div class="register-finish">
          <H1 class="detil-order text-center">Pemesanan Selesai</H1>
          <div class="wrapper-logo">
            <img width="100" height="100" src="/img/its-time-gradient.png" alt="Global UPR" />
          </div>
          <p>
            Terima Kasih telah melakukan pemesanan.
            Batas waktu pembayaran pesanan Anda adalah 1 x 24 jam.<br>
            Silakan lakukan pembayaran
          </p>
        </div>
      </div>
    </div>
  </div>  
</template>

<script>
  export default {
    name: 'register-finish'
  }
</script>

<style lang="scss" scoped>
@import '../../sass/register-step.scss';
</style>

