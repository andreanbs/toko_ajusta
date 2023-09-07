

<body style="background-image: url('assets/img/ajusta1.jpeg') ;>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Akun!</h1>
                            </div>
                            <form method="post" action="<?php echo base_url('registrasi') ?>" class="user">
                                
                                 <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nama"
                                        placeholder="Nama Anda" name="nama">

                                        <?php echo form_error('nama', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="telp"
                                        placeholder="No Handphone Anda" name="telp">

                                        <?php echo form_error('telp', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email"
                                        placeholder="Email Anda" name="email">

                                        <?php echo form_error('email', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>
                                
                                <div class="form-group">
                                    <textarea class="form-control form-control-user" id="alamat"
                                        placeholder="Alamat Anda" name="alamat"></textarea>
                                        <?php echo form_error('alamat', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username"
                                        placeholder="Username Anda" name="username">

                                        <?php echo form_error('username', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password_1" placeholder="Password" name="password_1">

                                            <?php echo form_error('password_1', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password_2" placeholder="Ulangi Password" name="password_2">

                                         <?php echo form_error('password_1', '<div class="text-danger small ml-2">', '</div>') ?>   
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
                               
                            </form>
                            <hr>
                            
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('auth') ?>">Sudah Punya Akun? Silahkan Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
