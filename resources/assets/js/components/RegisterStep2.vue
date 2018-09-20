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
              <form>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nomor KTP">
                </div>
                <div class="form-group">
                  <div class="upload-btn-wrapper">
                    <input type="file" name="myfile" @change="onFileChange" />
                    <div className="preview" v-if="imgSrc">
                      <img :src="imgSrc" alt="nophoto" />
                    </div>
                    <div class="label-upload" v-else>
                      <span><i class="fas fa-camera"></i></span>
                      <div>Upload KTP</div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Alamat Email">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Ulangi Alamat Email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nomor Handphone">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Domisili">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Usia">
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
    name: 'register-step2',
    data () {
      return {
        imgSrc: ''
      }
    },
    methods: {
      onFileChange(e) {
        e.preventDefault()

        let reader = new FileReader();
        let file = e.target.files[0]
        
        reader.readAsDataURL(file)
        reader.onloadend = () => {
          this.imgSrc = reader.result
        }
        
      }
    }
  }
</script>

<style lang="scss" scoped>
@import '../../sass/register-step.scss';
</style>
