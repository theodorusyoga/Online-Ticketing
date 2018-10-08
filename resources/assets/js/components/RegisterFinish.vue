<template>
  <div class="container main mx-auto">
    <div class="row">
      <div class="col-md-12 register-finish-wrapper">
        <div class="register-finish">
          <H1 class="detil-order text-center">Transaksi Selesai</H1>
          <div class="wrapper-logo">
            <img width="200" height="200" src="/img/logo-top-black.png" alt="Global UPR" />
          </div>
          <p>
            Terima Kasih telah melakukan pemesanan.<br/><br/>
            Simpan atau screenshot kode booking Anda.<br/><br/>
            Kode booking Anda adalah: <br/><strong>{{booking_code}}</strong>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'register-finish',
    data(){
        return{
            'booking_code': ''
        }
    },
    mounted() {
        this.booking_code = getParameterByName('order_id', window.location.href)
    }
  }


const getParameterByName = (name, url) => {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
</script>

<style lang="scss" scoped>
@import '../../sass/register-step.scss';
</style>

