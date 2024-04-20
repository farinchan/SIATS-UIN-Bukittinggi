<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo base_url('main'); ?>" target="_BLANK" class="nav-link">Lihat Website</a>
        </li>
    </ul>


    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown show">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-bell"></i>
                <?php if ($log_update_alumni_total != 0) { ?>
                    <span class="badge badge-danger navbar-badge"><?= $log_update_alumni_total ?></span>
                <?php } ?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">

                <?php foreach ($log_update_alumni as $list) {  ?>
                    <a href="<?= base_url("admin/ModulAlumni/lihat/") . $list->nisn; ?>" class="dropdown-item" <?php if (!$list->dibaca) { ?> style="background-color: #e1f0fc" <?php } ?>>

                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    <?= $list->nama ?>
                                    ( <?= $list->nisn ?> )
                                    <?php if ($list->pesan_update == "Sudah Melakukan Update Data Profil") { ?>
                                        <span class="float-right text-sm text-info"><i class="fas fa-star"></i></span>
                                    <?php } else { ?>
                                        <span class="float-right text-sm text-success"><i class="fas fa-star"></i></span>
                                    <?php } ?>
                                </h3>
                                <p class="text-sm"><?= $list->pesan_update ?></p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?= $list->waktu_update ?></p>
                            </div>
                        </div>

                    </a>
                    <div class="dropdown-divider"></div>
                <?php } ?>

                <a href="<?= base_url("admin/ModulAlumni/logupdatealumni") ?>" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/login/logoutsystem') ?>" role="button">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>

    </ul>
</nav>