<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Paginas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Administrar terminos de paginas</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Administrar terminos de paginas</h6>
                    <div class="langs-settings-alert"></div>
                   <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" style="table-layout: inherit; border-top: 1px solid;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Nombre de pagina</th>
                                    <th style="text-align: center;">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="setting-postlist">
                                   <td style="text-align: center;">Terminos de uso</td>
                                   <td style="text-align: center;">
                                      <a class="btn bg-success admn_table_btn" href="<?php echo lui_LoadAdminLinkSettings('edit-terms-pages?type=terms_of_use_page');?>">Editar</a>
                                   </td>
                                </tr>
                                <tr class="setting-postlist">
                                   <td style="text-align: center;">Politica de privaciodad</td>
                                   <td style="text-align: center;">
                                      <a class="btn bg-success admn_table_btn" href="<?php echo lui_LoadAdminLinkSettings('edit-terms-pages?type=privacy_policy_page');?>">Editar</a>
                                   </td>
                                </tr>
                                <tr class="setting-postlist">
                                   <td style="text-align: center;">Acerca de</td>
                                   <td style="text-align: center;">
                                      <a class="btn bg-success admn_table_btn" href="<?php echo lui_LoadAdminLinkSettings('edit-terms-pages?type=about_page');?>">Editar</a>
                                   </td>
                                </tr>
                                <tr class="setting-postlist">
                                   <td style="text-align: center;">Reembolso</td>
                                   <td style="text-align: center;">
                                      <a class="btn bg-success admn_table_btn" href="<?php echo lui_LoadAdminLinkSettings('edit-terms-pages?type=refund_terms_page');?>">Editar</a>
                                   </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->