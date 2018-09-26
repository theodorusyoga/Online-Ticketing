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
              <form @submit="handleSubmitStep2">
                <div class="form-group">
                  <input type="text" class="form-control" :placeholder="dataStep1.job_status === 'pelajar' ? 'Nomor Kartu Pelajar' : 'Nomor KTP'" v-model="dataStep2.identity_card" required>
                </div>
                <div class="form-group">
                  <div class="upload-btn-wrapper">
                    <input type="file" name="myfile" @change="onFileChange" required />
                    <div className="preview" v-if="dataStep2.identity_card_photo">
                      <img :src="identity_card_photo_base64" alt="nophoto" />
                    </div>
                    <div class="label-upload" v-else>
                      <span><i class="fas fa-camera"></i></span>
                      <div>{{dataStep1.job_status === 'pelajar' ? 'Upload Foto Kartu Pelajar' : 'Upload Foto KTP'}}</div>
                    </div>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <div class="upload-btn-wrapper">
                    <input type="file" name="myfile" @change="onStudentCardChange" />
                    <div className="preview" v-if="dataStep2.student_card_photo">
                      <img :src="student_card_photo_base64" alt="nophoto" />
                    </div>
                    <div class="label-upload" v-else>
                      <span><i class="fas fa-camera"></i></span>
                      <div>Upload Kartu Pelajar (Opsional)</div>
                    </div>
                  </div>
                </div> -->
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nama Lengkap" v-model="dataStep2.fullname" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Alamat Email" v-model="dataStep2.email" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" :class="{'form-error' : isEmailError}" placeholder="Ulangi Alamat Email" v-model="dataStep2.confirmEmail">
                  <span class="error" v-if="isEmailError">Email tidak sesuai.</span>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nomor Handphone" v-model="dataStep2.phone_number" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nama Provinsi" v-model="dataStep2.domicile" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nama Kota" v-model="dataStep2.domicile_city" required>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" placeholder="Usia" v-model="dataStep2.age" required>
                </div>
                <div class="btn-wrapper">
                  <button type="submit" class="btn btn-primary btn-custom" :disabled="isLoading">Selanjutnya</button>
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
import { postDataStep2, getDataRegisterStep1} from '../API.js';
  export default {
    name: 'register-step2',
    data () {
      return {
        dataStep2: {
          user_id: location.pathname.split('/')[3],
          identity_card: '',
          fullname: '',
          email: '',
          confirmEmail: '',
          phone_number: '',
          domicile: '',
          domicile_city: '',
          age: '',
          identity_card_photo: '',
          student_card_photo: ''
        },
        dataStep1: {},
        identity_card_photo_base64: '',
        student_card_photo_base64: '',
        isEmailError: false,
        isLoading: false
      }
    },
    async mounted() {
      this.getDataStep1(this.dataStep2.user_id)
    },
    methods: {
      async getDataStep1() {
        const dataStep1 = await getDataRegisterStep1(this.dataStep2.user_id)
        if (dataStep1.data.data) {
          this.dataStep1 = JSON.parse(dataStep1.data.data)
          console.log(this.dataStep1)
        }
        
      },
      onFileChange(e) {
        e.preventDefault()

        let reader = new FileReader();
        let file = e.target.files[0]

        reader.readAsDataURL(file)
        reader.onloadend = () => {
          const image = new Image()
          image.onload = (e) => {
            var canvas = document.createElement('canvas')
            const newSize = calculateAspectRatioFit(
              image.width, image.height, 600, 600
            )
            canvas.width = newSize.width
            canvas.height = newSize.height
            canvas.getContext('2d').drawImage(image, 0, 0, newSize.width, newSize.height);
            const base64Result = canvas.toDataURL('image/jpeg')
            this.identity_card_photo_base64 = base64Result
            this.dataStep2.identity_card_photo = base64ToFile(base64Result, file.name)
          }
          image.src = reader.result
        }

      },
       onStudentCardChange(e) {
        e.preventDefault()

        let reader = new FileReader();
        let file = e.target.files[0]

        reader.readAsDataURL(file)
        reader.onloadend = () => {
          const image = new Image()
          image.onload = (e) => {
            var canvas = document.createElement('canvas')
            const newSize = calculateAspectRatioFit(
              image.width, image.height, 600, 600
            )
            canvas.width = newSize.width
            canvas.height = newSize.height
            canvas.getContext('2d').drawImage(image, 0, 0, newSize.width, newSize.height);
            const base64Result = canvas.toDataURL('image/jpeg')
            this.student_card_photo_base64 =base64Result
            this.dataStep2.student_card_photo = base64ToFile(base64Result, file.name)
          }
           image.src = reader.result
        }

      },
      async handleSubmitStep2(e) {
        e.preventDefault()
        if(this.dataStep2.email !== this.dataStep2.confirmEmail) {
          this.isEmailError = true
            return
        } else this.isEmailError = false
        this.isLoading = true
        const response = await postDataStep2(this.dataStep2)
        this.isLoading = false
         window.location.replace(`/register/step3/${this.dataStep2.user_id}`)
      }
    }
  }

const base64ToFile = (base64, filename) => {
  var blobBin = atob(base64.split(',')[1]);
  var array = [];
    for(var i = 0; i < blobBin.length; i++) {
    array.push(blobBin.charCodeAt(i));
  }
  var file=new File([new Uint8Array(array)], filename, {type: 'image/jpeg'});
  return file
}

const calculateAspectRatioFit = (srcWidth, srcHeight, maxWidth, maxHeight) => {
    var ratio = Math.min(maxWidth / srcWidth, maxHeight / srcHeight);
    return { width: srcWidth*ratio, height: srcHeight*ratio };
 }
</script>

<style lang="scss" scoped>
@import '../../sass/register-step.scss';
</style>
