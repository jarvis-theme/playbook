<div class="container">
    <div class="inner-column row">
        <div id="center_column" class="col-lg-4 col-xs-12 col-sm-4">
            <h2>Pelanggan Baru</h2><hr><br>
            <p>Nikmati kemudahan berbelanja dengan mendaftar sebagai member.</p>
            <br>
            <div class="input-group">
                <a href="{{url('member/create')}}" class="btn btn-info">Daftar</a>
            </div>
            <br><br>
        </div>
        <div id="center_column" class="col-lg-4 col-md-offset-2">
            <form class="form-horizontal" action="{{url('member/forgetpassword')}}" method="post">
                <h2>Lupa Password</h2><hr>
                <p>Kamu dapat mereset password akun kamu dengan memasukkan alamat email yang kamu gunakan saat mendaftar.</p>
                <br>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Email" name="recoveryEmail" required>
                    <span class="input-group-btn">
                        <button class="btn btn-green" type="submit">Reset Password</button>
                    </span>
                </div><br><br>
            </form>
        </div>
    </div>
</div>