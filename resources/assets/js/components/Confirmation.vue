<template>
    <section class="register-confirmation">

        <div>
            <div class="header text-center">
                <img src="/img/logo-top.png" width="100" alt="Logo"/>
                <h3 class="title">Konfirmasi Pembayaran</h3>
            </div>
            <div class="alert-confirmation" v-if="errormsg !== ''">
                <div class="alert alert-danger">{{errormsg}}</div>
            </div>
            <div v-else class="container confirmation-container">
                <div class="text-center" v-if="loading">
                    <img src="/img/gradient.png" width="30" />
                    <br/>
                    <br/>
                    <p>Loading...</p>
                </div>
                <form v-else id="donation-form">
                    <div class="modal-body">
                         <div class="form-group">
                            <label class="col-form-label">Nomor Booking</label><br/>
                            <label id="amount"><strong>{{data.user_id}}</strong></label>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-form-label">Nama Sesuai Rekening</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="bank" class="col-form-label">Bank</label>
                            <input type="text" class="form-control" id="bank" name="bank" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nominal Transfer</label><br/>
                            <label id="amount"><strong>{{ price | currency }}</strong></label>
                        </div>
                        <div class="form-group">
                            <label for="date" class="col-form-label">Tanggal Transfer</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="file" class="col-form-label">Bukti Transfer</label><br/>
                            <input type="file" id="file" name="file" required>
                        </div>
                        <div id="donation-success-alert" class="alert alert-success" style="display: none;" role="alert">
                                Konfirmasi pembayaran berhasil dikirim
                        </div>
                        <div id="donation-error-alert" class="alert alert-danger" style="display: none;" role="alert">
                            Konfirmasi pembayaran gagal dikirim karena ada kesalahan
                        </div>
                    </div>
                    <div class="modal-footer">
                        <img style="display: none;" class="donation-loading" src="/img/loading-small.svg"/>
                        <button id="donation-submit" type="submit" class="btn btn-primary custom-btn">Kirim</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';
import Cookie from 'js-cookie'
import { getDataRegisterStep1, getDataRegisterStep2, calculatePrice } from '../API.js';
import { IDRFormatter } from '../helpers/textFormatter.js';

export default {
    data() {
        return {
            id:  location.pathname.split('/')[3],
            errormsg: '',
            loading: false,
            data: {},
            dataStep2: {},
            price: 0
        }
    },
    async created() {
        await this.getOrderDetail(this.id);
    },
    filters: {
        currency: val => IDRFormatter(val)
    },
    methods: {
        async getOrderDetail(id) {
            this.loading = true;
            await this.getToken();
            await getDataRegisterStep1(id).then(({data}) => {
                this.data = JSON.parse(data.data);
            }).catch(() => {
                this.loading = false;
                this.errormsg = 'Nomor booking Anda salah. Silakan coba lagi menggunakan nomor yang benar.'
            });
            await getDataRegisterStep2(id).then(({ data }) => {
                this.dataStep2 = JSON.parse(data.data);

                // calc price
                const { ticket_amount, ticket_type, job_status, transport_to_hotel } = this.data
                const { identity_card_photo } = this.dataStep2
                const student_card_photo = job_status === 'pelajar' ? identity_card_photo : '';
                const ticket = ticket_type.toLowerCase();
                this.price = calculatePrice(ticket, ticket_amount, student_card_photo, transport_to_hotel);
                this.loading = false;
            });
        },
        async getToken() {
            let token = '';
            await axios.post('/api/login', {
                email: 'admin@wgg-globalupr.com',
                password: 'pass@word1'
            }, {
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then((response) => {
                token = response.data.token;
                Cookie.set('token', token)
            })
            return token;
        }
    }
}
</script>
