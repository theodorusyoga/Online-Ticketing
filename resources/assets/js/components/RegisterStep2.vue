<template>
    <div class="container main mx-auto">
      <div class="row">
        <div class="col-md-12">
          <div class="mx-auto register-step1">
            <div class="register-step1-header mx-auto">
              <ul class="wizard">
                <li class="wizard-step-2">
                  <a href="#1" class="wizard-step-link">
                    <span class="wizard-caption">Detil Order</span>
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
              <div class="content-header">
                <h5>Product</h5>
                <h3>TWC - Regular</h3>
                <div class="content-header-title">
                  <h5>e-ticket</h5>
                  <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione ullam itaque.</div>
                </div>
              </div>
              <form>
                <div class="form-group">
                  <select class="form-control" id="exampleFormControlSelect1" placeholder="tes">
                    <option value="" disabled selected>Jenis Pendaftaran</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleFormControlSelect2" placeholder="tes">
                    <option value="" disabled selected>Status Pekerjaan</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Grup">
                </div>
                <div class="form-group">
                  <select class="form-control" id="exampleFormControlSelect3" placeholder="tes">
                    <option value="" disabled selected>Jenis Tiket</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Jumlah Tiket">
                  <label class="label-jumlah-tiket">Tuliskan angka 1 - 100</label>
                </div>
                <div class="label-radio">Transportasi Dari Airport ke Hotel</div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                  <label class="form-check-label" for="inlineRadio1">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                  <label class="form-check-label" for="inlineRadio2">Tidak</label>
                </div>
                <div class="btn-wrapper">
                  <button type="button" class="btn btn-primary btn-custom">Selanjutnya</button>
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
  export default {
    name: 'register-step2'
  }
</script>

<style lang="scss" scoped>
@import '../../sass/register-step.scss';
</style>
