<table data-module="module-3" data-thumb="thumbnails/img-03.jpg" class="main-table" width="100%" cellpadding="0" cellspacing="0">
  <tbody><tr>
    <td data-bgcolor="bg-module" bgcolor="#ffffff">
    <img src="https://wgg-globalupr.com/img/logo-top-black.png" height="300" style="margin: 0 auto; display: table;" />
      <table class="flexible" width="600" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td data-bgcolor="bg-block-02" class="l-white p-25" bgcolor="#f4511e" style="padding:50px 50px 60px;">
            <table width="100%" cellpadding="0" cellspacing="0">
              <tbody><tr>
                <td data-color="title-with-bg" data-size="size title-with-bg" data-min="10" data-max="46" data-link-color="link title-with-bg color" data-link-style="text-decoration:underline; color:#fff;" align="center" style="padding:0 0 9px; font:700 26px/35px Arial, Helvetica, sans-serif; color:#fff; padding-bottom: 25px;">
                  Terima kasih telah mendaftar!
                </td>
              </tr>
              <tr>
                <td data-color="text-with-bg" data-size="size text" data-min="10" data-max="46" data-link-color="link text-with-bg color" data-link-style="text-decoration:underline; color:#fff;" align="left" style="font:15px/30px Arial, Helvetica, sans-serif; color:#fff;">
                  Berikut ini merupakan detail transaksi Anda:
                  <ul>
                    <li>ID Transaksi: <span style="font-weight: bold;">{{ $order->user_id }}</span></li>
                    <li>Nama: <span style="font-weight: bold;">{{ $personal->fullname }}</span></li>
                    <li>Alamat Email: <span style="font-weight: bold;">{{ $personal->email }}</span></li>
                    <li>No Handphone: <span style="font-weight: bold;">{{ $personal->phone_number }}</span></li>
                    <li>Jenis Tiket: <span style="font-weight: bold;">{{ ucfirst($order->ticket_type) }}</span></li>
                    <li>Jumlah Tiket: <span style="font-weight: bold;">{{ $order->ticket_amount }}</span></li>
                    <li>Status pekerjaan: <span style="font-weight: bold;">{{ ucfirst($order->job_status) }}</span></li>
                    <li>Jenis pendaftaran: <span style="font-weight: bold;">{{ ucfirst($order->registration_type) }}</span></li>
                    <li>Status pembayaran: <span style="font-weight: bold;">{{ $payment !== null ? 'Sudah dibayar' : 'Belum dibayar' }}</span></li>
                  </ul>
                </td>
              </tr>
              <tr>
                  <td  style="padding:0 0 9px; font:700 14px/14px Arial, Helvetica, sans-serif; color:#fff; line-height: 1.44">
                    Segera lakukan pembayaran melalui transfer ke nomor rekening <strong>5315187165 (BCA)</strong> atas nama <strong>Wilson Sophian</strong>.
                  </td>
              </tr>
              <tr>
                 <td  style="padding:0 0 9px; font:700 14px/14px Arial, Helvetica, sans-serif; color:#fff; line-height: 1.44">
                  Apabila Anda telah melakukan pembayaran, silakan lakukan <strong><i>konfirmasi pembayaran</i></strong> melalui <a style="color: #FFF; font-weight: 700;" href="https://wgg-globalupr.com/register/confirmation/{{ $order->user_id }}">link ini</a>.
                </td>
              </tr>
            </tbody></table>
          </td>
        </tr>
      </tbody></table>
    </td>
  </tr>
</tbody></table>
