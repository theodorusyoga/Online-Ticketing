<div id="modal-donation" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Konfirmasi Donasi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="donation-form">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div id="success-alert" class="alert alert-success" style="display: none;" role="alert">
                        Konfirmasi donasi berhasil dikirim
                    </div>
                    <div id="error-alert" class="alert alert-danger" role="alert">
                        Konfirmasi donasi gagal dikirim karena ada kesalahan
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Bergabung Sebagai</label>
                        <select id="user-types" class="form-control" name="user-types" disabled></select>
                    </div>
                </div>
                <div class="modal-footer">
                <img class="donation-loading" src="/img/loading-small.svg"/>
                <button id="donation-submit" type="submit" class="btn btn-primary custom-btn" disabled>Konfirmasi</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
