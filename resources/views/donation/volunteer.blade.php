<div id="modal-volunteer" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Join As Volunteer</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="volunteer-form">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div id="volunteer-success-alert" class="alert alert-success" style="display: none;" role="alert">
                        Formulir berhasil dikirim
                    </div>
                    <div id="volunteer-error-alert" class="alert alert-danger" style="display: none;" role="alert">
                        Formulir gagal dikirim karena ada kesalahan
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
                <img class="volunteer-loading" src="/img/loading-small.svg"/>
                <button id="volunteer-submit" type="submit" class="btn btn-primary custom-btn" disabled>Kirim</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
