<section class="donation mx-auto">
    <div class="container">
        <h1>Donasi</h1>
        <p>Anda bisa memberikan donasi ke rekening berikut<br/>
            Klik <strong>Konfirmasi Donasi</strong> setelah melakukan transfer</p>
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-5">
                        <div class="img-center">
                            <div class="img-center-cell">
                                <img src="/img/bca.png" />
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <p><strong>5315187165</strong></p>
                        <p>Atas Nama: Wilson Sophian</p>
                    </div>
                </div>
            </li>
            <li class="list-group-item list-group-form">
                <h3>Konfirmasi Donasi</h3>
                <form id="donation-form">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-form-label">Nama Sesuai Rekening</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="bank" class="col-form-label">Bank</label>
                            <input type="text" class="form-control" id="bank" name="bank" required>
                        </div>
                        <div class="form-group">
                            <label for="amount" class="col-form-label">Nominal Transfer</label>
                            <input type="number" class="form-control" id="amount" name="amount" required>
                        </div>
                        <div class="form-group">
                            <label for="date" class="col-form-label">Tanggal Transfer</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="file" class="col-form-label">Bukti Transfer</label><br/>
                            <input type="file" id="file" name="file" required>
                        </div>
                        <div class="form-group">
                            <label for="other" class="col-form-label">Catatan</label>
                            <textarea rows="4" class="form-control" id="other" name="other"></textarea>
                        </div>
                        <div id="donation-success-alert" class="alert alert-success" style="display: none;" role="alert">
                                Konfirmasi donasi berhasil dikirim
                        </div>
                        <div id="donation-error-alert" class="alert alert-danger" style="display: none;" role="alert">
                            Konfirmasi donasi gagal dikirim karena ada kesalahan
                        </div>
                    </div>
                    <div class="modal-footer">
                        <img style="display: none;" class="donation-loading" src="/img/loading-small.svg"/>
                        <button id="donation-submit" type="submit" class="btn btn-primary custom-btn">Konfirmasi Donasi</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</section>
